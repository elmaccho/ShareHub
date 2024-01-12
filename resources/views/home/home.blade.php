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
                    <div class="dropdown comment-action">
                        <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis comment-action-btn"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><button class="dropdown-item">Report</button></li>
                          @if ($user->isAdmin() || $user->isModerator() || $user->isOwnerOfPost($post))
                            <li><a href="{{ route('post.edit', $post->id) }}"><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditPost">Edit</button></a></li>
                            <li><button class="dropdown-item delete-post-btn" data-post-id={{ $post->id }}>Delete</button></li>
                          @endif
                        </ul>
                    </div>
                    <div class="author-info">
                        <a href="{{ route('profile.index', $post->user->id) }}">
                            @if (!is_null($post->user->profile_image_path))
                                    <img class="user-profile-image" src="{{ asset('storage/'. $post->user->profile_image_path) }}" alt="{{ $post->user->name }} {{$post->user->surname}}">
                                @else
                                    <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $post->user->name }} {{ $post->user->surname }}">
                            @endif
                        </a>
                        <div class="post-info">
                            <div class="author-sur-name">
                                {{ $post->user->name }}
                                {{ $post->user->surname }}
                            </div>
                            <div class="post-date">
                                <i class="fa-solid fa-clock"></i> {{ $post->created_at }}
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
                        @if (Auth::user()->likesPost($post))
                            <form action="{{ route('post.unlike', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="like-btn sh-post-btn">
                                    <i class="fa-solid fa-heart"></i>
                                    {{ $post->likes()->count() }} Unlike
                                </button>
                            </form>
                        @else
                            <form action="{{ route('post.like', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="like-btn sh-post-btn">
                                    <i class="fa-regular fa-heart"></i>
                                    {{ $post->likes()->count() }} Like
                                </button>
                            </form>
                        @endif
                        <button class="comment-btn sh-post-btn">
                            <i class="fa-solid fa-comment"></i> 
                            {{ $post->comments->count() }} Comments
                        </button>
                        <button class="saves-btn sh-post-btn">
                            <i class="fa-solid fa-bookmark"></i> 
                            Saves
                        </button>
                    </div>
                        @livewire('comment-list', ['postId' => $post->id])
                    <div class="post-add-comment d-flex align-items-center gap-2">
                        <a href="{{ route('profile.index', $user->id) }}">
                            @if (!is_null($user->profile_image_path))
                                    <img class="user-profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{$user->surname}}">
                                @else
                                    <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                            @endif
                        </a>

                        @livewire('add-comment', ['postId' => $post->id])
                    </div>
                </div>
            @endforeach

            {{ $posts->links() }}
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
    @vite('resources/js/post.js')
@endsection
@section('javascript')
    const commentDeleteUrl = "{{ url('comment') }}/";
    const postdeleteUrl = "{{ url('home') }}/"
@endsection
@section('js-files')
    @vite('resources/js/comment.js');
@endsection