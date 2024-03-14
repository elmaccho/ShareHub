<?php

namespace App\Livewire;

use App\Enums\NotificationContent;
use App\Models\FriendRequest;
use App\Models\Friendship;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddFriendButton extends Component
{
    public $loggedUser;
    public $userId;
    protected $listeners = ['remove'];

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

        if ($existingRequest) {
            return;
        }

        if($this->loggedUser->id != $this->userId->id){
            FriendRequest::create([
                'requester_id' => $this->loggedUser->id,
                'requested_id' => $this->userId->id,
                'status' => 'pending'
            ]);


            $this->dispatch(
                'popUpTimer',
                    type : 'success',
                    title : 'friend request sent',
                    position : 'top-end'  
                );
        } else {
            return false;
        }
    }
    public function deleteFriend()
    {
        $userName = $this->userId->name;
        $this->dispatch(
            'popUpConfirm',
                type : 'warning',
                text : "Are you sure you want to delete $userName from your friends?",
                confirmButton : "Yup!",
                subtext : "$userName has been removed from your friends",
                position : 'top-end'
            );
    }
    public function remove(){
        Friendship::where('user_id', $this->userId->id)
        ->where('friend_id', $this->loggedUser->id)->delete();

        Friendship::where('friend_id', $this->userId->id)
        ->where('user_id', $this->loggedUser->id)->delete();
    }
    public function render()
    {
        return view('livewire.add-friend-button');
    }
}
