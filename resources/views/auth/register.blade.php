@extends('layouts.app')
@section('title', 'Sign Up')
<a href="{{ url('/') }}">
<button type="button" class="close close-x" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </a>
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-7" style="padding: 0px">
        <div class="bgcolor">
          <div class="text-center">
            <h1>Sign Up</h1>
            <h3>Welcome to the Top Crypto Fantasy Community</h3>
            <p class="pb-1">We are honored to welcome a manager of your quality to our community.</p>
          </div>
          <div class="position_image">
            <img class="posting-img" src="{{asset('public/img/Group 42.png')}}" width="78.2%" height="auto"/>
          </div>
        </div>
      </div>
      <div class="col-sm-5 p-0">
        <div class="bgcolor-log p21">
            <div class="text-center mt-5">
              <a href="{{url('/')}}">
                <img src="{{asset('public/img/fantasy-allstars 1.png')}}" />
                </a>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <input id="user_name" type="text" class="input-reis form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="name" autofocus placeholder="Username"/>

                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br />
                    <input id="email" type="email" class="input-reis form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br />
                    <input id="password" type="password" class="input-reis form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br />
                    <input id="password-confirm" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="input-reis form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        <br>
                    <div class="form-group">
                        <select class="form-control input-reis" name="country" >
                          <option value="{{old('country')}}">Select Country</option>
                          @foreach ($nationlity as $data)
                              <option value="{{$data->country}}" >{{ $data->country }} </option>               
                          @endforeach   
                         
                        </select>
                      </div>
                      {{-- <br /> --}}
                    <input id="referal-code" type="text" class="input-reis form-control" name="referal_code"  autocomplete="Referal Code" placeholder="Referal Code" value="{{ $referal }}">
                    <div class="g-recaptcha brochure__form__captcha input-reis form-group" data-sitekey="6LctDc8gAAAAACQlsdFzTaVcji_VDVpoHgH2GZ-N" name="brochure__form__captcha"></div>
                        <br>
                      {{-- <div class="form-group">
                        <select class="form-control input-reis" name="team_id" >
                          <option value="{{old('team_id')}}">Select Team</option>
                          @foreach ($team as $data)
                              <option value="{{$data->name}}" >{{ $data->name }} </option>               
                          @endforeach   
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="form-control input-reis" name="player_id" >
                          <option value="{{old('player_id')}}">Select Player</option>
                          @foreach ($player as $data)
                              <option value="{{$data->display_name}}" >{{ $data->display_name }} </option>               
                          @endforeach   
                        </select>
                      </div> --}}
                       
                    <br />
                    <p style="color: #828282;     width: 85%;    margin: auto;" class="mb-3" > By creating an account or using our services, you agree to our <a href="{{ url('/terms-condition') }}" >Terms and Conditions</a> and Privacy Policy.</p>
                        <button type="submit" class="but">
                            {{ __('Register') }}
                        </button>
<br /> 
<br /> 
                        <img class="mt-2 p-0" src="{{asset('/public/img/Group 1.png')}}">
                        <br /> 
                        <br /> 

                        <a style="color: #828282;" href="{{url('/login')}}">Have An Account?</a>
                      
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
