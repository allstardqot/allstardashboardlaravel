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
            <h1>Sing Up</h1>
            <h3>Welcome aboard my friend</h3>
            <p class="pb-1">just a couple of clicks and we start</p>
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
                    <input id="password" type="password" class="input-reis form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br />
                    <input id="password-confirm" type="password" class="input-reis form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
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
