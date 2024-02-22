<div class="row" 
    @scroll.window.trottle="
    isScrolled = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight;

    if(isScrolled){
        @this.loadMorePosts();
    }
    "
>
    @foreach($posts as $post)
        <div class="sh-section d-flex flex-column mb-5" wire:key="post-{{ $post->id }}">
            <div class="dropdown comment-action">
                <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis comment-action-btn"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (!$loggedUser->IsOwnerOfPost($post))
                        <li>
                            @livewire('report-button', [
                                'type' => 'post',
                                'targetId' => $post->id,
                            ], key('report-button-'. $post->id))
                        </li>
                    @endif
                @if ($loggedUser->isAdmin() || $loggedUser->isModerator() || $loggedUser->isOwnerOfPost($post))
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
            <div class="row m-2">
                <a class="row m-0 p-0 text-decoration-none" href="{{ route("postpage.index", $post->id) }}">
                    <button class="btn btn-outline-primary">Read more</button>
                </a>
            </div>
        </div>  
    @endforeach

    @if (!$allPostsLoaded)
        <div wire:loading wire:target="loadMorePosts">
            @include('layouts.postplaceholder')
        </div>
        
        <div class="row" wire:loading.remove wire:target="loadMorePosts">
            <button class="btn btn-sm btn-outline-primary" wire:click="loadMorePosts">Load More</button>
        </div>
    @endif

    @if ($allPostsLoaded)
    <div class="row">
        <strong class="d-flex justify-content-center">
            No more posts for today!
        </strong>
    </div>
    @endif
</div>
