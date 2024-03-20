<?php

namespace App\Livewire;

use App\Enums\NotificationContent;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function toggleLike()
    {
        $user = auth()->user();

        $hasLiked = $user->likes()->where('post_id', $this->post->id)->exists();
        if ($hasLiked) {
            $user->likes()->detach($this->post);

            $notification = Notification::where('receiver_id', $this->post->user_id)
                                         ->where('sender_id', Auth::user()->id)
                                         ->where('type', 'like')
                                         ->first();

            if ($notification) {
                $notification->delete();
            }
        } else {
            $user->likes()->attach($this->post);
        
            Notification::create([
                'receiver_id' => $this->post->user_id,
                'sender_id' => Auth::user()->id,
                'type' => 'like',
                'content' => NotificationContent::TYPES['liked'],
                // 'target_id' => $this->post->id,
                // 'target_type' => "post",
            ]);
        }
        
    }
    public function render()
    {
        return view('livewire.like-button');
    }
}
