<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostsList extends Component
{
    protected $listeners = ['refreshPostsList', 'categorySelected'];
    public $posts;
    public $loggedUser;
    public $allPostsLoaded = false;
    public $id;
    public $selectedCategory;

    public function mount($id = null)
    {
        $this->id = $id;
        $this->loggedUser = Auth::user();
        $this->loadPosts();
    }

    public function loadMorePosts()
    {
        if (!$this->id) {
            if ($this->selectedCategory) {
                $additionalPosts = Post::latest()->where('category_id', $this->selectedCategory)->skip(count($this->posts))->take(5)->get();
            } else {
                $additionalPosts = Post::latest()->skip(count($this->posts))->take(5)->get();
            }
        } else {
            if ($this->selectedCategory) {
                $additionalPosts = Post::where('user_id', $this->id)
                                       ->latest()
                                       ->where('category_id', $this->selectedCategory)
                                       ->skip(count($this->posts))
                                       ->take(5)
                                       ->get();
            } else {
                $additionalPosts = Post::where('user_id', $this->id)
                                       ->latest()
                                       ->skip(count($this->posts))
                                       ->take(5)
                                       ->get();
            }
        }

        if($additionalPosts->isEmpty()){
            $this->allPostsLoaded = true;
        } else {
            $this->posts = $this->posts->concat($additionalPosts);
        }
    }

    public function refreshPostsList()
    {
        $this->loadPosts();
    }

    public function categorySelected($selectedCategory)
    {
        $this->selectedCategory = $selectedCategory;
        $this->loadPosts();
    }

    private function loadPosts()
    {
        if (!$this->id) {
            if ($this->selectedCategory === null) {
                $this->posts = Post::latest()->take(5)->get();
            } elseif ($this->selectedCategory) {
                $this->posts = Post::latest()->where('category_id', $this->selectedCategory)->take(5)->get();
            } else {
                $this->posts = Post::latest()->take(5)->get();
            }
        } else {
            if ($this->selectedCategory === null) {
                $this->posts = Post::where('user_id', $this->id)->latest()->get();
            } elseif ($this->selectedCategory) {
                $this->posts = Post::where('user_id', $this->id)
                                   ->latest()
                                   ->where('category_id', $this->selectedCategory)
                                   ->take(5)
                                   ->get();
            } else {
                $this->posts = Post::where('user_id', $this->id)
                                   ->latest()
                                   ->take(5)
                                   ->get();
            }
        }
    }
    

    public function render()
    {
        return view('livewire.posts-list');
    }
}
