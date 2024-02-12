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

        <div class="notification-list notification-list--unread">
            <div class="notification-list_content">
                <div class="notification-list_img">
                    @if (!is_null(Auth::user()->profile_image_path))
                            <img src="{{ asset('storage/'. Auth::user()->profile_image_path) }}" alt="">
                        @else
                            <img src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif 
                </div>
                <div class="notification-list_detail">
                    <p><a class="text-decoration-none text-dark" href=""><strong>John Doe</strong></a> reacted to your <a class="text-decoration-none" href=""><strong>post</strong></a></p>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                    <p class="text-muted"><small>10 mins ago</small></p>
                </div>
            </div>
            <div class="notification-list_feature-img">
            </div>
        </div>
        <div class="notification-list">
            <div class="notification-list_content">
                <div class="notification-list_img">
                    @if (!is_null(Auth::user()->profile_image_path))
                            <img src="{{ asset('storage/'. Auth::user()->profile_image_path) }}" alt="">
                        @else
                            <img src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif 
                </div>
                <div class="notification-list_detail">
                    <p><a class="text-decoration-none text-dark" href=""><strong>Brian Cumin</strong></a> reacted to your <a class="text-decoration-none" href=""><strong>comment</strong></a></p>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                    <p class="text-muted"><small>10 mins ago</small></p>
                </div>
            </div>
            <div class="notification-list_feature-img">
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="#!" class="dark-link">Load more activity</a>
    </div>
</div>
@vite('resources/css/home.css')
@vite('resources/css/notifications.css')
@endsection