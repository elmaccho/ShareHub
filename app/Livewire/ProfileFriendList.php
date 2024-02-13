<?php

namespace App\Livewire;

use App\Models\Friendship;
use App\Models\User;
use Livewire\Component;

class ProfileFriendList extends Component
{
    public $user;
    public $friends;
    public $fullList;
    public function mount(User $user){
        $this->user = $user;
        $this->friends = Friendship::where('user_id', $user->id)->orderBy('created_at', 'DESC')->take(3)->get();
        $this->fullList = Friendship::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.profile-friend-list');
    }
}
