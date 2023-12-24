@extends('layouts.app')    
    @section('content')
    <div class="main-container d-flex justify-content-between align-items-start">
        <div class="side-menu col-4 d-flex flex-column gap-4">
            <button class="close-side-menu"><i class="fa-solid fa-xmark"></i></button>
            <form class="sh-section d-flex align-items-center" action="">
                <input class="form-control" type="search" name="" id="" placeholder="Search...">
                <button class="border-0 bg-transparent search-btn" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <div class="buttons-wrapper d-flex align-items-center flex-column gap-4">
                <div class="sh-section d-flex flex-column">
                    <a class="menu-link" href="#"><i class="fa-solid fa-people-group"></i> Friends</a>
                    <a class="menu-link" href="#"><i class="fa-solid fa-boxes-stacked"></i> Saved posts</a>
                    <a class="menu-link" href="#"><i class="fa-solid fa-users-between-lines"></i> Groups</a>
                </div>
                <div class="sh-section d-flex flex-column">
                    <a class="menu-link" href="#"><i class="fa-solid fa-gear"></i> Settings</a>
                </div>
            </div>
        </div>
        <div class="post-container d-flex align-items-center col-7">
            <div class="sh-section d-flex align-items-center col-7">
                <div class="d-flex align-items-center gap-2">
                    <div class="user-profile-image">
                        <img src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                    </div>
                    <p class="h3 m-0 welcome-message"><span class="inner-message">Hi {{ $user->name }}!</span> What's on your mind?</p>
                </div>
                <span class="comment-icon">
                    <i class="fa-solid fa-comment-dots"></i>
                </span>
            </div>
        </div>
    </div>
    @vite('resources/css/home.css')
    @vite('resources/js/side_menu.js')
@endsection
