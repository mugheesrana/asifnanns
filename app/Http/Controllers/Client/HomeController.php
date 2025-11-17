<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\CarVersion;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // List all cars at home page use helper to get db data
    public function index()
    {
        // Basic lists for filters
        $brands     = Brand::all();
        $years      = Car::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $colors     = Car::select('exterior_color')->whereNotNull('exterior_color')->distinct()->pluck('exterior_color');
        $engines    = Car::select('engine_type')->whereNotNull('engine_type')->distinct()->pluck('engine_type');

        // Price range
        $maxPrice = Car::max('price') ?? 0;
        $priceMin = 0;
        $priceMax = $maxPrice;

        // Top 5 brands with the most cars + up to 8 cars per brand for the Featured widget
        $topBrands = Brand::withCount('cars')
            ->whereHas('cars')
            ->with([
                'cars' => function ($q) {
                    $q->with(['brand', 'model'])
                        ->latest()
                        ->take(8);
                },
            ])
            ->orderByDesc('cars_count')
            ->take(5)
            ->get();
            $services = Service::with('category')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('client.home', compact('brands', 'years', 'colors', 'engines', 'maxPrice', 'priceMin', 'priceMax', 'topBrands','services'));
    }
    public function carDetails($id)
    {
        $car = Car::with(['brand', 'model', 'version', 'images'])
            ->findOrFail($id);

        // Decode meta JSON from version (features/specs)
        $rawMeta = $car->version->meta ?? [];
        if (is_string($rawMeta)) {
            $decoded = json_decode($rawMeta, true);
            $meta = is_array($decoded) ? $decoded : [];
        } elseif (is_array($rawMeta)) {
            $meta = $rawMeta;
        } else {
            $meta = [];
        }

        $relatedCars = Car::with(['brand', 'model', 'version', 'images'])
            ->where('brand_id', $car->brand_id)
            ->where('id', '!=', $car->id)
            ->take(6) // limit how many you want
            ->get();

        return view('client.pages.car-details', compact('car', 'meta', 'relatedCars'));
    }
    public function allCars(Request $request)
    {
        // Base query with relationships for listing
        $query = Car::with(['brand', 'model', 'version', 'images']);

        // 🔍 Free text search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                // Search in description (cars table)
                $q->where('description', 'like', "%{$search}%");

                // Search in brand name
                $q->orWhereHas('brand', function ($q2) use ($search) {
                    $q2->where('title', 'like', "%{$search}%");
                });

                // Search in model name
                $q->orWhereHas('model', function ($q2) use ($search) {
                    $q2->where('title', 'like', "%{$search}%");
                });

                // Search in version name
                $q->orWhereHas('version', function ($q2) use ($search) {
                    $q2->where('title', 'like', "%{$search}%");
                });
            });
        }


        // 💰 Price filter
        if ($request->filled('price_min') && $request->filled('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }

        // 🚘 Brand filter
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // 🧩 Model filter
        if ($request->filled('model_id')) {
            $query->where('model_id', $request->model_id);
        }

        // 📅 Year filter
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        // ⚙️ Engine type filter
        if ($request->filled('engine_type')) {
            $query->where('engine_type', $request->engine_type);
        }

        // 📏 Mileage filter
        if ($request->filled('mileage')) {
            $query->where('mileage', '<=', $request->mileage);
        }

        // 🎨 Color filter
        if ($request->filled('color')) {
            $query->where('exterior_color', $request->color);
        }

        // 🆕 / 🧾 Condition filter (new / used)
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }

        // 🌆 City filter
        if ($request->filled('city')) {
            $query->where('city', 'like', "%{$request->city}%");
        }

        // 📊 Sorting
        $sort = $request->input('sort');
        if ($sort === 'by-latest') {
            $query->orderByDesc('created_at');
        } elseif ($sort === 'low-to-high') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'high-to-low') {
            $query->orderBy('price', 'desc');
        }

        // 📄 Pagination (per-page selector)
        $perPage = (int) $request->input('per_page', 12);
        if (! in_array($perPage, [10, 12, 30, 50, 100])) {
            $perPage = 12;
        }

        // Get cars
        $cars = $query->paginate($perPage)->appends($request->query());

        // Dynamic filter values
        $brands  = Brand::all();
        $years   = Car::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $colors  = Car::select('exterior_color')->whereNotNull('exterior_color')->distinct()->pluck('exterior_color');
        $cities  = Car::select('city')->whereNotNull('city')->distinct()->pluck('city');
        $engines = Car::select('engine_type')->whereNotNull('engine_type')->distinct()->pluck('engine_type');
        $maxPrice = Car::max('price') ?? 0;

        return view('client.pages.car-listings', compact('cars', 'brands', 'years', 'colors', 'cities', 'engines', 'maxPrice'))
            ->with('priceMin', $request->price_min ?? 0)
            ->with('priceMax', $request->price_max ?? $maxPrice)
            ->with('perPage', $perPage)
            ->with('sort', $sort);
    }
    // Get models by brand (AJAX)
    public function getModels($brandId)
    {
        $models = \App\Models\CarModel::where('brand_id', $brandId)->get();
        return response()->json($models);
    }

    // Get versions by model (AJAX)
    public function getVersions($modelId)
    {
        $versions = \App\Models\CarVersion::where('model_id', $modelId)->get();
        return response()->json($versions);
    }

    // Wishlist page
    public function wishlist()
    {
        return view('client.pages.wishlist');
    }

    // Get wishlist cars by IDs (AJAX, JSON)
    public function getWishlistCars(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return response()->json([]);
        }

        $cars = Car::with(['brand', 'model', 'version', 'images'])
            ->whereIn('id', $ids)
            ->get();

        return response()->json($cars);
    }

    // Get wishlist cars HTML (server-side render, same UI as cars-list)
    public function getWishlistCarsHtml(Request $request)
    {
        $ids = $request->input('ids', []);
        if (empty($ids)) {
            return '';
        }

        $cars = Car::with(['brand', 'model', 'version', 'images'])
            ->whereIn('id', $ids)
            ->get();

        return view('guest.partials.cars-grid', compact('cars'))->render();
    }
}
