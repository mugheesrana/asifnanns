<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\CarVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    // List all cars at home page use helper to get db data
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
