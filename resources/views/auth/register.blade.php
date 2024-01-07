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
        <div class="form-header mb-5">
            <span class="h1">Register</span>
        </div>
        <div class="form-body">
            <form class="form-box" method="POST" action="{{ route('register') }}">
                @csrf

                <span class="sur-name-wrapper mb-4">
                    <div class="form-row">
                        <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="form-row">
                        <input id="surname" type="text" class="form-input @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus placeholder="Surname">
    
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </span>

                <div class="form-row mb-4">
                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-row mb-4">
                    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-row mb-5">
                    <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>


                <div class="form-row mb-5">
                    <button type="submit" class="form-btn">
                        Register
                    </button>
                </div>

                <div class="form-row">
                    <p>Already have account? <strong><a class="btn-link text-decoration-none" href="{{ route('login') }}">Login now!</a></strong></p>
                </div>
            </form>
        </div>
    </div>
</div>
@vite('resources/css/auth.css')
@endsection
