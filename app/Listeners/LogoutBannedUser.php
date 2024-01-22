<?php

namespace App\Listeners;

use App\Events\UserBanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogoutBannedUser
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserBanned $event)
    {
        $userId = $event->userId;


        if (Auth::check() && Auth::user()->id === $userId) {
            Auth::logout();
        }
    }
}
