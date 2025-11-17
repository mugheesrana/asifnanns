@extends('admin.layouts.app')
@section('title', 'Services')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Services Management</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Services</li>
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
                                    <h4 class="card-title">All Services</h4>
                                    <h6 class="card-subtitle">Manage services under your categories</h6>
                                </div>
                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Service
                                </a>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive m-t-40">
                                <table id="example23"
                                       class="display nowrap table table-hover table-striped table-bordered"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            <td>
                                                @if ($service->thumbnail)
                                                    <img src="{{ asset($service->thumbnail) }}"
                                                         alt="{{ $service->title }}"
                                                         class="img-thumbnail service-thumbnail"
                                                         style="width: 80px; height: 60px; object-fit: cover;">
                                                @else
                                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                                         style="width: 80px; height: 60px; border-radius: 4px; border: 1px solid #dee2e6;">
                                                        <i class="fa fa-car text-muted"
                                                           style="font-size: 20px;"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->slug }}</td>
                                            <td>
                                                @php
                                                    $cat = $service->category;
                                                @endphp
                                                @if($cat)
                                                    @if($cat->parent)
                                                        {{ $cat->parent->name }} → {{ $cat->name }}
                                                    @else
                                                        {{ $cat->name }}
                                                    @endif
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>
                                                @if(!is_null($service->price))
                                                    {{ number_format($service->price, 2) }}
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $service->is_featured ? 'info' : 'secondary' }}">
                                                    {{ $service->is_featured ? 'Yes' : 'No' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $service->status ? 'success' : 'secondary' }}">
                                                    {{ $service->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>{{ $service->created_at?->format('Y-m-d') }}</td>
                                            <td class="text-nowrap">
                                                {{-- View frontend (if route exists) --}}
                                                @if(Route::has('services.show'))
                                                    <a href="{{ route('services.show', $service->slug) }}"
                                                       target="_blank"
                                                       class="btn btn-sm btn-primary me-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endif

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                                   class="btn btn-sm btn-warning me-1">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                      method="POST"
                                                      class="delete-form"
                                                      style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                            class="btn btn-sm btn-danger btn-delete"
                                                            data-title="{{ $service->title }}">
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
            <!-- End Page Content -->
        </div>
    </div>

    <style>
        .service-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
        }
        .table td {
            vertical-align: middle;
        }
    </style>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var title = $(this).data('title') || "this service";

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
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
