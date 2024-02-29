<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentList extends Component
{
    protected $listeners = ['refreshCommentsList'];
    public $comments;
    public Post $post;
    public function mount(Post $post)
    {
        $this->comments = $post->comments()->latest()->get();
    }
    public function refreshCommentsList()
    {
        $this->comments = $this->post->comments()->latest()->get();
        // $this->comments = Comment::where('post_id', $this->post->id)->latest()->get();
        // dd($this->comment);
    }
    public function render()
    {
        return view('livewire.comment-list');
    }
}