@extends('admin.layouts.app')
@section('title', 'Add Service')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add New Service</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                        <li class="breadcrumb-item active">Add Service</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Service Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h3 class="card-title">Service Information</h3>
                                    <hr>

                                    {{-- Title & Slug --}}
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" class="form-control"
                                                       value="{{ old('title') }}"
                                                       placeholder="Enter service title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Slug</label>
                                                <input type="text" name="slug" class="form-control"
                                                       value="{{ old('slug') }}"
                                                       placeholder="auto-generated if empty">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Category & Price --}}
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Category</label>
                                                <select name="service_category_id" class="form-control custom-select" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach($categories as $category)
                                                        @php
                                                            $label = $category->parent
                                                                ? $category->parent->name . ' → ' . $category->name
                                                                : $category->name;
                                                        @endphp
                                                        <option value="{{ $category->id }}"
                                                            {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="form-control-feedback">
                                                    Select a category or subcategory for this service.
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Price</label>
                                                <input type="number" step="0.01" name="price" class="form-control"
                                                       value="{{ old('price') }}"
                                                       placeholder="Optional price">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Featured</label>
                                                <div class="m-b-10">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" name="is_featured" value="yes"
                                                               class="custom-control-input"
                                                               {{ old('is_featured', 'no') == 'yes' ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Yes</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" name="is_featured" value="no"
                                                               class="custom-control-input"
                                                               {{ old('is_featured', 'no') == 'no' ? 'checked' : '' }}>
                                                        <span class="custom-control-label">No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Short Description --}}
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Short Description</label>
                                                <textarea name="short_description" rows="3" class="form-control"
                                                          placeholder="Brief summary shown in lists">{{ old('short_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Content --}}
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Description</label>
                                                <textarea name="description" id="summernote" class="form-control">
                                                    {{ old('description') }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Image & Status --}}
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Thumbnail Image</label>
                                                <input type="file" name="featured_image" class="form-control">
                                                <small class="form-control-feedback">
                                                    Recommended size e.g. 800x600, JPG/PNG/WebP up to 5MB
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <div class="m-b-10">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" name="status" value="active"
                                                               class="custom-control-input"
                                                               {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Active</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" name="status" value="inactive"
                                                               class="custom-control-input"
                                                               {{ old('status') == 'inactive' ? 'checked' : '' }}>
                                                        <span class="custom-control-label">Inactive</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- SEO --}}
                                    <h3 class="box-title m-t-40">SEO Information</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SEO Title</label>
                                                <input type="text" name="seo_title" class="form-control"
                                                       value="{{ old('seo_title') }}"
                                                       placeholder="SEO title for search engines">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SEO Tags</label>
                                                <input type="text" name="seo_tags" class="form-control"
                                                       data-role="tagsinput"
                                                       value="{{ old('seo_tags') }}"
                                                       placeholder="Add tags (comma separated)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>SEO Meta Description</label>
                                                <textarea name="seo_meta" rows="3" class="form-control"
                                                          placeholder="Meta description for search engines">{{ old('seo_meta') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                    <a href="{{ route('admin.services.index') }}" class="btn btn-inverse">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>
    </div>
@endsection

@section('script')
<script>
    jQuery(document).ready(function () {
        $('#summernote').summernote({
            height: 350,
            minHeight: null,
            maxHeight: null,
            focus: false,
            placeholder: 'Write your service description...'
        });
    });
</script>
@endsection
