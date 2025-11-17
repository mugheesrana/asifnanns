@extends('admin.layouts.app')
@section('title', 'Add Service Category')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add New Service Category</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.service-categories.index') }}">Service Categories</a>
                        </li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Category Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.service-categories.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <h3 class="card-title">Category Information</h3>
                                    <hr>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                       value="{{ old('name') }}"
                                                       placeholder="Enter category name" required>
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

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Parent Category</label>
                                                <select name="parent_id" class="form-control custom-select">
                                                    <option value="">-- None (Main Category) --</option>
                                                    @foreach($parents as $parent)
                                                        <option value="{{ $parent->id }}"
                                                            {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                                            {{ $parent->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="form-control-feedback">
                                                    Select a parent to make this a subcategory.
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Sort Order</label>
                                                <input type="number" name="sort_order" class="form-control"
                                                       value="{{ old('sort_order', 0) }}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
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

                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Description</label>
                                                <textarea name="description" rows="4" class="form-control"
                                                          placeholder="Describe this category (optional)">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                    <a href="{{ route('admin.service-categories.index') }}"
                                       class="btn btn-inverse">Cancel</a>
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
