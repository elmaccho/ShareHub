<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Auth::user()->name }} - profile</title>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/nav.css')
    @vite('resources/css/profile.css')
</head>
<body>
    @include('layouts.nav')
    <div class="content">
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>