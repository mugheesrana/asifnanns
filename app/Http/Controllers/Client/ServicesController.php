<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\CarVersion;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    // List all cars at home page use helper to get db data

    public function show($slug)
    {
        $service = Service::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        // Optional: Get related services
        $relatedServices = Service::where('service_category_id', $service->service_category_id)
            ->where('id', '!=', $service->id)
            ->limit(6)
            ->get();

        return view('client.pages.service-details', compact('service', 'relatedServices'));
    }
    public function index(Request $request)
    {
        $categorySlug = $request->query('category');
        $search       = $request->query('q');

        // For Service Type filter dropdown (top-level categories only)
        $parentCategories = ServiceCategory::whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Base query
        $query = Service::with(['category.parent'])
            ->where('status', true);

        $selectedCategory = null; // category or subcategory (if filter applied)

        // Filter by category slug if present
        if ($categorySlug) {
            $selectedCategory = ServiceCategory::where('slug', $categorySlug)
                ->where('status', 1)
                ->firstOrFail();

            // If main category: show services of all its children (subcategories)
            if ($selectedCategory->parent_id === null) {
                $childIds = $selectedCategory->children()
                    ->where('status', 1)
                    ->pluck('id')
                    ->toArray();

                // In case some services are directly attached to main category too:
                $ids = array_merge($childIds, [$selectedCategory->id]);

                $query->whereIn('service_category_id', $ids);
            } else {
                // If subcategory: only services of this subcategory
                $query->where('service_category_id', $selectedCategory->id);
            }
        }

        // Search by title (service name) if ?q= given
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Order: featured first, then latest
        $services = $query
            ->orderBy('is_featured', 'desc')
            ->latest()
            ->paginate(12)
            ->withQueryString(); // keep ?category & ?q on pagination links

        $totalServices = $services->total();

        return view('client.pages.service-listings', compact(
            'services',
            'totalServices',
            'parentCategories',
            'selectedCategory',
            'search',
            'categorySlug'
        ));
    }
    public function services()
    {
        return view('guest.services');
    }
    public function serviceDetail()
    {
        return view('guest.serviceDetail');
    }
    public function reviews()
    {
        // You can fetch reviews from database here
        $reviews = []; // Or Review::all() if you have a Review model
        $stats = [
            'total' => 487,
            'average' => 4.8,
            'five_star' => 85,
            'four_star' => 12,
            'three_star' => 2,
            'two_star' => 1,
            'one_star' => 0,
        ];

        return view('guest.reviews', compact('reviews', 'stats'));
    }

    public function storeReview(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        // Save to database here
        // Review::create($validated);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
