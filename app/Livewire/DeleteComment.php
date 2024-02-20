<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class DeleteComment extends Component
{
    public $commentId;
    public function mount($commentId)
    {
        $this->commentId = $commentId;
    }
    public function deleteComment()
    {
        Comment::where('id', $this->commentId)->delete();
        $this->dispatch('commentAdded');

    }
    public function render()
    {
        return view('livewire.delete-comment');
    }
}
