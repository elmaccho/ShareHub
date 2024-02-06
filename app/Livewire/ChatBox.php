<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatBox extends Component
{
    public $chats;
    public function mount()
    {
        $this->chats = Auth::user()->chats;
    }
    public function render()
    {
        return view('livewire.chat-box');
    }
}
