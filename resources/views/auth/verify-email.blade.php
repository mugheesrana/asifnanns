@extends('layouts.auth')

@section('content')
<section id="wrapper">
    <div class="login-register" style="background-image:url(/admin/assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">

                {{-- Status Message --}}
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success text-center">
                        A new verification link has been sent to your email address.
                    </div>
                @endif

                <h3 class="box-title m-b-20 text-center">Verify Your Email</h3>

                <p class="text-muted text-center m-b-20">
                    Thanks for signing up! <br>
                    Before getting started, please verify your email address by clicking the link we just emailed you.
                </p>

                {{-- Resend Button --}}
                <form method="POST" action="{{ route('verification.send') }}" class="form-horizontal">
                    @csrf
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                            Resend Verification Email
                        </button>
                    </div>
                </form>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}" class="form-horizontal">
                    @csrf
                    <div class="form-group text-center m-t-10">
                        <button class="btn btn-secondary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                            Logout
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
