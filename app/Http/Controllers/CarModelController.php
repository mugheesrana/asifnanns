<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarModelController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $models = CarModel::with('brand')->latest()->get();
        return view('admin.models.index', compact('models', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'title' => 'required|string|max:255|unique:car_models,title',
        ]);

        CarModel::create([
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('admin.models.index')->with('success', 'Car Model added successfully.');
    }

    public function update(Request $request, CarModel $model)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:car_models,title,' . $model->id,
            'brand_id' => 'required|exists:brands,id',
        ]);

        $model->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'brand_id' => $request->brand_id,
        ]);

        return redirect()->route('admin.models.index')->with('success', 'Car Model updated successfully.');
    }

    public function destroy(CarModel $model)
    {
        $model->delete();
        return redirect()->route('admin.models.index')->with('success', 'Car Model deleted successfully.');
    }
}
