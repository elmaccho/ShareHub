<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;
    public Post $post;
    public $postTitle;
    public $images = [];
    public $postContent;
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->postTitle = $post->title;
        $this->postContent = $post->content;
    }
    public function deletePhoto($imageId)
    {
        // dd($imageId);
         PostImage::where('id', $imageId)->delete();
    }
    public function updatePost()
    {
        // dd(
        //     $this->postTitle,
        //     $this->postContent,
        //     $this->images
        // );
        $user = Auth::user();
        if($user->isAdmin() || $user->isModerator() || $user->isOwnerOfPost($this->post)){
            $this->post->update([
                'title' => $this->postTitle,
                'content' => $this->postContent
            ]);
            foreach ($this->images as $image) {
                $imagePath = $image->store('post_images', 'public');
                PostImage::create([
                    'file_path' => $imagePath,
                    'post_id' => $this->post->id
                ]);
            }
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
