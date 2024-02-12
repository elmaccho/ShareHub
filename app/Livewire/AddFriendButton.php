<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddFriendButton extends Component
{
    public $loggedUser;
    public $userId;

    public function mount($userId)
    {
        $this->loggedUser = Auth::user();
        $this->userId = $userId;
    }
    public function addFriend($userId){
        if($this->loggedUser->id != $userId){
            FriendRequest::create([
                'requester_id' => $this->loggedUser->id,
                'requested_id' => $userId,
                'status' => 'pending'
            ]);
        } else {
            return false;
        }
    }
    public function render()
    {
        return view('livewire.add-friend-button');
    }
}
