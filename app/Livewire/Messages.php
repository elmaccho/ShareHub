<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Messages extends Component
{
    #[Rule('required|min:2|max:50')]
    public $name;


    #[Rule('required|min:2|max:50')]
    public $surname;


    #[Rule('required|email|unique:users')]
    public $email;

    
    #[Rule('required|min:8')]
    public $password;

    public function createNewUser(){

        $this->validate();

        User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $this->reset(['name','surname','email','password']);
        request()->session()->flash('success', 'User Created Successfully!');
    }
    public function render()
    {
        $users = User::all();

        return view('livewire.messages', compact(
            'users'
        ));
    }

}
