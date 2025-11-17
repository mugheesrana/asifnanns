@extends('admin.layouts.app')
@section('title', 'Settings')

@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Settings Management</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#general" role="tab">
                                <i class="ti-settings"></i> General Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#email" role="tab">
                                <i class="ti-email"></i> SMTP
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#social" role="tab">
                                <i class="ti-share"></i> Social Links
                            </a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content tabcontent-border">

                        <!-- General Settings -->
                        <div class="tab-pane active p-20" id="general" role="tabpanel">
                            <form action="{{ route('admin.settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Site Name</label>
                                        <input type="text" name="site_name" class="form-control"
                                            value="{{ $setting->site_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Slogan</label>
                                        <input type="text" name="slogan" class="form-control"
                                            value="{{ $setting->slogan }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                        @if ($setting->logo)
                                            <img src="{{ asset($setting->logo) }}" height="40">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label>Logo Light</label>
                                        <input type="file" name="logo_light" class="form-control">
                                        @if ($setting->logo_light)
                                            <img src="{{ asset($setting->logo_light) }}" height="40">
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Logo Mobile</label>
                                        <input type="file" name="logo_mobile" class="form-control">
                                        @if ($setting->logo_mobile)
                                            <img src="{{ asset($setting->logo_mobile) }}" height="40">
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Favicon</label>
                                        <input type="file" name="favicon" class="form-control">
                                        @if ($setting->favicon)
                                            <img src="{{ asset($setting->favicon) }}" height="30">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $setting->phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $setting->email }}">
                                    </div>
                                </div>
                                 <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $setting->address }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control"
                                            value="{{ $setting->location }}">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane p-20" id="email" role="tabpanel">
                            <form action="{{ route('admin.settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Mail Mailer</label>
                                        <input type="text" name="mail_mailer" class="form-control"
                                            value="{{ $setting->mail_mailer }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mail Host</label>
                                        <input type="text" name="mail_host" class="form-control"
                                            value="{{ $setting->mail_host }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Mail Port</label>
                                        <input type="number" name="mail_port" class="form-control"
                                            value="{{ $setting->mail_port }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Mail Username</label>
                                        <input type="text" name="mail_username" class="form-control"
                                            value="{{ $setting->mail_username }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    {{-- <div class="col-md-6">
                                        <label>Mail Password</label>
                                        <input type="password" name="mail_password" class="form-control"
                                            value="{{ $setting->mail_password }}">
                                    </div> --}}


                                    <div class="col-md-6">
                                        <label for="mail_password">Mail Password</label>
                                        <div class="input-group">
                                            <input id="mail_password" type="password" name="mail_password"
                                                class="form-control" value="{{ $setting->mail_password }}">
                                            <span class="input-group-text bg-white" style="cursor:pointer;"
                                                id="togglePassword">
                                                <i id="togglePasswordIcon" class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>


                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const pwd = document.getElementById('mail_password');
                                            const btn = document.getElementById('togglePassword');
                                            const icon = document.getElementById('togglePasswordIcon');

                                            btn.addEventListener('click', function() {
                                                const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                                                pwd.setAttribute('type', type);

                                                // toggle eye icon
                                                if (type === 'text') {
                                                    icon.classList.remove('fa-eye');
                                                    icon.classList.add('fa-eye-slash');
                                                } else {
                                                    icon.classList.remove('fa-eye-slash');
                                                    icon.classList.add('fa-eye');
                                                }
                                            });
                                        });
                                    </script>


                                    <div class="col-md-6">
                                        <label>Mail Encryption</label>
                                        <input type="text" name="mail_encryption" class="form-control"
                                            value="{{ $setting->mail_encryption }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Mail From Address</label>
                                        <input type="email" name="mail_from_address" class="form-control"
                                            value="{{ $setting->mail_from_address }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mail From Name</label>
                                        <input type="text" name="mail_from_name" class="form-control"
                                            value="{{ $setting->mail_from_name }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-sm-9">
                                        <div class="checkbox checkbox-success">
                                            <input id="smtp_active" type="checkbox" name="smtp_active" value="1"
                                                {{ $setting->smtp_active ? 'checked' : '' }}>
                                            <label for="smtp_active">Enable SMTP</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Social Links -->
                        <div class="tab-pane p-20" id="social" role="tabpanel">
                            <form action="{{ route('admin.social-links.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3"><input type="text" name="icon" placeholder="icon-class"
                                            class="form-control"></div>
                                    <div class="col-md-3"><input type="text" name="title" placeholder="Title"
                                            class="form-control"></div>
                                    <div class="col-md-3"><input type="url" name="link"
                                            placeholder="https://link" class="form-control"></div>
                                    <div class="col-md-2"><input type="number" name="order" placeholder="Order"
                                            class="form-control"></div>
                                    <div class="col-md-1"><button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </form>

                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Icon</th>
                                            <th>Title</th>
                                            <th>Link</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($socialLinks as $link)
                                            <tr>
                                                <td>{{ $link->id }}</td>
                                                <td><i class="{{ $link->icon }}"></i></td>
                                                <td>{{ $link->title }}</td>
                                                <td><a href="{{ $link->link }}"
                                                        target="_blank">{{ $link->link }}</a></td>
                                                <td>{{ $link->order }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $link->status ? 'badge-success' : 'badge-danger' }}">
                                                        {{ $link->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.social-links.destroy', $link->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- Tab content end -->

                </div>
            </div>
        </div>
    </div>
@endsection
