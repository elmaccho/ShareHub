@extends('layouts.app')    
@include('helpers.flash-messages') 
    @section('content')
    <div class="main-container d-flex justify-content-between align-items-start gap-5">
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
        <div class="post-container d-flex align-items-center flex-column gap-5">
            <div class="sh-section d-flex align-items-center sh-pointer" data-bs-toggle="modal" data-bs-target="#TTTEST">
                <div class="d-flex align-items-center gap-2">
                    <div class="user-profile-image">
                        @if (!is_null($user->profile_image_path))
                                <img class="user-profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{$user->surname}}">
                            @else
                                <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                        @endif
                    </div>
                    <p class="h3 m-0 welcome-message"><span class="inner-message">Hi {{ $user->name }}!</span> What's on your mind?</p>
                </div>
                <span class="comment-icon">
                    <i class="fa-solid fa-comment-dots"></i>
                </span>
            </div>

            @foreach ($posts as $post)
                <div class="sh-section d-flex flex-column">
                    <div class="author-info">
                        @if (!is_null($post->user->profile_image_path))
                                <img class="user-profile-image" src="{{ asset('storage/'. $post->user->profile_image_path) }}" alt="{{ $post->user->name }} {{$post->user->surname}}">
                            @else
                                <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $post->user->name }} {{ $post->user->surname }}">
                        @endif
                        <div class="post-info">
                            <div class="author-sur-name">
                                {{ $post->user->name }}
                                {{ $post->user->surname }}
                            </div>
                            <div class="post-date">
                                {{ $post->created_at }}
                            </div>
                        </div>
                    </div>
                    <div class="post-title">
                        {{ $post->title }}
                    </div>
                    <div class="post-description mb-3">
                        {{ $post->content }}
                    </div>
                    <div class="post-social-actions mb-3">
                        <button class="like-btn sh-post-btn">
                            <i class="fa-solid fa-heart"></i> 
                            {{ $post->likes }} Likes
                        </button>
                        <button class="comment-btn sh-post-btn">
                            <i class="fa-solid fa-comment"></i> 
                            {{ $post->comments }} Comments
                        </button>
                        <button class="saves-btn sh-post-btn">
                            <i class="fa-solid fa-bookmark"></i> 
                            {{ $post->saves }} Saves
                        </button>
                    </div>
                    <div class="post-comments-section">

                    </div>
                    <div class="post-add-comment d-flex align-items-center gap-2">
                        @if (!is_null($user->profile_image_path))
                                <img class="user-profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{$user->surname}}">
                            @else
                                <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                        @endif

                        <form action="" method="post">
                            <input class="sh-input" type="text" name="" id="" placeholder="Write your comment...">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="TTTEST" tabindex="-1" aria-labelledby="TTTESTLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TTTESTLabel">Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <input type="text" class="form-control" id="title" name="title" placeholder="Title..." required>
                        </div>
                        <div class="mb-3">
                          <textarea class="form-control" id="content" name="content" rows="4" placeholder="Content..."></textarea>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Post</button>
                            <label for="image-upload" id="upload-icon" class="form-label sh-pointer">
                                <i class="fa-solid fa-image"></i>
                            </label>
                            <input type="file" class="form-control d-none" id="image-upload" name="image" accept="image/*">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/css/home.css')
    @vite('resources/js/side_menu.js')
@endsection
