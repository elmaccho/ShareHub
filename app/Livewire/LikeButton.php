<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function toggleLike()
    {
        $user = auth()->user();

        $hasLiked = $user->likes()->where('post_id', $this->post->id)->exists();
        if($hasLiked){
            $user->likes()->detach($this->post);
        } else {
            $user->likes()->attach($this->post);
        }
    }
    public function render()
    {
        return view('livewire.like-button');
    }
}
