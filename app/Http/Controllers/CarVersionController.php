<?php
namespace App\Http\Controllers;

use App\Models\CarVersion;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarVersionController extends Controller
{
    public function index()
    {
        $versions = CarVersion::with('model')->latest()->get();
        $models = CarModel::all();
        return view('admin.versions.index', compact('versions','models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|exists:car_models,id',
            'title'    => 'required|string|max:255|unique:car_versions,title',
            'meta_keys' => 'array',
            'meta_values' => 'array',
        ]);

        // Build meta array from keys and values; fallback to JSON string if provided
        $meta = null;
        if ($request->has('meta_keys') && $request->has('meta_values')) {
            $keys = $request->meta_keys;
            $values = $request->meta_values;
            $meta = [];
            foreach ($keys as $index => $key) {
                if (!empty($key) && isset($values[$index]) && $values[$index] !== '') {
                    $meta[$key] = $values[$index];
                }
            }
            $meta = !empty($meta) ? $meta : null;
        } elseif ($request->filled('meta')) {
            $decoded = json_decode($request->input('meta'), true);
            $meta = is_array($decoded) ? $decoded : null;
        }

        CarVersion::create([
            'model_id' => $request->model_id,
            'title'    => $request->title,
            'slug'     => Str::slug($request->title),
            'meta'     => $meta,
        ]);

        return redirect()->route('admin.versions.index')->with('success','Version added successfully.');
    }

    public function edit(CarVersion $version)
    {
        $models = CarModel::all();
        return view('admin.versions.edit', compact('version', 'models'));
    }

    public function update(Request $request, CarVersion $version)
    {
        $request->validate([
            'model_id' => 'required|exists:car_models,id',
            'title'    => 'required|string|max:255|unique:car_versions,title,' . $version->id,
            'meta_keys' => 'nullable|array',
            'meta_values' => 'nullable|array',
        ]);

        // Build meta array from keys and values
        $meta = [];
        if ($request->has('meta_keys') && $request->has('meta_values')) {
            $keys = $request->input('meta_keys', []);
            $values = $request->input('meta_values', []);

            foreach ($keys as $index => $key) {
                $key = trim($key);
                $value = isset($values[$index]) ? trim($values[$index]) : '';

                // Only add if both key and value are not empty
                if ($key !== '' && $value !== '') {
                    $meta[$key] = $value;
                }
            }
        }

        // If no pairs came through but a JSON 'meta' was provided, use it
        if (empty($meta) && $request->filled('meta')) {
            $decoded = json_decode($request->input('meta'), true);
            if (is_array($decoded)) {
                $meta = $decoded;
            }
        }

        $version->update([
            'model_id' => $request->model_id,
            'title'    => $request->title,
            'slug'     => Str::slug($request->title),
            'meta'     => !empty($meta) ? $meta : null,
        ]);

        return redirect()->route('admin.versions.index')->with('success','Version updated successfully.');
    }

    public function destroy(CarVersion $version)
    {
        $version->delete();
        return redirect()->route('admin.versions.index')->with('success','Version deleted successfully.');
    }
}
