<?php 
// app/Http/Controllers/Admin/ServiceCategoryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with('parent')
            ->orderBy('parent_id')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.service-categories.index', compact('categories'));
    }

    public function create()
    {
        // Only root categories as possible parents
        $parents = ServiceCategory::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.service-categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:190',
            'slug'        => 'nullable|string|max:190|unique:service_categories,slug',
            'parent_id'   => 'nullable|exists:service_categories,id',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
            'sort_order'  => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['status'] = $validated['status'] === 'active';

        ServiceCategory::create($validated);

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', 'Service category created successfully.');
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        // Possible parents: all root categories except itself
        $parents = ServiceCategory::whereNull('parent_id')
            ->where('id', '!=', $serviceCategory->id)
            ->orderBy('name')
            ->get();

        return view('admin.service-categories.edit', [
            'category' => $serviceCategory,
            'parents'  => $parents,
        ]);
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:190',
            'slug'        => 'nullable|string|max:190|unique:service_categories,slug,' . $serviceCategory->id,
            'parent_id'   => 'nullable|exists:service_categories,id',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
            'sort_order'  => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // avoid setting parent_id = self
        if (isset($validated['parent_id']) && $validated['parent_id'] == $serviceCategory->id) {
            $validated['parent_id'] = null;
        }

        $validated['status'] = $validated['status'] === 'active';

        $serviceCategory->update($validated);

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', 'Service category updated successfully.');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', 'Service category deleted successfully.');
    }
}
