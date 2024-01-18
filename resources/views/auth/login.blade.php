@extends('layouts.app')

@section('content')
<div class="container">
    <a href="#" class="logo-brand-wrapper">
        <img src="{{ asset('images/sharehub.png') }}" alt="Brand Logo" class="brand-logo">
        <div class="brand-info">
            <h1 class="brand-main">{{ config('app.name', 'Laravel') }}</h1>
            <p class="brand-slogan">Share Inspire Connect</p>
        </div>
    </a>
    <div class="form-wrapper">
        <div class="form-header mb-5 d-flex flex-column align-items-center">
            <span class="h1">Login</span>

            @if (session('error'))
            <div class="alert alert-danger m-0">
                {{ session('error') }}
            </div>
         @endif
        </div>
        <div class="form-body">
            <form class="form-box" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-row mb-4">
                        <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-row">
                        <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-row mb-4">
                    <span class="form-sett">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                <strong>{{ __('Forgot Your Password?') }}</strong>
                            </a>
                        @endif
                        <div class="form-check">
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>

                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        </div>
                    </span>
                </div>

                <div class="form-row">
                        <button type="submit" class="form-btn">
                            Log in
                        </button>
                </div>

                <div class="form-row mt-4">
                    <span>Not a member? <a class="btn-link text-decoration-none" href="{{ route('register') }}"><strong>Register now!</strong></a></span>
                </div>
            </form>
        </div>
    </div>
</div>
@vite('resources/css/auth.css')
@endsection
 