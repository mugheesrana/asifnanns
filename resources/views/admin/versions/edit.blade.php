@extends('admin.layouts.app')
@section('title', 'Edit Car Version')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Edit Car Version</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.versions.index') }}">Car Versions</a></li>
                    <li class="breadcrumb-item active">Edit Version</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Edit Version</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.versions.update', $version->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Model</label>
                                                <select name="model_id" class="form-control" required>
                                                    <option value="">-- Select Model --</option>
                                                    @foreach ($models as $model)
                                                        <option value="{{ $model->id }}" {{ old('model_id', $version->model_id) == $model->id ? 'selected' : '' }}>
                                                            {{ $model->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('model_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Version Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Enter Version Name" value="{{ old('title', $version->title) }}" required>
                                                @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Meta Features</label>
                                                <input type="hidden" name="meta" class="meta-json-input">
                                                <div id="meta-fields">
                                                    @if($version->meta && is_array($version->meta))
                                                        @foreach($version->meta as $key => $value)
                                                            <div class="row meta-row mb-2">
                                                                <div class="col-md-5">
                                                                    <input type="text" name="meta_keys[]" class="form-control" placeholder="Feature Key" value="{{ $key }}">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="meta_values[]" class="form-control" placeholder="Feature Value" value="{{ $value }}">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <button type="button" class="btn btn-danger btn-sm remove-meta"><i class="fa fa-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
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
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-info btn-sm" id="add-meta-field"><i class="fa fa-plus"></i> Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                                    <a href="{{ route('admin.versions.index') }}" class="btn btn-inverse">Cancel</a>
                                </div>
                            </form>
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
            // Add meta field
            $('#add-meta-field').click(function() {
                var newField = `
                    <div class="row meta-row mb-2">
                        <div class="col-md-5">
                            <input type="text" name="meta_keys[]" class="form-control" placeholder="Feature Key">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="meta_values[]" class="form-control" placeholder="Feature Value">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-sm remove-meta"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                `;
                $('#meta-fields').append(newField);
                updateRemoveButtons();
            });

            // Remove meta field
            $(document).on('click', '.remove-meta', function() {
                $(this).closest('.meta-row').remove();
                updateRemoveButtons();
            });

            // Function to show/hide remove buttons
            function updateRemoveButtons() {
                var metaRows = $('#meta-fields .meta-row');
                if (metaRows.length === 1) {
                    metaRows.find('.remove-meta').hide();
                } else {
                    metaRows.find('.remove-meta').show();
                }
            }

            // Initial update
            updateRemoveButtons();

            // Before submit: build JSON meta
            $('form').on('submit', function(e) {
                var metaObj = {};
                $('#meta-fields .meta-row').each(function() {
                    var key = $(this).find('input[name="meta_keys[]"]').val();
                    var val = $(this).find('input[name="meta_values[]"]').val();
                    if (key && val) metaObj[key] = val;
                });
                var json = Object.keys(metaObj).length ? JSON.stringify(metaObj) : '';
                $('.meta-json-input').val(json);
            });
        });
    </script>
@endsection

