<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatBox extends Component
{
    public $chats;
    public $activeChat;
    public $chatMessage = '';
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
        $this->dispatch('scrollDown');
    }
    public function sendMessage()
    {
        if($this->chatMessage == ''){

        } else {
            $this->activeChat->messages()->create([
                'message' => $this->chatMessage,
                'user_id' => Auth::user()->id,
            ]);
            
            $this->activeChat->refresh();
            $this->dispatch('scrollDown');
            $this->dispatch('clearMsg');
            $this->chatMessage = '';
        }
    }
    public function refreshMessages()
    {
        $this->activeChat->refresh();
        $this->chats = Auth::user()->chats;
    }
}
