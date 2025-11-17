@extends('layouts.auth')

@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url(/admin/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">

                {{-- Success Message --}}
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal form-material" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h3 class="box-title m-b-20">Forgot Password</h3>
                    <p class="text-muted">Enter your email address and we'll send you a link to reset your password.</p>

                    {{-- Email --}}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                                Send Reset Link
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
