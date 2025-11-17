@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Roles Management</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">

        {{-- Add Role Form --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add New Role</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.create') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Role Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter role name" required>
                                            <small class="form-text text-muted">Use lowercase without spaces</small>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
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

        {{-- Roles Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Roles</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Permissions</th>
                                        <th>Created At</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td><span class="badge badge-info">{{ $role->name }}</span></td>
                                            <td>
                                                @if($role->permissions->count())
                                                    @foreach($role->permissions as $permission)
                                                        <span class="badge badge-success">{{ $permission->name }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No permissions</span>
                                                @endif
                                            </td>
                                            <td>{{ $role->created_at->format('d M, Y') }}</td>
                                            <td class="text-nowrap">
                                                {{-- Edit --}}
                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editRole{{ $role->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                {{-- Permissions --}}
                                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#assignPermissions{{ $role->id }}">
                                                    <i class="fa fa-key"></i>
                                                </button>
                                                {{-- Delete --}}
                                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- Edit Modal --}}
                                        <div class="modal fade" id="editRole{{ $role->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Role</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Role Name</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
                                                                <small class="form-text text-muted">Use lowercase without spaces</small>
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

                                        {{-- Assign Permissions Modal --}}
                                        <div class="modal fade" id="assignPermissions{{ $role->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Assign Permissions ({{ $role->name }})</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @php
                                                                    $allPermissions = \Spatie\Permission\Models\Permission::all();
                                                                @endphp
                                                                @foreach($allPermissions as $permission)
                                                                    <div class="col-md-6 mb-2">
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input"
                                                                                name="permissions[]" value="{{ $permission->name }}"
                                                                                id="perm_{{ $role->id }}_{{ $permission->id }}"
                                                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="perm_{{ $role->id }}_{{ $permission->id }}">
                                                                                {{ $permission->name }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning">Update Permissions</button>
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
