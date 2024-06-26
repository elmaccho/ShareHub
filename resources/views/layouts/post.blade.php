<div class="sh-section d-flex flex-column mb-5 w-100" wire:key="post-{{ $post->id }}">
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
    <div class="post-category">
        <strong>
            {{ $post->category->category }}
        </strong>
    </div>
    <div class="post-title">
        {{ $post->title }}
    </div>
    <div class="post-image-thumbnail-wrapper">
        @if ($post->hasImage())
            @foreach($post->postImage as $image)
            <a class="text-decoration-none" href="{{ asset('storage/'. $image->file_path) }}" data-lightbox="post-{{ $post->id }}">
                <img class="post-image-thumbnail" src="{{ asset('storage/'. $image->file_path) }}" alt="">
            </a>
            @endforeach
        @endif
    
    </div>
    <div class="post-description mb-3">
        {{ $post->content }}
    </div>
    <div class="post-social-actions mb-3">
        {{-- <livewire:like-button :post="$post" wire:key="like-button-{{ $post->id }}"/> --}}        
        <button class="comment-btn sh-post-btn">
            <i class="fa-regular fa-heart"></i>
            {{ $post->likes()->count() }} Likes
        </button>
        <button class="comment-btn sh-post-btn">
            <i class="fa-regular fa-comment"></i> 
            {{ $post->comments->count() }} Comments
        </button>
        <button class="saves-btn sh-post-btn">
            <i class="fa-solid fa-bookmark"></i> 
            Saves
        </button>
    </div>
    <div class="row m-2">
        <a class="row m-0 p-0 text-decoration-none" href="{{ route("postpage.index", $post->id) }}">
            <button class="btn btn-outline-primary">Read more</button>
        </a>
    </div>
</div>  