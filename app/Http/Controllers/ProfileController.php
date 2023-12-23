<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserImageRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        return view('profile.index', compact(
            'user'
        ));
    }

    public function update(UserImageRequest $request, User $user)
    {
        if ($request->hasFile("user_profile_image") && $request->file("user_profile_image")->isValid()) {
            $user->profile_image_path = $request->file("user_profile_image")->store("user_profile");
        }
    
        if ($request->hasFile("user_background_image") && $request->file("user_background_image")->isValid()) {
            $user->background_image_path = $request->file("user_background_image")->store("user_background");
        }
    
        $user->save();
    
        return redirect(route('profile.index'))->with('status', 'Image uploaded successfully!');
    }

    public function deleteProfileImage(User $user)
    {
        if($user->profile_image_path){
            $user->update(['profile_image_path' => null]);
        }

        return redirect(route('profile.index'))->with('status', 'Profile image deleted successfully!');

    }

    public function deleteBackgroundImage(User $user)
    {
        if($user->background_image_path){
            $user->update(['background_image_path' => null]);
        }

        return redirect(route('profile.index'))->with('status', 'Background image deleted successfully!');
    }
    
}
