<div class="row" 
    @scroll.window.trottle="
    isScrolled = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight;

    if(isScrolled){
        @this.loadMorePosts();
    }
    "
>
    @foreach($posts as $post)
        @include('layouts.post')
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
