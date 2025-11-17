@extends('admin.layouts.app')
@section('title', 'Service Categories')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Service Categories Management</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Service Categories</li>
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
                                    <h4 class="card-title">All Service Categories</h4>
                                    <h6 class="card-subtitle">Manage categories and subcategories</h6>
                                </div>
                                <a href="{{ route('admin.service-categories.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Category
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
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Parent</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Sort Order</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->parent ? $category->parent->name : '—' }}</td>
                                            <td>
                                                <span class="badge badge-{{ $category->parent_id ? 'info' : 'primary' }}">
                                                    {{ $category->parent_id ? 'Sub Category' : 'Main Category' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $category->status ? 'success' : 'secondary' }}">
                                                    {{ $category->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>{{ $category->sort_order }}</td>
                                            <td>{{ $category->created_at?->format('Y-m-d') }}</td>
                                            <td class="text-nowrap">

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.service-categories.edit', $category->id) }}"
                                                   class="btn btn-sm btn-warning me-1">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('admin.service-categories.destroy', $category->id) }}"
                                                      method="POST"
                                                      class="delete-form"
                                                      style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                            class="btn btn-sm btn-danger btn-delete"
                                                            data-title="{{ $category->name }}">
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
            var title = $(this).data('title') || "this category";

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
