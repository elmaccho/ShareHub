<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FriendRequestList extends Component
{
    public $friendRequests;
    public $loggedUser;
    public function mount()
    {
        $this->loggedUser = Auth::user();
        $this->friendRequests = FriendRequest::where('requested_id', $this->loggedUser->id)->get();
    }
    public function render()
    {
        return view('livewire.friend-request-list');
    }
}
