@extends('admin.layouts.app')
@section('title', 'Service Bookings')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Service Bookings</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Service Bookings</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="card-title">Booked Services</h4>
                                    <h6 class="card-subtitle">View and update booking status</h6>
                                </div>
                            </div>

                            <div class="table-responsive m-t-40">
                                <table id="bookingsTable" class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service</th>
                                        <th>Category</th>
                                        <th>Customer</th>
                                        <th>Contact</th>
                                        <th>Preferred Date</th>
                                        <th>Service Type</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Attachment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>

                                            {{-- Service --}}
                                            <td>
                                                @if($booking->service)
                                                    <a href="{{ route('service-details', $booking->service->slug) }}"
                                                       target="_blank">
                                                        {{ $booking->service->title }}
                                                    </a>
                                                @else
                                                    <em>—</em>
                                                @endif
                                            </td>

                                            {{-- Category --}}
                                            <td>
                                                @if($booking->service && $booking->service->category)
                                                    {{ $booking->service->category->parent ? $booking->service->category->parent->name . ' → ' : '' }}
                                                    {{ $booking->service->category->name }}
                                                @else
                                                    <em>—</em>
                                                @endif
                                            </td>

                                            {{-- Customer --}}
                                            <td>
                                                {{ $booking->name }}<br>
                                                <small>{{ $booking->email }}</small>
                                            </td>

                                            {{-- Contact --}}
                                            <td>{{ $booking->phone ?: '—' }}</td>

                                            {{-- Preferred Date --}}
                                            <td>
                                                {{ $booking->preferred_date ? \Carbon\Carbon::parse($booking->preferred_date)->format('Y-m-d') : '—' }}
                                            </td>

                                            {{-- Service Type --}}
                                            <td>{{ $booking->service_type ?: '—' }}</td>

                                            {{-- Status dropdown (AJAX on change) --}}
                                            <td>
                                                <select class="form-control booking-status-select"
                                                        data-id="{{ $booking->id }}"
                                                        style="min-width: 140px;">
                                                    @foreach($statusOptions as $value => $label)
                                                        <option value="{{ $value }}"
                                                            {{ $booking->status === $value ? 'selected' : '' }}>
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            {{-- Created At --}}
                                            <td>
                                                {{ $booking->created_at ? $booking->created_at->format('Y-m-d H:i') : '—' }}
                                            </td>

                                            {{-- Attachment --}}
                                            <td>
                                                @if($booking->attachment)
                                                    <a href="{{ asset($booking->attachment) }}" target="_blank" class="btn btn-sm btn-info">
                                                        View
                                                    </a>
                                                @else
                                                    <em>—</em>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div>
            </div>
            <!-- End Page Content -->
        </div>
    </div>

    <style>
        .table td {
            vertical-align: middle;
        }
    </style>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        // If you're using DataTables like on your blogs page:
        if ($.fn.DataTable) {
            $('#bookingsTable').DataTable({
                responsive: true
            });
        }

        // On change of status dropdown
        $('.booking-status-select').on('change', function () {
            var select   = $(this);
            var bookingId = select.data('id');
            var status    = select.val();

            // Optional: show a small loader or disable select
            select.prop('disabled', true);

            $.ajax({
                url: '{{ route("admin.service-bookings.update-status", ":id") }}'.replace(':id', bookingId),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PATCH',
                    status: status
                },
                success: function (response) {
                    // Optional: SweetAlert success
                    if (typeof swal !== 'undefined') {
                        swal("Updated!", "Booking status updated successfully.", "success");
                    } else {
                        alert('Status updated successfully.');
                    }
                },
                error: function (xhr) {
                    // On error, revert value (reload page or show message)
                    alert('Failed to update status. Please try again.');
                },
                complete: function () {
                    select.prop('disabled', false);
                }
            });
        });
    });
</script>
@endsection
