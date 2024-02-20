<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserImageRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $user): View
    {
        $posts = Post::where('user_id', $user->id)->get();
        $loggedUser = Auth::user();

        return view('profile.index', compact(
            'user',
            'loggedUser',
            'posts'
        ));
    }

    public function update(UserImageRequest $request, User $user)
    {
        if($user->id == Auth::user()->id){
            if ($request->hasFile("user_profile_image") && $request->file("user_profile_image")->isValid()) {
                $user->profile_image_path = $request->file("user_profile_image")->store("user_profile");
            }
        
            if ($request->hasFile("user_background_image") && $request->file("user_background_image")->isValid()) {
                $user->background_image_path = $request->file("user_background_image")->store("user_background");
            }
        
            $user->save();
            return redirect(route('profile.index', $user->id))->with('status', 'Image uploaded successfully!');
        } else {
            abort(401, "Nope... Do not try that!");
        }

    }

    public function deleteProfileImage(User $user)
    {
        if($user->id == Auth::user()->id){
            if($user->profile_image_path){
                $user->update(['profile_image_path' => null]);
            }
    
            return redirect(route('profile.index', $user->id))->with('status', 'Profile image deleted successfully!');

        } else {
            abort(401);
        }
    }

    public function deleteBackgroundImage(User $user)
    {
        if($user->id == Auth::user()->id){
            if($user->background_image_path){
                $user->update(['background_image_path' => null]);
            }
            
            return redirect(route('profile.index', $user->id))->with('status', 'Background image deleted successfully!');
        } else {
            abort(401);
        }
    }
    
}
