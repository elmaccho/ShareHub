<?php

namespace App\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsList extends Component
{
    public $notifications;
    public function mount(){
        $this->notifications = Notification::where('receiver_id', Auth::user()->id)->get();
    }
    public function render()
    {
        return view('livewire.notifications-list');
    }
}
