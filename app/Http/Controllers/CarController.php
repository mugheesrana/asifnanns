<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\CarVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // List all cars
    public function index()
    {
        $cars = Car::with(['brand', 'model', 'version', 'images'])->get();
        return view('admin.cars.index', compact('cars'));
    }

    // Show form
    public function create()
    {
        $brands = Brand::all();
        $models = CarModel::all();
        $versions = CarVersion::all();
        return view('admin.cars.create', compact('brands', 'models', 'versions'));
    }

    // Store new car
    public function store(Request $request)
    {
        $request->validate([
            'brand_id'   => 'required|exists:brands,id',
            'model_id'   => 'required|exists:car_models,id',
            'version_id' => 'nullable|exists:car_versions,id',
            'year'       => 'required|integer|min:1900|max:' . date('Y'),
            'city'       => 'required|string|max:100',
            'registered_in' => 'nullable|string|max:100',
            'exterior_color' => 'nullable|string|max:50',
            'mileage'    => 'nullable|integer',
            'mileage_unit' => 'nullable|in:km,miles',
            'price'      => 'required|numeric',
            'transmission' => 'nullable|string|max:50',
            'engine_type' => 'nullable|string|max:50',
            'fuel_type' => 'nullable|string|max:50',
            'condition' => 'nullable|string|max:50',
            'is_sold' => 'boolean',
            'is_featured' => 'boolean',
            'location' => 'nullable|string',
            'currency'   => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'contact_name' => 'required|string|max:100',
            'phone'      => 'required|string|max:20',
            'contact_phone_secondary' => 'nullable|string|max:20',
            'allow_whatsapp' => 'boolean',
            'status'     => 'required|in:active,inactive,suspended',
            'images.*'   => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);


        $car = Car::create([
            'user_id'     => auth()->id(),
            'brand_id'    => $request->brand_id,
            'model_id'    => $request->model_id,
            'version_id'  => $request->version_id,
            'year'        => $request->year,
            'city'        => $request->city,
            'registered_in' => $request->registered_in,
            'exterior_color' => $request->exterior_color,
            'mileage'     => $request->mileage,
            'mileage_unit' => $request->mileage_unit,
            'price'       => $request->price,
            'transmission' => $request->transmission,
            'engine_type' => $request->engine_type,
            'fuel_type' => $request->fuel_type,
            'condition' => $request->condition,
            'is_sold' => $request->is_sold ?? false,
            'is_featured' => $request->is_featured ?? false,
            'location' => $request->location,
            'currency'    => $request->currency ?? 'PKR',
            'description' => $request->description,
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->phone,
            'contact_phone_secondary' => $request->contact_phone_secondary,
            'allow_whatsapp' => $request->allow_whatsapp ?? false,
            'status'      => $request->status,
        ]);


        // Save images
        // Store new car
        if ($request->hasFile('images')) {
            $isFirst = true;
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('cars'), $filename);

                $car->images()->create([
                    'image'      => 'cars/' . $filename, // relative path
                    'is_primary' => $isFirst, // First image is primary
                ]);
                $isFirst = false;
            }
        }


        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    // Show car details
    public function show(Car $car)
    {
        $car->load(['brand', 'model', 'version', 'images', 'user']);
        return view('admin.cars.show', compact('car'));
    }

    // Edit form
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $models = CarModel::all();
        $versions = CarVersion::all();
        return view('admin.cars.edit', compact('car', 'brands', 'models', 'versions'));
    }

    // Update car
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'brand_id'   => 'required|exists:brands,id',
            'model_id'   => 'required|exists:car_models,id',
            'version_id' => 'nullable|exists:car_versions,id',
            'year'       => 'required|integer|min:1900|max:' . date('Y'),
            'city'       => 'required|string|max:100',
            'registered_in' => 'nullable|string|max:100',
            'exterior_color' => 'nullable|string|max:50',
            'mileage'    => 'nullable|integer',
            'mileage_unit' => 'nullable|in:km,miles',
            'price'      => 'required|numeric',
            'transmission' => 'nullable|string|max:50',
            'engine_type' => 'nullable|string|max:50',
            'fuel_type' => 'nullable|string|max:50',
            'condition' => 'nullable|string|max:50',
            'is_sold' => 'boolean',
            'is_featured' => 'boolean',
            'location' => 'nullable|string',
            'currency'   => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'contact_name' => 'required|string|max:100',
            'phone'      => 'required|string|max:20',
            'contact_phone_secondary' => 'nullable|string|max:20',
            'allow_whatsapp' => 'boolean',
            'status'     => 'required|in:active,inactive,suspended',
            'images.*'   => 'image|mimes:jpg,jpeg,png|max:2048',
            'remove_images' => 'array',
            'remove_images.*' => 'exists:car_images,id'
        ]);

        // Update car details
        $car->update([
            'brand_id'    => $request->brand_id,
            'model_id'    => $request->model_id,
            'version_id'  => $request->version_id,
            'year'        => $request->year,
            'city'        => $request->city,
            'registered_in' => $request->registered_in,
            'exterior_color' => $request->exterior_color,
            'mileage'     => $request->mileage,
            'mileage_unit' => $request->mileage_unit,
            'price'       => $request->price,
            'transmission' => $request->transmission,
            'engine_type' => $request->engine_type,
            'fuel_type' => $request->fuel_type,
            'condition' => $request->condition,
            'is_sold' => $request->is_sold ?? false,
            'is_featured' => $request->is_featured ?? false,
            'location' =>  $request->location,
            'currency'    => $request->currency ?? 'PKR',
            'description' => $request->description,
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->phone,
            'contact_phone_secondary' => $request->contact_phone_secondary,
            'allow_whatsapp' => $request->allow_whatsapp ?? false,
            'status'      => $request->status,
        ]);

        // Handle image removal
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $imageId) {
                $image = $car->images()->find($imageId);
                if ($image) {
                    $imagePath = public_path($image->image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath); // delete from public/cars
                    }
                    $image->delete();
                }
            }
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $hasExistingPrimary = $car->images()->where('is_primary', true)->exists();
            $isFirst = !$hasExistingPrimary;

            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('cars'), $filename);

                $car->images()->create([
                    'image'      => 'cars/' . $filename,
                    'is_primary' => $isFirst,
                ]);
                $isFirst = false;
            }
        }


        // Ensure at least one image is marked as primary
        $this->ensurePrimaryImage($car);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    // Delete car
    public function destroy(Car $car)
    {
        $car->images()->delete();
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }

    /**
     * Ensure that at least one image is marked as primary
     */
    private function ensurePrimaryImage(Car $car)
    {
        // Check if car has any images
        if ($car->images()->count() === 0) {
            return;
        }

        // Check if there's already a primary image
        $hasPrimary = $car->images()->where('is_primary', true)->exists();

        if (!$hasPrimary) {
            // Mark the first image as primary
            $firstImage = $car->images()->first();
            if ($firstImage) {
                $firstImage->update(['is_primary' => true]);
            }
        }
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
}
