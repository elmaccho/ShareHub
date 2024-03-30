<?php

namespace App\Livewire;

use App\Models\Categories;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public $title = '';
    public $content;
    public $images = [];
    public $currentUrl;
    public $postCategories;
    public $category;
    public function mount(Request $request)
    {
        $this->postCategories = Categories::all();
        $this->currentUrl = $request->url();
    }
    public function deleteTmpImage($index){
        array_splice($this->images, $index, 1);
    }
    public function submit()
    {
        if(count($this->images) > 4){
            $this->dispatch(
                'popUpTimer',
                type: 'error',
                title: 'You can only add 4 photos!',
                position: 'top-end'
            );
            return;
        }
        if ($this->title == null || $this->title == '') {
            $this->dispatch(
                'popUpTimer',
                type: 'error',
                title: 'The title field must be filled!',
                position: 'top-end'
            );
            return;
        }
    
        $post = Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => Auth::user()->id,
            'category_id' => $this->category,
        ]);
    
        foreach ($this->images as $image) {
            $imagePath = $image->store('post_images', 'public');
            PostImage::create([
                'file_path' => $imagePath,
                'post_id' => $post->id
            ]);
        }
    
        // dd($this->title, $this->content, Auth::user()->id, $this->currentUrl, $this->images);
    
        if ($this->currentUrl === "http://127.0.0.1:8000/home/post/create") {
            $this->dispatch(
                'popUpTimer',
                type: 'success',
                title: 'Post added!',
                position: 'top-end'
            );
            return redirect(route('home'));
        }
    
        $this->dispatch(
            'popUpTimer',
            type: 'success',
            title: 'Post added!',
            position: 'top-end'
        );
    
        $this->reset(['title', 'content', 'images']);
        $this->dispatch('refreshPostsList');
    }
    
    public function render()
    {
        return view('livewire.create-post');
    }
}