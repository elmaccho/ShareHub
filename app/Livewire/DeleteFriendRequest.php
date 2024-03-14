<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use App\Models\Notification;
use Livewire\Component;

class DeleteFriendRequest extends Component
{
    public $requester;
    public $requested;
    public function mount($requester, $requested)
    {
        $this->requester = $requester;
        $this->requested = $requested;
    }
    public function deleteFriendRequest()
    {
        // dd(
        //     "user who sent request",
        //     $this->requester->name,
            
        //     "user who received the invitation",
        //     $this->requested->name
        // );
        FriendRequest::where('requester_id', $this->requester->id)
                        ->where('requested_id', $this->requested->id)->delete();


        $this->dispatch(
            'settingsUpdated',
                type : 'success',
                title : 'Friend request rejected!',
                position : 'top-end'  
            );
                        
    }
    public function render()
    {
        return view('livewire.delete-friend-request');
    }
}
