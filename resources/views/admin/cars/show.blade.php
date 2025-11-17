@extends('admin.layouts.app')
@section('title', 'View Car Details')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Car Details</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.cars.index') }}">Cars</a></li>
                    <li class="breadcrumb-item active">View Details</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">{{ $car->brand->title ?? 'N/A' }} {{ $car->model->title ?? 'N/A' }} {{ $car->version->title ?? '' }} ({{ $car->year }})</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h3 class="box-title">Vehicle Information</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Brand:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->brand->title ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Model:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->model->title ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Version:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->version->title ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Year:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->year ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Color:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->exterior_color ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Mileage:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        {{ $car->mileage ? number_format($car->mileage) . ' ' . ucfirst($car->mileage_unit ?? 'km') : 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Price:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <strong class="text-success">{{ number_format($car->price) }} {{ $car->currency ?? 'PKR' }}</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Transmission:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->transmission ? ucfirst($car->transmission) : 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Engine Type:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->engine_type ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Fuel Type:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->fuel_type ? ucfirst($car->fuel_type) : 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Condition:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->condition ? ucfirst($car->condition) : 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Is Sold?</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        @if($car->is_sold)
                                                            <span class="badge bg-danger">Sold</span>
                                                        @else
                                                            <span class="badge bg-success">Available</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Is Featured?</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        @if($car->is_featured)
                                                            <span class="badge bg-info">Featured</span>
                                                        @else
                                                            <span class="badge bg-secondary">Not Featured</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Status:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        @if($car->status == 'active')
                                                            <span class="badge bg-success">Active</span>
                                                        @elseif($car->status == 'inactive')
                                                            <span class="badge bg-warning">Inactive</span>
                                                        @else
                                                            <span class="badge bg-danger">Suspended</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="box-title">Location & Registration</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">City:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->city ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Registered In:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->registered_in ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if($car->description)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-2">Description:</label>
                                                    <div class="col-md-10">
                                                        <p class="form-control-static">{{ $car->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <h3 class="box-title">Contact Information</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Contact Name:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->contact_name ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Primary Phone:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <a href="tel:{{ $car->contact_phone }}">{{ $car->contact_phone ?? 'N/A' }}</a>
                                                        @if($car->allow_whatsapp)
                                                            <span class="badge bg-success ml-2">WhatsApp Available</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($car->contact_phone_secondary)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Secondary Phone:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">
                                                            <a href="tel:{{ $car->contact_phone_secondary }}">{{ $car->contact_phone_secondary }}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Dealer:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static">{{ $car->user->name ?? 'N/A' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($car->images->count() > 0)
                                        <h3 class="box-title">Car Images</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($car->images as $image)
                                                        <div class="col-md-3 mb-3">
                                                            <div class="card">
                                                                <img src="{{ asset($image->image) }}"
                                                                     class="card-img-top car-image"
                                                                     alt="Car Image"
                                                                     style="height: 200px; object-fit: cover; cursor: pointer;"
                                                                     onclick="showImageModal('{{ asset($image->image) }}', 'Car Image')">
                                                                @if($image->is_primary)
                                                                    <div class="card-body p-2 text-center">
                                                                        <small class="badge bg-success">Primary Image</small>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <h3 class="box-title">System Information</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Created:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->created_at->format('d M Y, H:i') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Last Updated:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{ $car->updated_at->format('d M Y, H:i') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-info">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <a href="{{ route('admin.cars.index') }}" class="btn btn-inverse">
                                                        <i class="fa fa-arrow-left"></i> Back to List
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
        .car-image:hover {
            transform: scale(1.02);
            transition: transform 0.2s;
        }

        .form-control-static {
            padding: 7px 0;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 500;
        }

        .badge {
            font-size: 11px;
            padding: 4px 8px;
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
