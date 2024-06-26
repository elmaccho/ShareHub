@extends('layouts.app')    
@section('content')
@include('helpers.flash-messages') 
    <div class="main-container d-flex justify-content-between align-items-start gap-5">
        <div class="side-menu col-4 d-flex flex-column gap-4">
            <button class="close-side-menu"><i class="fa-solid fa-xmark"></i></button>

            <form class="sh-section d-flex align-items-center" action="">
                <input class="form-control" type="search" name="" id="" placeholder="Search...">
                <button class="border-0 bg-transparent search-btn" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <livewire:show-categories/>

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
        <div class="post-container d-flex align-items-center flex-column gap-5">
            <div class="sh-section d-flex align-items-center sh-pointer" data-bs-toggle="modal" data-bs-target="#createPost">
                <div class="d-flex align-items-center gap-2">
                    <div class="user-profile-image">
                        @if (!is_null($loggedUser->profile_image_path))
                                <img class="user-profile-image" src="{{ asset('storage/'. $loggedUser->profile_image_path) }}" alt="{{ $loggedUser->name }} {{$loggedUser->surname}}">
                            @else
                                <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $loggedUser->name }} {{ $loggedUser->surname }}">
                        @endif
                    </div>
                    <p class="h3 m-0 welcome-message"><span class="inner-message">Hi {{ $loggedUser->name }}!</span> What's on your mind?</p>
                </div>
                <span class="comment-icon">
                    <i class="fa-solid fa-comment-dots"></i>
                </span>
            </div>
            @livewire('posts-list', ['id' => null])
        </div>
    </div>

    <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="createPostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('create-post')
                </div>
            </div>
        </div>
    </div>
    @livewire('report-modal')

    @vite('resources/css/home.css')
    @vite('resources/js/side_menu.js')
@endsection