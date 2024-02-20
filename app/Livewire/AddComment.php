<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AddComment extends Component
{
    public $comment;
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }
    
    public function createComment()
    {
        Comment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id
        ]);

        // $this->reset(['comment']);
        // $this->dispatch('commentAdded');
        $this->dispatch('refreshPostsList');
        // return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}