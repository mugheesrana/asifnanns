@extends('layouts.auth')

@section('content')
<section id="wrapper">
    <div class="login-register pt-1" style="background-image:url(/admin/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="registerform" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h3 class="box-title m-b-20">Register</h3>

                    {{-- Hidden Role (always buyer) --}}
                    <input type="hidden" name="role" value="buyer">

                    {{-- Name --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" required placeholder="Full Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone (Optional)">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea class="form-control" name="address" placeholder="Address (Optional)">{{ old('address') }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required placeholder="Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password_confirmation" required placeholder="Confirm Password">
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                    {{-- Login Redirect --}}
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-info m-l-5"><b>Login</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
