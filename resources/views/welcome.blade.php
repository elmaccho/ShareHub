<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ShareHub</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome.css', 'resources/css/three-dots.css', 'resources/js/aboutButtonClick.js'])
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
            <video id="background-video" autoplay muted loop 
                data-aos="fade-right"
                data-aos-duration="1000" 
                >
                <source src="{{ asset('images/0001-0230.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="background-gradient"></div>
            <div class="header-content">
                <h1 data-aos="fade-left">ShareHub</h1>
                <h2 data-aos="fade-left">Share Inspire Connect</h2>
            </div>
        </section>
        <section id="about" data-aos="fade-in" data-aos-once="true">
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
                        <p id="typing1"></p>
                    </div>
                    <span id="typing2" class="created-at-text"></span>
                </span>
            </div>
            <div class="row row-right send-message-here">

            </div>
            <div class="row-input-wrapper">
                <textarea class="form-control row-input" type="text" name="" id="typing3" disabled></textarea>
                <button class="btn btn-primary btn-lg input-btn" disabled><i class="fa-regular fa-paper-plane"></i></button>
            </div>
        </section>
        <section id="popular-categories">

        </section>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    </body>
    </html>
    