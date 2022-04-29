@extends('layouts.user')
@section('title','Profile')
@section('content')

<main>
  @if(session()->has('message'))
    <div class="alert alert-success alert-one" id="alert">
        {{ session()->get('message') }}

        <button type="button" class="btn-close" aria-label="Close" onclick="closeAlert()"></button>
    </div>
@endif
  <div class="container sdhdjhsio">
    <div class="row mt-5 text-center sxdcnd">
      <div class="col-lg-4 mt-2">
        <a href="#" class="sddmmnd767">Invite Friend</a>
      </div>
      <div class="col-lg-4 mt-2 text-white">
        <img src="{{asset('public/assets/image/Rectangle%20276.png')}}" />
        <h5 class="mt-2">{{$user->user_name}}</h5>
      </div>
      <div class="col-lg-4 mt-2">
        <a href="{{ url('/edit-profile') }}" class="sddmmnd767">Edit Profile</a>
      </div>
    </div>

    <div class="col-lg-12 text-white text-center">
      {{-- <p class="mt-3">{{$user->user_name}}</p>
      <hr class="sdjfhfhi9" /> --}}
      <p>{{$user->email}}</p>
      <hr class="sdjfhfhi9" />
      <?php
      if(!empty($user->phone)){
      ?>
      <p>{{$user->phone}}</p>
      <hr class="sdjfhfhi9" />
      <?php
      }
      ?>
    </div>
    <div class="col-12 sdsdksdjn">
      <h4 class="text-center text-white">Playing Experience</h4>
      <div class="row mt-5 text-center">
        <div class="col-lg-3 mt-3">
          <img src="{{asset('public/assets/image/Group%20221.png')}}" />
        </div>
        <div class="col-lg-3 mt-3">
          <img src="{{asset('public/assets/image/Group%20222.png')}}" />
        </div>
        <div class="col-lg-3 mt-3">
          <img src="{{asset('public/assets/image/Group%208752.png')}}" />
        </div>
        <div class="col-lg-3 mt-3">
          <img src="{{asset('public/assets/image/Group%208753.png')}}" />
        </div>
      </div>
    </div>
    <input
      type="button"
      class="form-control btnColor mt-4 order-last order-lg-first sdsda"
      value="Grand Leader Board"
    />
  </div>
  <script>
    function closeAlert() {
  var element = document.getElementById("alert");
  element.classList.add("active");
}
  </script>
</main>
@endsection
