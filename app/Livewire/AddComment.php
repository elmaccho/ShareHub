<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AddComment extends Component
{
    public $comment;
<<<<<<< HEAD
    public $postId;
    public function mount($postId)
    {
        $this->postId = $postId;
=======
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
>>>>>>> 54e27fd
    }
    
    public function createComment()
    {
        Comment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id
        ]);

<<<<<<< HEAD
        // dd($this->comment, $this->postId, Auth::user()->id);

        Comment::create([
            'content' => $this->comment,
            'user_id' => Auth::user()->id,
            'post_id' => $this->postId
        ]);

        $this->reset(['comment']);
        $this->dispatch('commentAdded');
        // request()->session()->flash('success', 'User Created Successfully!');
=======
        // $this->reset(['comment']);
        // $this->dispatch('commentAdded');
        // $this->dispatch('refreshPostsList');
        return redirect(request()->header('Referer'));
        
>>>>>>> 54e27fd
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}