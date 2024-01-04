<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $liker = auth()->user();
        $liker->likes()->attach($post->id);

        return redirect(route("home"))->with('status', 'Boink!');
    }
    public function unlike(Post $post)
    {
        $liker = auth()->user();

        $liker->likes()->detach($post->id);

        return redirect(route("home"))->with('status', 'Boink!');
    }
}
