<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        $postData = $request->validated();
        $postData['user_id'] = auth()->user()->id;

        $post = new Post($postData);

        // dd($post);
        $post->save();
        return redirect(route("home"))->with('status', 'Post created!');
    }
}
