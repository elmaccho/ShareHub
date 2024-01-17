<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
        $loggedUser = Auth::user();

        return view('admin.dashboard', compact('loggedUser'));
    }

    public function showUsers(): View
    {
        $users = User::paginate(10);
        return view('admin.views.users.index', compact('users'));
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