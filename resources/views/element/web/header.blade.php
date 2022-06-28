<header>
    <div class="bgHome pt-3">
      <div class="col-lg-11 col-11 mx-auto p-0">
        <div class="text-white col-lg-11 col-xl-8 col-12 ml-auto">
          <div class="row hiokhn78">
            <div class="col-12 col-lg-4 py-1 py-lg-0">
              <div class="text-center">
                <!-- <span><img src="{{asset('public/img/Icon feather-phone.png')}}"> <span class="spnColor">Call </span> <span class="ml-1 spnText"> : +{{ PHONE }}</span></span> -->
              </div>
            </div>
            <div class="col-12 col-lg-4 py-1 py-lg-0">
              <div class="text-center">
                <span><i class="fa fa-envelope" aria-hidden="true"></i> <span class="spnColor">Email </span> <span class="ml-1 spnText"> : {{ EMAIL }}</span></span>
              </div>
            </div>
            <div class="col-12 col-lg-4 py-1 py-lg-0 hsakdjh56">
              <ul class="d-flex list-unstyled text-center sdbdjksd65">
                <li class="px-2"><a href="{{ TELEGRAM }}" ><img src="{{asset('public/img/teligram.png')}}"></a></li>
                <li class="px-3"><a href="{{ INSTAGRAM }}"><img src="{{asset('public/img/Icon awesome-instagram.png')}}"> </a></li>
                <li class="px-3"><a href="{{ TWITTER }}"><img src="{{asset('public/img/Icon awesome-twitter.png')}}"> </a></li>
                <li class="px-3"><a href="{{ DISCORD }}"><img src="{{asset('public/img/discord-50.png')}}"> </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg bg-orange px-lg-5">
        <button class="navbar-toggler text-white ml-auto" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true" style="color:#FF5000"></i>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">
        <img class="logo-img" src="{{asset('public/img/fantasy-allstars 1-1.png')}}">
        </a>
        <div class="collapse navbar-collapse menuNav" id="navbarTogglerDemo03" >
          <ul class="navbar-nav ml-auto mt-4 mt-lg-0">
            <li class="nav-item itemCustom  mx-3">
              <a class="nav-link {{ (request()->is('/')) ? 'activeNav' : '' }}" href="{{url('/')}}">Home </a>
            </li>
            <li class="nav-item itemCustom mx-3">
              <a class="nav-link {{ (request()->is('about_us')) ? 'activeNav' : '' }}" href="{{url('/about_us')}}">About Us</a>
            </li>
            <li class="nav-item itemCustom mx-3">
              <a class="nav-link {{ (request()->is('how_to_play')) ? 'activeNav' : '' }}" href="{{url('/how_to_play')}}">How to play</a>
            </li>
            <li class="nav-item itemCustom mx-3">
              <a class="nav-link {{ (request()->is('faq')) ? 'activeNav' : '' }}" href="{{url('/faq')}}">FAQ</a>
            </li>
            <li class="nav-item itemCustom mx-3">
              <a class="nav-link {{ (request()->is('contact_us')) ? 'activeNav' : '' }}" href="{{url('/contact_us')}}">Contact Us</a>
            </li>
          </ul>
          <ul class="navbar-nav mt-2 mt-lg-0">
            <li class="nav-item itemCustom active mx-3">
              <a class="nav-link" href="{{url('/login')}}">Login </a>
            </li>
            <span class="border-left"></span>
            <li class="nav-item itemCustom mx-3">
              <a class="nav-link" href="{{url('/register')}}">Register</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
