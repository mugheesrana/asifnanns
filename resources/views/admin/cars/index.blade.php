@extends('admin.layouts.app')
@section('title', 'Cars')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Car Management</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Brands</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="card-title">Cars Management</h4>
                                    <h6 class="card-subtitle">Manage cars, dealers, and details</h6>
                                </div>
                                <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Car
                                </a>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Version</th>
                                            <th>Price</th>
                                            <th>Dealer</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cars as $car)
                                            <tr>
                                                <td>{{ $car->id }}</td>
                                                <td>
                                                    @if ($car->primaryImage())
                                                        <img src="{{ asset($car->primaryImage()->image) }}"
                                                            alt="{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}"
                                                            class="img-thumbnail car-thumbnail"
                                                            style="width: 80px; height: 60px; object-fit: cover; cursor: pointer; transition: transform 0.2s;"
                                                            onclick="showImageModal('{{ asset($car->primaryImage()->image) }}', '{{ $car->brand->title ?? '' }} {{ $car->model->title ?? '' }}')">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                                            style="width: 80px; height: 60px; border-radius: 4px; border: 1px solid #dee2e6;">
                                                            <i class="fa fa-car text-muted" style="font-size: 20px;"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $car->brand->title ?? 'N/A' }}</td>
                                                <td>{{ $car->model->title ?? 'N/A' }}</td>
                                                <td>{{ $car->version->title ?? 'N/A' }}</td>
                                                <td>{{ number_format($car->price) }} PKR</td>
                                                <td>{{ $car->user->name ?? 'N/A' }}</td>
                                                <td>{{ $car->created_at->format('Y-m-d') }}</td>
                                                <td class="text-nowrap">
                                                    {{-- View --}}
                                                    <a href="{{ route('admin.cars.show', $car->id) }}"
                                                        class="btn btn-sm btn-primary me-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    {{-- Edit --}}
                                                    <a href="{{ route('admin.cars.edit', $car->id) }}"
                                                        class="btn btn-sm btn-warning me-1">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    {{-- Delete --}}
                                                    <form action="{{ route('admin.cars.destroy', $car->id) }}"
                                                        method="POST" class="delete-form" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                            data-title="{{ $car->title ?? 'this car' }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalTitle">Car Image</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Car Image" class="img-fluid" style="max-height: 500px;">
                </div>
            </div>
        </div>
    </div>

    <style>
        .car-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .table td {
            vertical-align: middle;
        }

        .img-thumbnail {
            border-radius: 6px;
        }
    </style>

    <script>
        function showImageModal(imageSrc, title) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModalTitle').textContent = title || 'Car Image';
            $('#imageModal').modal('show');
        }
    </script>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
    $('.btn-delete').click(function(e) {
        e.preventDefault(); // prevent default form submission

        var form = $(this).closest('form'); // get parent form
        var title = $(this).data('title') || "this item";

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover " + title + "!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                form.submit(); // submit the form if confirmed
            }
        });
    });
});

    </script>
@endsection
