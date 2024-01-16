@extends('admin.dashboard')

@section('title', 'Users')

@section('something')
<div class="users-container mb-3">
    @foreach ($users as $user)
        <div class="user-card mb-2">
            @if (!is_null($user->profile_image_path))
                    <img class="profile-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                @else
                    <img class="profile-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
            @endif

            <div class="user-info">
                <div class="user-sur-name me-3">
                    {{ $user->name }}
                    {{ $user->surname }}
                </div>

                <strong>{{ $user->email }}</strong>
            </div>

            <div class="action-buttons">
                <button class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-gavel"></i>
                </button>

                <button class="btn btn-success btn-sm">
                    <i class="fa-solid fa-pencil"></i>
                </button>

                <button class="btn btn-info btn-sm">
                    <i class="fa-solid fa-info"></i>
                </button>
            </div>
        </div>
    @endforeach
</div>
    {{ $users->links() }}
@endsection
@vite('resources/css/panel/users-list.css')