<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceBooking;
use Illuminate\Http\Request;

class AdminServiceBookingController extends Controller
{
    public function index()
    {
        $bookings = ServiceBooking::with(['service.category.parent'])
            ->orderBy('created_at', 'desc')
            ->get();

        // status options for dropdown
        $statusOptions = [
            'pending'     => 'Pending',
            'in_progress' => 'In Progress',
            'completed'   => 'Completed',
            'cancelled'   => 'Cancelled',
        ];

        return view('admin.service-bookings.index', compact('bookings', 'statusOptions'));
    }

    public function updateStatus(Request $request, ServiceBooking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,completed,cancelled',
        ]);

        $booking->status = $validated['status'];
        $booking->save();

        // If AJAX request, return JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully.',
            ]);
        }

        // Fallback (not really needed, but safe)
        return redirect()
            ->route('admin.service-bookings.index')
            ->with('success', 'Status updated successfully.');
    }
}
