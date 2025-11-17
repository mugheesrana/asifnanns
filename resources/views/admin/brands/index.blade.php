@extends('admin.layouts.app')
@section('title', 'Brands')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Brands Management</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Brands</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        {{-- Add Brand Form --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add New Brand</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Brand Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Brand Name" required>
                                            @error('title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Brand Image</label>
                                            <input type="file" name="image" class="form-control" accept="image/*">
                                            <small class="text-muted">Allowed formats: JPG, PNG, GIF. Max size: 2MB</small>
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <button type="reset" class="btn btn-inverse">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Brands Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Brands</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->id }}</td>
                                            <td>
                                                <img src="{{ $brand->image_url }}" alt="{{ $brand->title }}"
                                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                            </td>
                                            <td>{{ $brand->title }}</td>
                                            <td>{{ $brand->slug }}</td>
                                            <td>{{ $brand->created_at->format('d M, Y') }}</td>
                                            <td class="text-nowrap">
                                                {{-- Edit --}}
                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editBrand{{ $brand->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                {{-- Delete --}}
                                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="delete-form" style="display:inline-block">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger btn-delete" data-title="{{ $brand->title }}">
        <i class="fa fa-trash"></i>
    </button>
</form>

                                            </td>
                                        </tr>

                                        {{-- Edit Modal --}}
                                        <div class="modal fade" id="editBrand{{ $brand->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Brand</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Brand Title</label>
                                                                <input type="text" name="title" class="form-control" value="{{ $brand->title }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Current Image</label>
                                                                <div class="mb-2">
                                                                    <img src="{{ $brand->image_url }}" alt="{{ $brand->title }}"
                                                                         style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Update Image (optional)</label>
                                                                <input type="file" name="image" class="form-control" accept="image/*">
                                                                <small class="text-muted">Leave empty to keep current image. Allowed formats: JPG, PNG, GIF. Max size: 2MB</small>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
    $('.btn-delete').click(function(e) {
        e.preventDefault(); // prevent default form submit

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
                form.submit(); // submit the form
            }
        });
    });
});

</script>

@endsection

