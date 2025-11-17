@extends('admin.layouts.app')
@section('title', 'Create User')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Create New User</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">User Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.store') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <h3 class="box-title">Personal Info</h3>
                                    <hr class="m-t-0 m-b-40">

                                    <!-- Name & Email -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Full Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="John Doe" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="john@example.com" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password & Phone -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="********" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Phone</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="0300xxxxxxx">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-2">Address</label>
                                                <div class="col-md-10">
                                                    <textarea name="address" class="form-control" placeholder="Enter full address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Role & Status -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Role</label>
                                                <div class="col-md-9">
                                                    <select name="role" class="form-control" required>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Status</label>
                                                <div class="col-md-9">
                                                    <select name="status" class="form-control" required>
                                                        <option value="active" selected>Active</option>
                                                        <option value="inactive">Inactive</option>
                                                        <option value="suspended">Suspended</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Save User</button>
                                    <a href="{{ route('admin.users') }}" class="btn btn-inverse">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
