@extends('admin.layouts.app')
@section('title', 'Car Versions')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Car Versions Management</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Car Versions</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            {{-- Add Version Form --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Add New Version</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.versions.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="control-label">Model</label>
                                                <select name="model_id" class="form-control" required>
                                                    <option value="">-- Select Model --</option>
                                                    @foreach ($models as $model)
                                                        <option value="{{ $model->id }}">{{ $model->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('model_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="control-label">Version Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Enter Version Name" required>
                                                @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Meta Features</label>
                                                <div id="meta-fields">
                                                    <div class="row meta-row mb-2">
                                                        <div class="col-md-5">
                                                            <input type="text" name="meta_keys[]" class="form-control" placeholder="Feature Key (e.g., engine)">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" name="meta_values[]" class="form-control" placeholder="Feature Value (e.g., 1500cc)">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-danger btn-sm remove-meta" style="display:none;"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-info btn-sm" id="add-meta-field"><i class="fa fa-plus"></i> Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                    <button type="reset" class="btn btn-inverse">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Versions Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Versions</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Model</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Meta</th>
                                            <th>Created At</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($versions as $version)
                                            <tr>
                                                <td>{{ $version->id }}</td>
                                                <td>{{ $version->model->title ?? '-' }}</td>
                                                <td>{{ $version->title }}</td>
                                                <td>{{ $version->slug }}</td>
                                                <td>
                                                    <pre>{{ json_encode($version->meta, JSON_PRETTY_PRINT) }}</pre>
                                                </td>
                                                <td>{{ $version->created_at->format('d M, Y') }}</td>
                                                <td class="text-nowrap">
                                                    {{-- Edit --}}
                                                    <a href="{{ route('admin.versions.edit', $version->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{-- Delete --}}
                                                    <form action="{{ route('admin.versions.destroy', $version->id) }}"
                                                        method="POST" class="delete-form" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                            data-title="{{ $version->title ?? 'this version' }}">
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Delete confirmation
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
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
                        form.submit();
                    }
                });
            });

            // Add meta field for create form
            $('#add-meta-field').click(function() {
                var newField = `
                    <div class="row meta-row mb-2">
                        <div class="col-md-5">
                            <input type="text" name="meta_keys[]" class="form-control" placeholder="Feature Key (e.g., engine)">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="meta_values[]" class="form-control" placeholder="Feature Value (e.g., 1500cc)">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm remove-meta"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                `;
                $('#meta-fields').append(newField);
                updateRemoveButtons('#meta-fields');
            });

            // Remove meta field
            $(document).on('click', '.remove-meta', function() {
                var container = $(this).closest('.meta-row').parent();
                $(this).closest('.meta-row').remove();
                updateRemoveButtons(container);
            });

            // Function to show/hide remove buttons
            function updateRemoveButtons(container) {
                var metaRows = $(container).find('.meta-row');
                if (metaRows.length === 1) {
                    metaRows.find('.remove-meta').hide();
                } else {
                    metaRows.find('.remove-meta').show();
                }
            }

            // Initial update
            updateRemoveButtons('#meta-fields');
        });
    </script>

@endsection
