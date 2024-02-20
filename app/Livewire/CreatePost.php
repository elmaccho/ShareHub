<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public $title = '';
    public $content;
    public $currentUrl;
    public function mount(Request $request)
    {
        $this->currentUrl = $request->url();
    }
    public function submit()
    {
        // dd($this->title, $this->content, Auth::user()->id, $this->currentUrl);
        if($this->title == null || $this->title == ''){
            $this->dispatch(
                'popUpTimer',
                    type : 'error',
                    title : 'The title field must be filled!',
                    position : 'top-end'  
                );
        }

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => Auth::user()->id
        ]);

        if($this->currentUrl === "http://127.0.0.1:8000/home/post/create"){
            $this->dispatch(
                'popUpTimer',
                    type : 'success',
                    title : 'Post added!',
                    position : 'top-end'  
                );
            return redirect(route('home'));
        }

        $this->dispatch(
            'popUpTimer',
                type : 'success',
                title : 'Post added!',
                position : 'top-end'  
            );
        
        $this->reset(['title', 'content']);
        $this->dispatch('refreshPostsList');
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}