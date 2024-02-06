<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return View('messages.index', compact([
            'users',
        ]));
    }
}
