<nav class="navbar-wrapper">
    <span class="nav-wrapper">
        <a class="navbar-brand brand-wrapper" href="{{ route('home') }}">
            <img class="brand-logo" src="{{ asset('images/sharehub.png') }}" alt="">
            <div class="brand-info">
                <h1 class="brand-main">{{ config('app.name', 'Laravel') }}</h1>
                <p class="brand-slogan">Share Inspire Connect</p>
            </div>
        </a>
        @if(Request::is('home'))
            <button class="open-side-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        @endif
    </span>

    @guest
        @else
    <div class="routes-wrapper">
        <a class="route-btn" href="{{ route('home') }}">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a class="route-btn" href="{{ route('messages.index') }}">
            <i class="fa-solid fa-message"></i>
        </a>
        <a class="route-btn" href="{{ route('post.create') }}">
            <i class="fa-solid fa-plus"></i>
        </a>
        <a class="route-btn position-relative p-2" href="{{ route('notifications.index') }}">
            <i class="fa-solid fa-bell"></i>
            <livewire:notification-counter />
        </a>
        <a class="route-btn" href="{{ route('profile.index', Auth::user()->id) }}">
            <i class="fa-solid fa-user"></i>
        </a>
        <a class="route-btn user-auth-route" href="#"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @if (!is_null(Auth::user()->profile_image_path))
                    <img class="user-image" src="{{ asset('storage/'. Auth::user()->profile_image_path) }}" alt="">
                @else
                    <img class="user-image" src="{{ asset('storage/user_profile/userDefault.png') }}" alt="">
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-end new-dropdown-menu mobiledropdown" aria-labelledby="navbarDropdown">
            @if (Auth::user()->isAdmin())
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                    Admin Panel
                </a>
            @endif

            <a class="dropdown-item" href="{{ route('profile.index', Auth::user()->id) }}">
                Profile
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <div class="auth-user">
        <a id="navbarDropdown" class="nav-link dropdown-toggle auth-user btn-main" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <strong>{{ Auth::user()->name }}</strong>
        </a>

        <div class="dropdown-menu dropdown-menu-end new-dropdown-menu" aria-labelledby="navbarDropdown">
            @if (Auth::user()->isAdmin())
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                    Admin Panel
                </a>
            @endif

            <a class="dropdown-item" href="{{ route('profile.index', Auth::user()->id) }}">
                Profile
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div> 
    @endguest
</nav>