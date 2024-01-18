<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="{{ route('home') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">ShareHub</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="{{ route('admin.dashboard.showusers') }}" id="usersCollapseBtn" class="nav-link text-white" >
          <i class="fa-solid fa-users"></i>
          Users
        </a>
        <div class="collapse ms-4" id="usersCollapse">
          Content for Users
        </div>
      </li>
      <li>
        <button id="postsCollapseBtn" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#postsCollapse" aria-expanded="false">
          <i class="fa-solid fa-box"></i>
          Posts
        </button>
        <div class="collapse ms-4" id="postsCollapse">
          Content for Posts
        </div>
      </li>
      <li>
        <button id="reportsCollapseBtn" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#reportsCollapse" aria-expanded="false">
          <i class="fa-solid fa-bullhorn"></i>
          Reports
        </button>
        <div class="collapse ms-4" id="reportsCollapse">
          Content for Reports
        </div>
      </li>
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link text-white" aria-current="page">
          <i class="fa-solid fa-house"></i>
          Return To Home
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('storage/' . Auth::user()->profile_image_path) }}" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        {{-- <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li> --}}
        <li><a href="{{ route('home') }}" class="dropdown-item">Return To Home</a></li>
        <li><hr class="dropdown-divider"></li> 
        <li>            <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
       </form></li>
      </ul>
    </div>
</div>

@vite('resources/css/panel/panel.css')