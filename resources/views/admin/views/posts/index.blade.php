@extends('admin.dashboard')

@section('title', 'Posts')

@section('something')
<div class="posts-container mb-3">
    @foreach ($posts as $post)
        <div class="post-card mb-2">
            <p><strong>Author:</strong> <a href="{{ route('profile.index', $post->user->id) }}">{{ $post->user->name }} {{ $post->user->surname }}</a></p>
            <p><strong>Title:</strong> {{ $post->title }}</p>
            <p><strong>Content:</strong> ,,{{ $post->content }}"</p>
            <p><strong>Created at:</strong> {{ $post->created_at }}</p>
            

            <div class="action-buttons">
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal">
                    <i class="fa-solid fa-gavel"></i>
                </button>
    
                <button class="btn btn-success btn-sm" data-bs-toggle="modal">
                    <i class="fa-solid fa-pencil"></i>
                </button>
    
                <button class="btn btn-info btn-sm info-btn" data-bs-toggle="modal">
                    <i class="fa-solid fa-info"></i>
                </button>
            </div>
        </div>
    @endforeach
</div>
</div>

@endsection
@vite('resources/css/panel/posts-list.css')
@vite('resources/js/post.js')