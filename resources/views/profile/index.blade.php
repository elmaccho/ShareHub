<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Auth::user()->name }} - profile</title>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/nav.css')
    @vite('resources/css/profile.css')
</head>
<body>
    @include('layouts.nav')
    <div class="content">
        <div class="user-info">
            <div class="background-image">
    
            </div>
            <div class="user-row ms-5">
                <div class="profile-image">
        
                </div>
            </div>
            <div class="user-row w-100">
                <span class="user-sur-name h1">
                    <strong>
                        {{ Auth::user()->name }}
                        {{ Auth::user()->surname }}
                    </strong>
                </span>
                <div class="user-links">
                    <a href="#">
                        <i class="fa-solid fa-location-dot"></i> Add address
                    </a>
                    <a href="#">
                        <i class="fa-brands fa-facebook-f"></i> Add links
                    </a>
                    <a href="#">
                        <i class="fa-solid fa-info"></i> Add more information
                    </a>
                </div>
            </div>
            <div class="user-row m-2 d-flex align-items-top">
                <button class="btn">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
            </div>
        </div>
    </div>
</body>
</html>