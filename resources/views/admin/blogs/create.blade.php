@extends('admin.layouts.app')
@section('title', 'Add Blog')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Add New Blog</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
                        <li class="breadcrumb-item active">Add Blog</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Blog Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h3 class="card-title">Blog Information</h3>
                                    <hr>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Enter blog title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Slug</label>
                                                <input type="text" name="slug" class="form-control"
                                                    placeholder="auto-generated if empty">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Excert</label>
                                                <textarea name="excert" rows="6" class="form-control" placeholder="Write your excert..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Content</label>
                                                <textarea name="content" id="summernote" class="form-control">
                                                {{ old('content', $blog->content ?? '') }}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Categories</label>
                                                <select name="category_ids[]" class="form-control custom-select" multiple
                                                    required>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="form-control-feedback">Hold CTRL to select multiple
                                                    categories</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Featured Image</label>
                                                <input type="file" name="featured_image" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <div class="m-b-10">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" name="status" value="active"
                                                            class="custom-control-input" checked>
                                                        <span class="custom-control-label">Active</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" name="status" value="inactive"
                                                            class="custom-control-input">
                                                        <span class="custom-control-label">Inactive</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Publish Date</label>
                                                <input type="date" name="published_at" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="box-title m-t-40">SEO Information</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SEO Title</label>
                                                <input type="text" name="seo_title" class="form-control"
                                                    placeholder="SEO title for search engines">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SEO Tags</label> <br>
                                                <input type="text" name="seo_tags" class="form-control col-md-12"
                                                    data-role="tagsinput" placeholder="Add tags (comma separated)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>SEO Meta Description</label>
                                                <textarea name="seo_meta" rows="3" class="form-control" placeholder="Meta description for search engines"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-inverse">Cancel</a>
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
            height: 350,        // editor height
            minHeight: null,    // no minimum
            maxHeight: null,    // no maximum
            focus: false,       // don't focus automatically
            placeholder: 'Write your blog content...'
        });


    });
</script>
@endsection
