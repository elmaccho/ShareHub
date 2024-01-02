<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post)
    {
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = Auth()->user()->id;
        $comment->content = request()->get('comment');
        $comment->save();

        return redirect(route("home"))->with('status', 'Comment has been added!');
    }
}
