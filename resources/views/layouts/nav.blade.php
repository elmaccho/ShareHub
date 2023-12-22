<nav class="navbar-wrapper">
    <a class="navbar-brand brand-wrapper" href="{{ url('/home') }}">
        <img class="brand-logo" src="{{ asset('images/sharehub.png') }}" alt="">
        <div class="brand-info">
            <h1 class="brand-main">{{ config('app.name', 'Laravel') }}</h1>
            <p class="brand-slogan">Share Inspire Connect</p>
        </div>
    </a>

    @guest
        @else
    <div class="routes-wrapper col-4">
        <a class="route-btn" href="#">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a class="route-btn" href="#">
            <i class="fa-solid fa-message"></i>
        </a>
        <a class="route-btn" href="#">
            <i class="fa-solid fa-plus"></i>
        </a>
        <a class="route-btn" href="#">
            <i class="fa-solid fa-bell"></i>
        </a>
        <a class="route-btn" href="/profile">
            <i class="fa-solid fa-user"></i>
        </a>
        <a class="route-btn user-auth-route" href="#"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fa-regular fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end new-dropdown-menu mobiledropdown" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
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
            <a class="dropdown-item" href="#">
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