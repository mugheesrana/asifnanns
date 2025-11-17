<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServicesController extends Controller
{
    public function index()
    {
        $services = Service::with(['category.parent'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::with('parent')
            ->orderBy('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'               => 'required|string|max:190',
            'slug'                => 'nullable|string|max:190|unique:services,slug',
            'service_category_id' => 'required|exists:service_categories,id',
            'short_description'   => 'nullable|string|max:500',
            'description'         => 'nullable|string',
            'price'               => 'nullable|numeric',
            'status'              => 'required|in:active,inactive',
            'is_featured'         => 'nullable|in:yes,no',

            // use same name & style as blogs
            'featured_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:15120',

            // SEO
            'seo_title'           => 'nullable|string|max:190',
            'seo_tags'            => 'nullable|string|max:255',
            'seo_meta'            => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // handle image upload like blogs
        $thumbnailPath = null;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            // make sure this folder exists: public/uploads/services
            $file->move(public_path('uploads/services'), $filename);
            $thumbnailPath = 'uploads/services/' . $filename;
        }

        Service::create([
            'service_category_id' => $validated['service_category_id'],
            'title'               => $validated['title'],
            'slug'                => $validated['slug'],
            'thumbnail'           => $thumbnailPath,
            'short_description'   => $validated['short_description'] ?? null,
            'description'         => $validated['description'] ?? null,
            'price'               => $validated['price'] ?? null,
            'status'              => $validated['status'] === 'active',
            'is_featured'         => ($validated['is_featured'] ?? 'no') === 'yes',
            'meta_title'          => $validated['seo_title'] ?? null,
            'meta_keywords'       => $validated['seo_tags'] ?? null,
            'meta_description'    => $validated['seo_meta'] ?? null,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::with('parent')
            ->orderBy('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'               => 'required|string|max:190',
            'slug'                => 'nullable|string|max:190|unique:services,slug,' . $service->id,
            'service_category_id' => 'required|exists:service_categories,id',
            'short_description'   => 'nullable|string|max:500',
            'description'         => 'nullable|string',
            'price'               => 'nullable|numeric',
            'status'              => 'required|in:active,inactive',
            'is_featured'         => 'nullable|in:yes,no',

            'featured_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:15120',

            // SEO
            'seo_title'           => 'nullable|string|max:190',
            'seo_tags'            => 'nullable|string|max:255',
            'seo_meta'            => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // handle image upload like blogs
        $thumbnailPath = $service->thumbnail;

        if ($request->hasFile('featured_image')) {
            // delete old if exists
            if ($thumbnailPath && file_exists(public_path($thumbnailPath))) {
                @unlink(public_path($thumbnailPath));
            }

            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/services'), $filename);
            $thumbnailPath = 'uploads/services/' . $filename;
        }
        // print_r($thumbnailPath);die();

        // dd($thumbnailPath);

        $service->update([
            'service_category_id' => $validated['service_category_id'],
            'title'               => $validated['title'],
            'slug'                => $validated['slug'],
            'thumbnail'           => $thumbnailPath,
            'short_description'   => $validated['short_description'] ?? null,
            'description'         => $validated['description'] ?? null,
            'price'               => $validated['price'] ?? null,
            'status'              => $validated['status'] === 'active',
            'is_featured'         => ($validated['is_featured'] ?? 'no') === 'yes',
            'meta_title'          => $validated['seo_title'] ?? null,
            'meta_keywords'       => $validated['seo_tags'] ?? null,
            'meta_description'    => $validated['seo_meta'] ?? null,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->thumbnail && file_exists(public_path($service->thumbnail))) {
            @unlink(public_path($service->thumbnail));
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
