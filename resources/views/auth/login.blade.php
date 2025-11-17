@extends('layouts.auth')
@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url(/admin/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                {{-- Login Form --}}
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="box-title m-b-20 text-center">Sign In</h3>

                    {{-- Email --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                            @error('email')
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

                    {{-- Remember Me + Forgot Password --}}
                    <div class="form-group row">
                        <div class="col-md-12 font-14">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-dark pull-right">Forgot password?</a>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    {{-- Register Link --}}
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <div>Don't have an account?
                                <a href="{{ route('register') }}" class="text-info m-l-5"><b>Sign Up</b></a>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Recover Password Form --}}
                <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you!</p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
