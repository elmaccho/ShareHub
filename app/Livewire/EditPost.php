<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditPost extends Component
{
    public Post $post;
    public $postTitle;
    public $postContent;
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->postTitle = $post->title;
        $this->postContent = $post->content;
    }
    public function updatePost()
    {
        // dd(
        //     $this->postTitle,
        //     $this->postContent
        // );
        $user = Auth::user();
        if($user->isAdmin() || $user->isModerator() || $user->isOwnerOfPost($this->post)){
            $this->post->update([
                'title' => $this->postTitle,
                'content' => $this->postContent
            ]);
            return redirect()->to("/post/".$this->post->id);
        } else {
            return false;
        }
    }
    public function render()
    {
        return view('livewire.edit-post');
    }
}
