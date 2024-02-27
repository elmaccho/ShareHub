<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostPageController extends Controller
{
    public function index(Post $post): View
    {
        $postImages = PostImage::where('post_id', $post->id)->get();

        return view('postpage.index', compact([
            'post',
            'postImages'
        ]));
    }
}
