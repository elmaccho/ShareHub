<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsList extends Component
{
    public $notifications;
    public $friendRequests;
    public function mount(){
        $this->notifications = Notification::where('receiver_id', Auth::user()->id)->get();
        $this->friendRequests = FriendRequest::where('requested_id', Auth::user()->id)->get();

    }
    public function readToggle($id){
        $notification = Notification::where('id', $id);
        // if($notification->isReaded()){
            $notification->update([
                'is_read' => 0
            ]);
        // } else {
            // $notification->update([
                // 'is_read' => 1
            // ]);
        // }
    }
    public function render()
    {
        return view('livewire.notifications-list');
    }
}
