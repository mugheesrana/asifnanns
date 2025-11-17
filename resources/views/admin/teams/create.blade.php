@extends('admin.layouts.app')
@section('title', 'Add Team Member')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add New Team Member</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.teams') }}">Teams</a></li>
                        <li class="breadcrumb-item active">Add Team Member</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Team Member Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h3 class="card-title">Basic Information</h3>
                                    <hr>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Role / Designation</label>
                                                <input type="text" name="role" class="form-control" placeholder="e.g., Sales Manager" value="{{ old('role') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Enter phone" value="{{ old('phone') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Short Bio</label>
                                                <textarea name="bio" rows="4" class="form-control" placeholder="Write a short bio...">{{ old('bio') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Profile Image</label>
                                                <input type="file" name="image" class="form-control" accept="image/*">
                                                <small class="text-muted">Allowed formats: JPG, PNG. Max size: 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                    <a href="{{ route('admin.teams') }}" class="btn btn-inverse">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

