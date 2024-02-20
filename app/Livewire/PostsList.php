<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostsList extends Component
{
    protected $listeners = ['refreshPostsList'];
    public $posts;
    public $loggedUser;

    public function mount()
    {
        $this->posts = Post::orderBy('created_at', 'desc')->get();
        $this->loggedUser = Auth::user();
    }
    public function refreshPostsList()
    {
        $this->posts = Post::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.posts-list');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 54e27fd
