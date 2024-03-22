<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ShareHub</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome.css'])
    </head>
    <body class="antialiased">
        <nav class="navbar">
            <div class="brand-name">
                <a href="/" class="navbar-brand">ShareHub</a>
            </div>
            <div class="nav-links">
                {{-- <a href="">Home</a> --}}
            </div>
            @if (Route::has('login'))
                <div class="d-flex gap-3">
                    @auth
                            <a class="btn btn-outline-primary rounded btn-lg" href="{{ url('/home') }}">Forum</a>
                    @else
                            <a class="btn btn-primary rounded rounded btn-lg" href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                                <a class="btn btn-outline-primary rounded btn-lg" href="{{ route('register') }}">Register</a>  
                        @endif
                    @endauth
                </div>
            @endif
            
        </nav>
        <section id="header">
            <video id="background-video" autoplay muted loop>
                <source src="{{ asset('images/0001-0230.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="background-gradient"></div>
            <div class="header-content">
                <h1>ShareHub</h1>
                <h2>Share Inspire Connect</h2>
            </div>
        </section>
        <section id="about">
            <div class="row row-right">
                <span>
                    <div class="card card-right">
                        <p>
                            At ShareHub, we believe that sharing knowledge, inspiring each other and making new connections is the key
                            to personal and professional development.
                        </p>
                    </div>
                    <span class="created-at-text">3 minutes ago</span>
                </span>
            </div>
            <div class="row row-left">
                <div class="user-wrapper">
                    <i class="fa-solid fa-user"></i>
                </div>
                <span>
                    <div class="card card-left">
                        <p>
                            Our community is a place where passions meet opportunities and ideas take wings.
                            Whether you're an expert in your field or just looking for inspiration, you'll find your place on ShareHub.
                        </p>
                    </div>
                    <span class="created-at-text">2 minutes ago</span>
                </span>
            </div>
            <div class="row row-right">
                <span>
                    <div class="card card-right">
                        <p>
                            Join us today to share, inspire and make new, valuable connections!
                        </p>
                    </div>
                    <span class="created-at-text">11 seconds ago</span>
                </span>
            </div>
        </section>
    </body>
    </html>
    