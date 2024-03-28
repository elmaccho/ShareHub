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
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome.css', 'resources/css/three-dots.css', 'resources/js/welcomePage.js'])
    </head>
    <body class="antialiased">
        <nav class="navbar">
            <div class="brand-name">
                <a href="/" class="navbar-brand">ShareHub</a>
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
            <img id="background-video" src="{{ asset('images/0001-0230.gif') }}" alt="ShareHub logo"                 
            data-aos="fade-right"
            data-aos-duration="1000" >
            <div class="background-gradient"></div>
            <div class="header-content">
                <h1 data-aos="fade-left">ShareHub</h1>
                <h2 data-aos="fade-left">Share Inspire Connect</h2>
            </div>
        </section>
        <section id="about" data-aos="fade-in" data-aos-once="true" class="mb-3">
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
        <section id="popular-categories" class="mb-4">
            <h2>Popular Categories</h2>
            <div class="categories-wrapper">
                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="50">
                    <div class="card-header">
                        <i class="card-icon fa-solid fa-code"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Programming
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="15928">0 posts</span> posts</h4>
                    </div>
                </div>
                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="150">
                    <div class="card-header">
                        <i class="card-icon fa-solid fa-brush"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Design
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="1978">0 posts</span> posts </h4>
                    </div>
                </div>
                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="250">
                    <div class="card-header">
                        <i class="card-icon fa-solid fa-car"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Cars
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="5818">0 posts</span> posts </h4>
                    </div>
                </div>
                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="350">
                    <div class="card-header">
                        <i class="card-icon fa-solid fa-burger"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Cooking
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="593">0 posts</span> posts </h4>
                    </div>
                </div>

                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="450">
                    <div class="card-header">
                        <i class="card-icon fa-solid fa-dumbbell"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Programming
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="4928">0 posts</span> posts </h4>
                    </div>
                </div>
                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="550">
                    <div class="card-header">
                        <i class="card-icon fa-solid fa-book"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Marketing
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="2158">0 posts</span> posts </h4>
                    </div>
                </div>
                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="650">
                    <div class="card-header">
                        <i class="card-icon fa-brands fa-react"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Science
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="6418">0 posts</span> posts </h4>
                    </div>
                </div>
                <div class="cat-card" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="750">
                    <div class="card-header">
                        <i class="card-icon fa-solid fa-plane"></i>
                    </div>
                    <div class="card-footer">
                        <h3>
                            <strong>
                                Travelling
                            </strong>
                        </h3>
                        <h4><span class="postCount" data-target="213">0 posts</span> posts </h4>
                    </div>
                </div>
            </div>
        </section>
        <section id="how-to-start">
            <div class="hts-wrapper">
                <h2>How It Works?</h2>
                <p>
                    On ShareHub, you can create groups, receive rewards and badges for your activity, and earn medals for the most liked posts.
                    Users are rewarded for participating in discussions and sharing knowledge, creating an active and engaging community.
                </p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded px-5">Register Now!</a> 
                <div class="hts-row mt-5">
                    <div class="hts-card CFA" data-aos="zoom-in" data-aos-once="true" data-aos-delay="50">
                        <div class="hts-header">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <div class="hts-body">
                            Create Free Account
                        </div>
                    </div>
                    <div class="hts-card GL" data-aos="zoom-in" data-aos-once="true" data-aos-delay="150">
                        <div class="hts-header">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="hts-body">
                            Get Likes
                        </div>
                    </div>
                    <div class="hts-card CIG" data-aos="zoom-in" data-aos-once="true" data-aos-delay="250">
                        <div class="hts-header">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="hts-body">
                            Create Interest Groups
                        </div>
                    </div>
                    <div class="hts-card EM" data-aos="zoom-in" data-aos-once="true" data-aos-delay="350">
                        <div class="hts-header">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <div class="hts-body">
                            Earn Medals
                        </div>
                    </div>                     
                </div>  
            </div>
            <span class="question-mark-wrapper">
                <i class="fa-solid fa-question qm-1 qm" data-aos="zoom-in-up" data-aos-delay="100" data-aos-once="true"></i>
                <i class="fa-solid fa-question qm-2 qm" data-aos="zoom-in-up" data-aos-delay="200" data-aos-once="true"></i>
                <i class="fa-solid fa-question qm-3 qm" data-aos="zoom-in-up" data-aos-delay="300" data-aos-once="true"></i>
            </span>
        </section>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    </body>
    </html>
    