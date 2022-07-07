<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
      <div class="container-fluid text-white">
        <a class="navbar-brand" href="{{url('/home') }}"><img src="{{asset('public/assets/image/fantasy-allstars 1.png')}}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" aria-current="page" href="{{ url('/home') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('fixture-data')) ? 'active' : '' }}" aria-current="page" href="{{ url('/fixture-data') }}">Fixtures</a>
              </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('create-team')) ? 'active' : '' }}" href="{{ url('/create-team') }}" >Create Team</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link {{ (request()->is('team') || request()->is('current-team')) ? 'active' : '' }}" href="{{ url('/team') }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                My Team
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('/current-team') }}">Current Week Team</a></li>
                <li><a class="dropdown-item" href="{{ url('/team') }}">Next Week Team</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link droplink {{ (request()->is('my-pool')) || (request()->is('create-pool'))  ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pool
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('/my-pool') }}">My Pools</a></li>
                <li><a class="dropdown-item" href="{{ url('/create-pool') }}">Create Pool</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('manager-lounge')) ? 'active' : '' }}" aria-current="page" href="{{ url('/manager-lounge') }}">Manager’s Lounge</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('latest-news')) ? 'active' : '' }}" href="{{ url('/latest-news') }}">News</a>
            </li>
          </ul>
          <div class="d-flex">
            <ul class="navbar-nav head-drop">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/wallet') }}">
                  <img class="reat1" src="{{asset('public/assets/image/Rectangle 317.png')}}" width="65px"></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->user_name}}
                    @if(auth()->user()->profile_image)
                        <img width="35" height="35" style="border-radius: 100%" src="{{asset('public/profileImage/'.auth()->user()->profile_image)}}" width="35px" >
                    @else
                        <img src="{{asset('public/assets/image/Rectangle 276.png')}}" width="35px" >
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                  <li>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Log out</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ url('/transection') }}">Transactions</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

