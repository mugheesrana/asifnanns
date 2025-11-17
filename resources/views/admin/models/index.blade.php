@extends('admin.layouts.app')
@section('title', 'Car Models')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Car Models Management</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Car Models</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        {{-- Add Car Model Form --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add New Car Model</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.models.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Select Brand</label>
                                            <select name="brand_id" class="form-control" required>
                                                <option value="">-- Choose Brand --</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Model Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Model Name" required>
                                            @error('title')
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

        {{-- Car Models Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Car Models</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Model Title</th>
                                        <th>Slug</th>
                                        <th>Brand</th>
                                        <th>Created At</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $model->id }}</td>
                                            <td>{{ $model->title }}</td>
                                            <td>{{ $model->slug }}</td>
                                            <td>{{ $model->brand->title ?? 'N/A' }}</td>
                                            <td>{{ $model->created_at->format('d M, Y') }}</td>
                                            <td class="text-nowrap">
                                                {{-- Edit --}}
                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModel{{ $model->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                {{-- Delete --}}
                                               <form action="{{ route('admin.models.destroy', $model->id) }}" method="POST" class="delete-form" style="display:inline-block">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger btn-delete" data-title="{{ $model->title ?? 'this model' }}">
        <i class="fa fa-trash"></i>
    </button>
</form>

                                            </td>
                                        </tr>

                                        {{-- Edit Modal --}}
                                        <div class="modal fade" id="editModel{{ $model->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <form method="POST" action="{{ route('admin.models.update', $model->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Car Model</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Model Title</label>
                                                                <input type="text" name="title" class="form-control" value="{{ $model->title }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Select Brand</label>
                                                                <select name="brand_id" class="form-control" required>
                                                                    @foreach($brands as $brand)
                                                                        <option value="{{ $brand->id }}" {{ $brand->id == $model->brand_id ? 'selected' : '' }}>
                                                                            {{ $brand->title }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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
