<?php

namespace App\Livewire;

use App\Enums\NotificationContent;
use App\Models\Comment;
use App\Models\Notification;
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
        $comment = Comment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id
        ]);

        // Notification::create([
        //     'receiver_id' => $this->post->user_id,
        //     'sender_id' => Auth::user()->id,
        //     'type' => 'comment',
        //     'content' => NotificationContent::TYPES['commented'],
        //     'target_id' => $comment->id,
        //     'target_type' => "comment"
        // ]);
        $this->dispatch('refreshCommentsList');
        $this->reset('comment');
    }
    public function render()
    {
        return view('livewire.add-comment');
    }
}
