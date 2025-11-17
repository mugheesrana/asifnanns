@extends('layouts.auth')

@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url(/admin/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">

                <form class="form-horizontal form-material" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <h3 class="box-title m-b-20">Reset Password</h3>

                    {{-- Email --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{ old('email', $request->email) }}" required placeholder="Email Address">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- New Password --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password" name="password"
                                required placeholder="New Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password_confirmation"
                                name="password_confirmation" required placeholder="Confirm Password">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                                Reset Password
                            </button>
                        </div>
                    </div>

                    {{-- Back to Login --}}
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('login') }}" class="text-info m-l-5"><b>Back to Login</b></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
