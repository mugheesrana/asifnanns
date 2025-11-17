@extends('admin.layouts.app')
@section('title', 'Teams')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Team Management</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Teams</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="card-title">Team Members</h4>
                                    <h6 class="card-subtitle">Manage your team members</h6>
                                </div>
                                <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Team Member
                                </a>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($teams as $team)
                                            <tr>
                                                <td>{{ $team->id }}</td>
                                                <td>
                                                    @if ($team->image)
                                                        <img src="{{ asset($team->image) }}" alt="{{ $team->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 4px; border: 1px solid #dee2e6;">
                                                            <i class="fa fa-user text-muted" style="font-size: 20px;"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->role }}</td>
                                                <td>{{ $team->email }}</td>
                                                <td>{{ $team->phone }}</td>
                                                <td>{{ $team->created_at ? $team->created_at->format('Y-m-d') : '' }}</td>
                                                <td class="text-nowrap">
                                                    <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST" class="delete-form" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger btn-delete" data-title="{{ $team->name }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center text-muted">No team members found.</td>
                                            </tr>
                                        @endforelse
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
                e.preventDefault();

                var form = $(this).closest('form');
                var title = $(this).data('title') || "this team member";

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
        });
    </script>
@endsection

