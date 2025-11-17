<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Admin: list all reviews
     */
    public function index()
    {
        $reviews = Review::latest()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Store a new review from the client side
     */
    public function store(Request $request)
    {
        $data = $request->except('image');

        // Handle Image Upload (store in public/uploads/reviews)
        if ($request->hasFile('image')) {
            $file      = $request->file('image');
            $filename  = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path      = public_path('uploads/reviews');

            // Create folder if not exists
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // Move file to public/uploads/reviews
            $file->move($path, $filename);

            // Save path in DB (relative)
            $data['image'] = 'uploads/reviews/' . $filename;
        }

        // Save Review
        Review::create($data);

        return back()->with('success', 'Thank you! Your review has been submitted.');
    }

    /**
     * Admin: update review status (active/inactive)
     */
    public function updateStatus(Request $request, Review $review)
    {
        $validated = $request->validate([
            'status' => 'required|boolean',
        ]);

        $review->status = (bool) $validated['status'];
        $review->save();

        return back()->with('success', 'Review status updated successfully.');
    }
}
