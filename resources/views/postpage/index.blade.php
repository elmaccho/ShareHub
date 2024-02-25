@extends('layouts.app')
@section('title', '- '. $post->title)
@section('content')  
<div id="main-content" class="blog-page">
    <div class="container">
        <div class="row ms-2 me-2">
            <div class="card border-0">
                <div class="dropdown comment-action">
                    <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis comment-action-btn"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if (!Auth::user()->IsOwnerOfPost($post))
                            <li>
                                @livewire('report-button', [
                                    'type' => 'post',
                                    'targetId' => $post->id,
                                ], key('report-button-'. $post->id))
                            </li>
                        @endif
                    @if (Auth::user()->isAdmin() || Auth::user()->isModerator() || Auth::user()->isOwnerOfPost($post))
                        <li><a class="text-decoration-none" href="{{ route('post.edit', $post->id) }}"><button class="dropdown-item">Edit</button></a></li>
                        <li><livewire:delete-post :post="$post" wire:key="delete-post-{{ $post->id }}"/></li>
                    @endif
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row author">
                        <div class="icon-box d-flex gap-2 mb-2">
                            @if (!is_null($post->user->profile_image_path))
                                    <a href="{{ route('profile.index', $post->user->id) }}">
                                        <img class="user-profile-image" src="{{ asset('storage/'. $post->user->profile_image_path) }}" alt="{{ $post->user->name }} {{$post->user->surname}}">
                                    </a>
                                @else
                                    <a href="{{ route('profile.index', $post->user->id) }}">
                                        <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $post->user->name }} {{ $post->user->surname }}">
                                    </a>
                            @endif
                            <div class="text-box">
                                <h5 class="m-0">{{ $post->user->name }} {{ $post->user->surname }}</h5>
                                <strong>Author </strong>
                                <i><i class="fa-regular fa-clock"></i> {{ $post->created_at->diffForHumans() }}</i>
                            </div>
                        </div>
                    </div>
                    <div class="img-post">
                        <img class="d-block img-fluid" src="https://www.bootdey.com/image/1000x280/87CEFA/000000" alt="First slide">
                    </div>
                    <h3><strong>{{ $post->title }}</strong></h3>
                    <p>{{ $post->content }}</p>
                </div>    
                <div class="mb-3 d-flex">
                    <livewire:like-button :post="$post" wire:key="like-button-{{ $post->id }}"/>
                    <button class="comment-btn sh-post-btn">
                        <i class="fa-solid fa-comment"></i> 
                        {{ $post->comments->count() }} Comments
                    </button>
                    <button class="saves-btn sh-post-btn">
                        <i class="fa-solid fa-bookmark"></i> 
                        Saves
                    </button>
                </div>                    
            </div>
            <div class="card border-0">
                <div class="card-header">
                    <h2>Comments {{ $post->comments()->count() }}</h2>
                </div> 
                <div class="card-body">
                    <livewire:add-comment :post="$post" wire:key="add-comment-{{ $post->id }}"/>
                    <div class="row mt-3">
                        @forelse ($post->comments as $comment)
                            <ul class="comment-reply list-unstyled">
                                <li class="d-flex gap-3">
                                    <div class="icon-box">
                                        @if (!is_null($comment->user->profile_image_path))
                                                <img class="user-profile-image" src="{{ asset('storage/'. $comment->user->profile_image_path) }}" alt="{{ $comment->user->name }} {{$comment->user->surname}}">
                                            @else
                                                <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $comment->user->name }} {{ $comment->user->surname }}">
                                        @endif
                                    </div>
                                    <div class="text-box">
                                        <h5 class="m-0">{{ $comment->user->name }} {{ $comment->user->surname }}</h5>
                                        @if ($post->user->id == $comment->user->id)
                                            <strong>Author </strong>    
                                        @endif
                                        <i><i class="fa-regular fa-clock"></i> {{ $post->created_at->diffForHumans() }}</i>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                    <div class="dropdown comment-action">
                                        <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis comment-action-btn"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                @livewire('report-button', [
                                                    'type' => 'comment',
                                                    'targetId' => $comment->id,
                                                ])
                                            </li>
                                            @if (Auth::user()->isAdmin() || Auth::user()->isModerator() || Auth::user()->isOwnerOfComment($comment))
                                                <li><button type="button" class="dropdown-item">Edit</button></li>
                                                <li><button type="button" class="dropdown-item delete-comment-btn">Delete</button></li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            </ul>                                        
                            @empty
                            <p class="mb-0">No comments yet...</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@vite('resources/css/post_page.css')
@vite('resources/css/home.css')
@endsection