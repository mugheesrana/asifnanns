@extends('admin.layouts.app')
@section('title', 'Edit User')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Edit User</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Edit User Info</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                                class="form-horizontal">
                                @csrf

                                <div class="form-body">
                                    <h3 class="box-title">Person Info</h3>
                                    <hr class="m-t-0 m-b-40">

                                    <!-- Name -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name"
                                                        value="{{ old('name', $user->name) }}" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" name="email"
                                                        value="{{ old('email', $user->email) }}" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone & Address -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Phone</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="phone"
                                                        value="{{ old('phone', $user->phone) }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Address</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="address"
                                                        value="{{ old('address', $user->address) }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Status</label>
                                                <div class="col-md-9">
                                                    <select name="status" class="form-control" required>
                                                        <option value="active"
                                                            {{ $user->status === 'active' ? 'selected' : '' }}>Active
                                                        </option>
                                                        <option value="inactive"
                                                            {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive
                                                        </option>
                                                        <option value="suspended"
                                                            {{ $user->status === 'suspended' ? 'selected' : '' }}>Suspended
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Leave blank if not changing">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Role Selection -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Role</label>
                                                <div class="col-md-9">
                                                    <select name="role" class="form-control" required>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}"
                                                                {{ $user->roles->first() && $user->roles->first()->name == $role->name ? 'selected' : '' }}>
                                                                {{ ucfirst($role->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Update</button>
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
