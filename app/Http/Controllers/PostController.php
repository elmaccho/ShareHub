<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        $postData = $request->validated();
        $postData['user_id'] = auth()->user()->id;

        $post = new Post($postData);

        $post->save();
        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'message' => 'Post created!']);
        }

        return back()->with('status', 'Post created!');
    }
    public function destroy(Post $post)
    {
        try{
            $post->comments()->delete();
            $post->delete();
            Session::flash('status', 'Post has been deleted');
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
    public function edit(Post $post)
    {
        return view('home.edit', compact(
            'post'
        ));
    }
    public function update(PostRequest $request, Post $post)
    {
        $validatedData = $request->validated();
        $post->update($validatedData);

        return back()->with('status', 'Post updated!');
    }
}
