<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AddComment extends Component
{
    public $comment;
    public $postId;
    public function mount($postId)
    {
        $this->postId = $postId;
    }
    
    public function createComment()
    {
        $validated = $this->validate([
            'comment' => 'required|string',
        ]);

        // dd($this->comment, $this->postId, Auth::user()->id);

        Comment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $this->postId
        ]);

        $this->reset(['comment']);
        $this->dispatch('commentAdded');
        // request()->session()->flash('success', 'User Created Successfully!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}