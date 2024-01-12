<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AddComment extends Component
{
    public $comment;
    public $postId;

    public function createComment()
    {
        $validated = $this->validate([
            'comment' => 'required|string',
        ]);

        $addComment = new Comment();
        $addComment->post_id = $this->postId;
        $addComment->user_id = Auth::user()->id;
        $addComment->content = $this->comment;
        $addComment->save();

        $this->reset(['comment']);
        $this->dispatch('commentAdded');
        // request()->session()->flash('success', 'User Created Successfully!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}