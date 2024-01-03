<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post)
    {
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = Auth()->user()->id;
        $comment->content = $request->input('comment');
        $comment->save();

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => 'Comment has been added!']);
        }
    
        Session::flash('status', 'Comment has been added');
    
        return redirect(route("home"))->with('status', 'Comment has been added!');
    }
    public function destroy(Comment $comment)
    {
        try{
            $comment->delete();
            Session::flash('status', 'Comment has been deleted');
            return response()->json([
                'status' => 'success'
            ]);
        } catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong...'
            ])->setStatusCode(500);
        }
    }
}
