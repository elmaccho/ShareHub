<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Exception;

use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();

        if($user->isAdmin() || $user->isModerator() || $user->isOwnerOfPost($post)){
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
        } else {
            abort(401, 'Unauthorized action.');
        }
    }
    public function edit(Post $post)
    {
        $user = Auth::user();
        
        if($user->isAdmin() || $user->isModerator() || $user->isOwnerOfPost($post)){
            return view('home.edit', compact(
                'post'
            ));
        } else {
            abort(401, 'Unauthorized action.');
        }
    }
    public function update(PostRequest $request, Post $post)
    {
        $validatedData = $request->validated();
        $post->update($validatedData);

        dd($validatedData);

        return back()->with('status', 'Post updated!');
    }
}
