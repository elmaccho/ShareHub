<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UsersList extends Component
{
    public $search = '';
    protected $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        $this->users = User::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('surname', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->paginate(10);

        return view('livewire.admin.users-list', [
            'users' => $this->users
        ]);
    }
}
