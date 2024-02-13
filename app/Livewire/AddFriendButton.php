<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use App\Models\Friendship;
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
    public function addFriend(){
        $existingRequest = FriendRequest::where('requester_id', $this->loggedUser->id)
        ->where('requested_id', $this->userId->id)
        ->where('status', 'pending')
        ->exists();

        $existingFriendship = Friendship::where('requester_id', $this->loggedUser->id)
        ->where('requested_id', $this->userId->id);

        if ($existingRequest) {
            return;
        }

        if($existingFriendship)
        {
            // return;
        }
        if($this->loggedUser->id != $this->userId->id){
            FriendRequest::create([
                'requester_id' => $this->loggedUser->id,
                'requested_id' => $this->userId->id,
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
