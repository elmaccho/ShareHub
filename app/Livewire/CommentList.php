<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentList extends Component
{
<<<<<<< HEAD
    protected $listeners = ['commentAdded' => 'refresh'];

    public $postId;
    public function mount($postId)
    {
        $this->postId = $postId;
    }
    public function refresh()
=======
    public Comment $comment;
    public function mount(Comment $comment)
>>>>>>> 54e27fd
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.comment-list');
    }
}