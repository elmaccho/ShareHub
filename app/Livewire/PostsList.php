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
    public $allPostsLoaded = false;
    public $id;
    public function mount($id = null)
    {
        $this->id = $id;

        if($this->id === null) {
            $this->posts = Post::latest()->take(5)->get();
        } else {
            $this->posts = Post::where('user_id', $this->id)->latest()->take(5)->get();
        }
        $this->loggedUser = Auth::user();
    }

    public function loadMorePosts()
    {
        if (!$this->id) {
            $additionalPosts = Post::latest()->skip(count($this->posts))->take(5)->get();
        } else {
            $additionalPosts = Post::where('user_id', $this->id)
                                    ->latest()
                                    ->skip(count($this->posts))
                                    ->take(5)
                                    ->get();
        }

        if($additionalPosts->isEmpty()){
            $this->allPostsLoaded = true;
        } else {
            $this->posts = $this->posts->concat($additionalPosts);
        }
    }
    public function refreshPostsList()
    {
        $this->posts = Post::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {

        return view('livewire.posts-list');
    }
}
