<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentList extends Component
{
    protected $listeners = ['refreshCommentsList'];
    public $comments;
    public Comment $comment;
    public function mount(Comment $comment)
    {
        $this->comments = Comment::all();
        $this->comment = $comment;
    }
    public function refreshCommentsList()
    {
        // $this->comments = Comment::all();
        // dd($this->comment);
    }
    public function render()
    {
        return view('livewire.comment-list');
    }
}