<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDetails extends Component
{
    public User $user;
    public function mount(User $user)
    {
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin.user-details');
    }
}
