<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatBox extends Component
{
    public $chats;
    public $activeChat;
    public $message;
    public function mount()
    {
        $this->chats = Auth::user()->chats;
        $this->activeChat = Auth::user()->chats()->latest()->first();
    }
    public function render()
    {
        return view('livewire.chat-box');
    }
    public function navigationChatClicked($chatId)
    {
        $chatRecord = Auth::user()->chats()->where('chats.id', $chatId)->first();
        $this->activeChat = $chatRecord;
    }
    public function sendMessage()
    {
        $this->activeChat->messages()->create([
            'message' => $this->message,
            'user_id' => Auth::user()->id,
        ]);
    
        $this->reset('message');
        $this->activeChat->refresh();
    }
    public function refreshMessages()
    {
        $this->activeChat->refresh();
        $this->chats = Auth::user()->chats;
    }
}
