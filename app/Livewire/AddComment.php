<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddComment extends Component
{
    public Post $post;
    #[Rule('required|string')]    
    public $comment = '';
    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function addComment()
    {
        $this->validate();
        Comment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id
        ]);
        $this->dispatch('refreshCommentsList');
        $this->reset('comment');
    }
    public function render()
    {
        return view('livewire.add-comment');
    }
}
