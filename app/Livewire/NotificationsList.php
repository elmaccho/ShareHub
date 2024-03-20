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
        $this->notifications = Notification::where('receiver_id', Auth::user()->id)->latest()->get();
        $this->friendRequests = FriendRequest::where('requested_id', Auth::user()->id)->get();
    }
    public function readToggle($id){
        $notification = Notification::find($id);

        if($notification->is_read == true){
            $notification->update([
                'is_read' => false
            ]);
        } else {
            $notification->update([
                'is_read' => true
            ]);
        }

        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.notifications-list');
    }
}
