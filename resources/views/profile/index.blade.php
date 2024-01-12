@extends('layouts.app')
@section('title', $user->name . ' ' . $user->surname . ' Profile')
@section('content')  
@include('helpers.flash-messages') 
    <div class="profile-container">
        <div class="user-info">
            <div class="background-image">
                @if (!is_null($user->background_image_path))
                        <img class="background-user-image" src="{{ asset('storage/'. $user->background_image_path) }}" alt="">
                    @else
                @endif
                @if (($user->id == Auth::user()->id))
                    <button class="upload-background-btn" data-bs-toggle="modal" data-bs-target="#backgroundImage">
                        <i class="fa-solid fa-camera"></i>
                    </button>
                @endif
            </div>
        </div>
        <div class="user-row mb-3">
            <div class="profile-image col-3">
                <div class="inner-layer">
                    @if (!is_null($user->profile_image_path))
                            <img class="user-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{ $user->surname }}">
                        @else
                            <img class="user-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                    @endif
                </div>
                @if (($user->id == Auth::user()->id))
                    <button class="upload-profile-btn" data-bs-toggle="modal" data-bs-target="#profileImage">
                        <i class="fa-solid fa-camera"></i>
                    </button>
                @endif
            </div>

            <div class="user-data col-6">
                <span class="user-sur-name">
                    <p>
                        {{ $user->name }}
                        {{ $user->surname }}
                    </p>
                </span>
                @if ($user->id == Auth::user()->id)
                    <div class="user-links">

                        <a class="sh-link d-flex align-items-center" href="{{ route('settings.index') }}">
                            <p class="m-0">Complete your profile information</p>
                        </a>
                    </div>
                @endif
            </div>

            <div class="user-action">
                <button class="user-action-btn bg-transparent border-0">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
            </div>
        </div>

        <div class="user-content">
            <div class="user-info-section">
                @if (!is_null($user->about))
                    <div class="sh-section bio-container">
                        <p class="mb-0"><strong>About Me</strong></p>
                        <hr class="m-0 mb-3">
                        <p class="mb-1">{{ $user->about }}</p>
                    </div>
                @endif
                @if ($user->hasSocialLinks())
                    <div class="sh-section d-flex flex-column">
                        <p class="mb-0"><strong>Social Links</strong></p>
                        <hr class="m-0 mb-3">
                        @if (!is_null($user->website_link))
                            <a class="sh-link" target="_blank" href="{{ $user->website_link }}"><i class="icon-settings fa-solid fa-globe"></i> Website</a>
                        @endif
                        @if (!is_null($user->github_link))
                            <a class="sh-link" target="_blank" href="{{ $user->github_link }}"><i class="icon-settings fa-brands fa-github"></i> Github</a>
                        @endif
                        @if (!is_null($user->youtube_link))
                            <a class="sh-link" target="_blank" href="{{ $user->youtube_link }}"><i class="icon-settings fa-brands fa-youtube"></i> Youtube</a>
                        @endif
                        @if (!is_null($user->instagram_link))
                            <a class="sh-link" target="_blank" href="{{ $user->instagram_link }}"><i class="icon-settings fa-brands fa-instagram"></i> Instagram</a>
                        @endif
                        @if (!is_null($user->facebook_link))
                            <a class="sh-link" target="_blank" href="{{ $user->facebook_link }}"><i class="icon-settings fa-brands fa-facebook"></i> Facebook</a>
                        @endif
                    </div>
                @endif
            </div>
            
            <div class="post-container d-flex align-items-center flex-column gap-3">
    
                {{ $user->name }}'s Posts

                @foreach ($posts as $post)
                <div class="sh-section d-flex flex-column">
                    <div class="dropdown comment-action">
                        <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis comment-action-btn"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><button class="dropdown-item">Report</button></li>
                          <li><a href="{{ route('post.edit', $post->id) }}"><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditPost">Edit</button></a></li>
                          <li><button class="dropdown-item delete-post-btn" data-post-id={{ $post->id }}>Delete</button></li>
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="profileImage" tabindex="-1" aria-labelledby="profileImageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileImageLabel">Change Profile Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="file" class="form-control" id="profileImage" name="user_profile_image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    @if (!is_null($user->profile_image_path))                        
                        <form action="{{ route('profile.deleteProfileImage', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete Profile Image</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="backgroundImage" tabindex="-1" aria-labelledby="backgroundImageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backgroundImageLabel">Change Background Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="file" class="form-control" id="backgroundImage" name="user_background_image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    @if (!is_null($user->background_image_path))                        
                        <form action="{{ route('profile.deleteBackgroundImage', $user) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete Background Image</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@vite('resources/css/home.css')
@vite('resources/css/profile.css')
@vite('resources/js/post.js')
@endsection
@section('javascript')
    const commentDeleteUrl = "{{ url('comment') }}/"
    const postdeleteUrl = "{{ url('profile') }}/"
@endsection
@section('js-files')
    @vite('resources/js/comment.js')
@endsection