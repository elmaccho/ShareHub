@extends('layouts.app')
@section('content')
    <div class="messages-container d-flex gap-3">
        <div class="sh-section col-md-3 users-list">
            <form class="user-search" action="">
                @csrf
                <input class="form-control" type="text" name="" id="" placeholder="Search...">
                <button class="user-search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="user-list d-flex flex-column">
                @foreach ($users as $user)
                    <a class="text-decoration-none text-dark user-card d-flex align-items-center gap-2" href="#{{ $user->id }}" data-user-id="{{ $user->id }}">
                        @if (!is_null($user->profile_image_path))
                                <img class="user-profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="{{ $user->name }} {{$user->surname}}">
                            @else
                                <img class="user-profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="{{ $user->name }} {{ $user->surname }}">
                        @endif
                        <div class="user-info">
                            {{ $user->name }}
                            {{ $user->surname }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="sh-section user-chat">
            e
        </div>
    </div>
@endsection
@vite('resources/css/home.css')
@vite('resources/css/messages.css')