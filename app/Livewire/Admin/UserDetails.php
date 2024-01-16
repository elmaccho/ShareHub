<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserDetails extends Component
{
    public $userId;
    public $user;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);
    }
    public function render()
    {
        return view('livewire.admin.user-details');
    }
}
