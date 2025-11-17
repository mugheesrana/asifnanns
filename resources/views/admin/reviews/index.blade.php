@extends('admin.layouts.app')
@section('title', 'Reviews')
@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Reviews Management</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Reviews</li>
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
                                    <h4 class="card-title">All Reviews</h4>
                                    <h6 class="card-subtitle">Manage customer reviews and visibility</h6>
                                </div>
                            </div>

                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Rating</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Change Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->id }}</td>
                                                 <td>
                                                    @if ($review->image)
                                                        <img src="{{ asset($review->image) }}" alt="{{ $review->name }}" class="img-thumbnail review-thumbnail" style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;" onclick="showReviewImageModal('{{ asset($review->image) }}', '{{ $review->name }}')">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 4px; border: 1px solid #dee2e6;">
                                                            <i class="fa fa-user text-muted" style="font-size: 20px;"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $review->name ?? '—' }}</td>
                                                <td>{{ $review->email ?? '—' }}</td>
                                                <td>
                                                    @if ($review->rating)
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }} text-warning"></i>
                                                        @endfor
                                                    @else
                                                        —
                                                    @endif
                                                </td>
                                                <td style="max-width: 250px; cursor: pointer;" onclick="showReviewMessageModal(`{{ addslashes($review->message) }}`)">
                                                    {{ Str::limit($review->message, 20) }}
                                                </td>

                                                <td>
                                                    <span class="badge badge-{{ $review->status ? 'success' : 'secondary' }}">
                                                        {{ $review->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td>{{ $review->created_at ? $review->created_at->format('Y-m-d') : '—' }}</td>
                                                <td>
                                                    <form action="{{ route('admin.reviews.status', $review->id) }}" method="POST" class="form-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                            <option value="1" {{ $review->status ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ ! $review->status ? 'selected' : '' }}>Inactive</option>
                                                        </select>
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

    <!-- Image Preview Modal -->
    <div class="modal fade" id="reviewImageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewImageModalTitle">Review Image</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="reviewModalImage" src="" alt="Review Image" class="img-fluid" style="max-height: 500px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Message Preview Modal -->
    <div class="modal fade" id="reviewMessageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Review Message</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="reviewModalMessage" style="white-space: pre-wrap;"></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .review-thumbnail:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .table td {
            vertical-align: middle;
        }

        .img-thumbnail {
            border-radius: 6px;
        }
    </style>

    <script>
        function showReviewImageModal(imageSrc, title) {
            document.getElementById('reviewModalImage').src = imageSrc;
            document.getElementById('reviewImageModalTitle').textContent = title || 'Review Image';
            $('#reviewImageModal').modal('show');
        }

        function showReviewMessageModal(message) {
            document.getElementById('reviewModalMessage').textContent = message || '';
            $('#reviewMessageModal').modal('show');
        }
    </script>
@endsection

