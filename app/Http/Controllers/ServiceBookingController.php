<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceBooking;
use Illuminate\Http\Request;

class ServiceBookingController extends Controller
{
    /**
     * Store a new service booking for a specific service.
     */
    public function store(Request $request, Service $service)
    {
        // Validate form data
        $validated = $request->validate([
            'name'           => 'required|string|max:190',
            'email'          => 'required|email|max:190',
            'phone'          => 'required|string|max:50',
            'preferred_date' => 'required|date',
            'service_type'   => 'required|string|max:190',
            'message'        => 'nullable|string',
            'attachment'     => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ]);

        // Handle file upload (same style as blogs)
        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Make sure this folder exists: public/uploads/service-bookings
            $file->move(public_path('uploads/service-bookings'), $filename);

            $attachmentPath = 'uploads/service-bookings/' . $filename;
        }

        // Create booking record
        ServiceBooking::create([
            'service_id'     => $service->id,
            'name'           => $validated['name'],
            'email'          => $validated['email'],
            'phone'          => $validated['phone'],
            'subject'        => null, // if you add subject in form, put $validated['subject'] ?? null
            'preferred_date' => $validated['preferred_date'],
            'service_type'   => $validated['service_type'],
            'message'        => $validated['message'] ?? null,
            'attachment'     => $attachmentPath,
            'status'         => 'pending',
        ]);

        return back()->with('success', 'Your service request has been submitted successfully.');
    }
}
