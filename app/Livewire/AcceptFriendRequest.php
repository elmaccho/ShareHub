<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use App\Models\Friendship;
use Livewire\Component;

class AcceptFriendRequest extends Component
{
    public $requester;
    public $requested;
    public function mount($requester, $requested)
    {
        $this->requester = $requester;
        $this->requested = $requested;
    }
    public function acceptFriendRequest()
    {
        // dd(
        //     "user who sent request",
        //     $this->requester->name,
            
        //     "user who received the invitation",
        //     $this->requested->name
        // );

        Friendship::create([
            'user_id' => $this->requester->id,
            'friend_id' => $this->requested->id
        ]);

        Friendship::create([
            'user_id' => $this->requested->id,
            'friend_id' => $this->requester->id
        ]);

        FriendRequest::where('requester_id', $this->requester->id)
        ->where('requested_id', $this->requested->id)->delete();

        $this->dispatch(
            'popUpTimerReload',
                type : 'success',
                title : 'Friend request accepted!',
                position : 'top-end'  
            );
    }
    public function render()
    {
        return view('livewire.accept-friend-request');
    }
}
