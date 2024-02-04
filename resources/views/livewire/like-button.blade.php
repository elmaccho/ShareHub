<div>
    @if (Auth::user()->likesPost($post))
            <button wire:click="toggleLike" type="submit" class="like-btn sh-post-btn">
                <i class="fa-solid fa-heart"></i>
                {{ $post->likes()->count() }} Unlike
            </button>
        @else
            <button wire:click="toggleLike" type="submit" class="like-btn sh-post-btn">
                <i class="fa-regular fa-heart"></i>
                {{ $post->likes()->count() }} Like
            </button>
    @endif
</div>
