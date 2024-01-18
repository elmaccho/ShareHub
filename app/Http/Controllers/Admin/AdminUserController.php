<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        $loggedUser = Auth::user();
        $users = User::paginate(10);

        return view('admin.views.users.index', compact([
            'loggedUser',
            'users'
        ]));
    }

    public function getStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json(['states' => $states]);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json(['cities' => $cities]);
    }
}
