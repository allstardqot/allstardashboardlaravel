@extends('layouts.user') @section('title','Profile') @section('content')

<main>
  @if(session()->has('message')) {{--
  <div class="alert alert-success alert-one" id="alert">
    {{ session()->get('message') }}

    <button
      type="button"
      class="btn-close"
      aria-label="Close"
      onclick="closeAlert()"
    ></button>
  </div>
  --}} @endif
  <div class="container sdhdjhsio">
    <div class="row mt-5 text-center sxdcnd">
      <div class="col-lg-4 mt-2">
         {{-- <a href="#" class="sddmmnd767" id='inviteBtn'>Invite Friend</a>  --}}
         <a href="#" class="sddmmnd767" id=''>Invite Friend</a> 
      </div>
      <div class="col-lg-4 mt-2 text-white">
        <img src="{{ asset('public/assets/image/Rectangle%20276.png') }}" />
        <h5 class="mt-2">{{$user->user_name}}</h5>
      </div>
      <div class="col-lg-4 mt-2">
        <a href="{{ url('/edit-profile') }}" class="sddmmnd767">Edit Profile</a>
      </div>
    </div>

    <div class="col-lg-12 text-white text-center">
      {{--
      <p class="mt-3">{{$user->user_name}}</p>
      <hr class="sdjfhfhi9" />
      --}}
      <p>{{$user->email}}</p>
      <hr class="sdjfhfhi9" />
      <?php
      if(!empty($user->phone)){ ?>
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
          <div class="profile-card-sec">
            <h3>{{ $usercontest }}</h3>
            <h6>Total Contest</h6>
          </div>
        </div>

        <div class="col-lg-3 mt-3">
          <div class="profile-card-sec">
            <h3>{{$totalCoins}}</h3>
            <h6>Total Coins</h6>
          </div>
        </div>
        <div class="col-lg-3 mt-3">
          <div class="profile-card-sec">
            <h3>{{$winningContest}}</h3>
            <h6>Contest Wins</h6>
          </div>
        </div>
        <div class="col-lg-3 mt-3">
          <div class="profile-card-sec">
            <h3>20</h3>
            <h6>Fantasy Point</h6>
          </div>
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

<!-- Modal -->
<div class="modal fade invite-popup" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Invite</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form id="invite_email">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group mb-3 w-100 pr-0">
            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="inviteemail" required />
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group w-100 ">
              <input  class="btn btn-primary" id="send_invite" value="Invite"/>
            </div>
          </div>
        </div>
       </form>
      </div>
     
    </div>
  </div>
</div>
@endsection
