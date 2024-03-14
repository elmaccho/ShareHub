@extends('layouts.app')
@section('title', 'ShareHub - Notifications')
@section('content')
<div class="container">
    <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>

    {{-- friend requests --}}
        @livewire('friend-request-list')

        {{-- activity --}}
        <div class="notification-ui_dd-content">
            <div class="text-center mb-3">
                Activity
            </div>

        @livewire('notifications-list')
    </div>

    {{-- <div class="text-center">
        <a href="#!" class="dark-link">Load more activity</a>
    </div> --}}
</div>
@vite('resources/css/home.css')
@vite('resources/css/notifications.css')
@endsection