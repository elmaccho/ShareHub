<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDetails extends Component
{
    public $userId;
    public $user;
    public $userPosts;
    public $loggedUser;

    public function mount($userId)
    {
        $this->loggedUser = Auth::user();
        $this->userId = $userId;
        $this->user = User::find($userId);
        $this->userPosts = Post::where('user_id', $userId)->get();
    }
    public function render()
    {
        return view('livewire.admin.user-details');
    }
}
