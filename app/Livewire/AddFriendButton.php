<?php

namespace App\Livewire;

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
    public function render()
    {
        return view('livewire.add-friend-button');
    }
}
