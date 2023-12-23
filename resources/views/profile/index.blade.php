@extends('layouts.app')
@section('title', $user->name . ' ' . $user->surname . ' Profile')
@section('content')  
@include('helpers.flash-messages') 
    <div class="profile-container">
        <div class="user-info">
            <div class="background-image">
                @if (!is_null($user->background_image_path))
                        <img class="background-user-image" src="{{ asset('storage/'. $user->background_image_path) }}" alt="">
                    @else
                @endif
                <button class="upload-background-btn" data-bs-toggle="modal" data-bs-target="#backgroundImage">
                    <i class="fa-solid fa-camera"></i>
                </button>
            </div>
        </div>
        <div class="user-row">
            <div class="profile-image col-3">
                <div class="inner-layer">
                    @if (!is_null($user->profile_image_path))
                            <img class="user-image" src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                        @else
                            <img class="user-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
                    @endif
                </div>
                <button class="upload-profile-btn" data-bs-toggle="modal" data-bs-target="#profileImage">
                    <i class="fa-solid fa-camera"></i>
                </button>
            </div>

            <div class="user-data col-6">
                <span class="user-sur-name">
                    <p>
                        {{ $user->name }}
                        {{ $user->surname }}
                    </p>
                </span>
                <div class="user-links">
                    <a class="sh-link d-flex align-items-center" href="#">
                        <p class="m-0"><i class="fa-solid fa-location-dot"></i> Add address</p>
                    </a>
                    <a class="sh-link d-flex align-items-center" href="#">
                        <p class="m-0"><i class="fa-brands fa-facebook-f"></i> Add links</p>
                    </a>
                    <a class="sh-link d-flex align-items-center" href="#">
                        <p class="m-0"><i class="fa-solid fa-info"></i> Add more information</p>
                    </a>
                </div>
            </div>

            <div class="user-action">
                <button class="user-action-btn bg-transparent border-0">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profileImage" tabindex="-1" aria-labelledby="profileImageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileImageLabel">Change Profile Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', auth()->user()) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Choose your profile image</label>
                            <input type="file" class="form-control" id="profileImage" name="user_profile_image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    @if (!is_null($user->profile_image_path))                        
                        <form action="{{ route('profile.deleteProfileImage', $user) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete Profile Image</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="backgroundImage" tabindex="-1" aria-labelledby="backgroundImageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backgroundImageLabel">Change Background Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', auth()->user()) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="backgroundImage" class="form-label">Choose your background image</label>
                            <input type="file" class="form-control" id="backgroundImage" name="user_background_image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    @if (!is_null($user->background_image_path))                        
                        <form action="{{ route('profile.deleteBackgroundImage', $user) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete Profile Image</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @vite('resources/css/profile.css')
@endsection