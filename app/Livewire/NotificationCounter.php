<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationCounter extends Component
{
    public $user;
    public $notifications;
    public $friendRequests;
    public $sum;

    public function mount()
    {
        $this->user = Auth::user();
        
        $this->notifications = Notification::where('receiver_id', $this->user->id)
            ->where('is_read', 0)
            ->whereColumn('receiver_id', '!=', 'sender_id') // Dodaj ten warunek
            ->count();
        
        $this->friendRequests = FriendRequest::where('requested_id', Auth::user()->id)->count();
        
        $this->sum = $this->notifications + $this->friendRequests;
    }

    public function render()
    {
        return view('livewire.notification-counter');
    }
}