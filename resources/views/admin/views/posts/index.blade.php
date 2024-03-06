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
            @if ($loggedUser->isAdmin() || $loggedUser->isModerator() || $loggedUser->isOwnerOfPost($post))
                <a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-success btn-sm"><i class="fa-solid fa-pencil"></i></button></a>
                <livewire:delete-post :post="$post" wire:key="delete-post-{{ $post->id }}"/>
            @endif
        </div>
    </div>
    @endforeach
</div>
{{ $posts->links() }}
</div>

@endsection
@vite('resources/css/panel/posts-list.css')