<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeletePost extends Component
{
    public Post $post;
    public $currentUrl;
    protected $listeners = ['remove'];
    public function mount(Post $post, Request $request)
    {
        $this->post = $post;
        $this->currentUrl = $request->url();
    }
    public function deletePost()
    {
        $this->dispatch(
            'popUpConfirm',
                type : 'warning',
                text : "Are you sure you want to delete this post?",
                confirmButton : "Yup!",
                subtext : "Post has been deleted!",
            );
    }
    public function remove()
    {
        $user = Auth::user();
        if ($user->isAdmin() || $user->isModerator() || $user->isOwnerOfPost($this->post)) {
            $this->post->comments()->delete();
            $this->post->postImage()->delete();
            $this->post->notification()->delete();
            $this->post->delete();
            return redirect()->to('/home');
        } else {
            return false;
        }
    }
    
    public function render()
    {
        return view('livewire.delete-post');
    }
}
