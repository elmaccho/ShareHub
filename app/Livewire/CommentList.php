<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CommentList extends Component
{
    protected $listeners = ['commentAdded' => 'refresh'];

    public $postId;

    public function refresh()
    {
        $this->render();
    }
    public function render()
    {
        $post = Post::find($this->postId);

        return view('livewire.comment-list', [
            'comments' => $post->comments,
        ]);
    }
}