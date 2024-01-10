<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Messages extends Component
{
    public $name;
    public $surname;
    public $email;
    public $password;

    public function createNewUser(){
        User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }
    public function render()
    {
        $users = User::all();

        return view('livewire.messages', compact(
            'users'
        ));
    }

}
