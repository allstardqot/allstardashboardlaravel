@extends('layouts.app')
@section('title', ' Login')
<a href="{{ url('/') }}">
    <button type="button" class="close close-x" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</a>
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7 p-0">
            <div class="bgcolor">
                <div class="text-center">
                    <h1>Login</h1>
                    <h3>Welcome aboard my friend</h3>
                    <p class="pb-1">just a couple of clicks and we start</p>
                </div>
                <div class="position_image">
                    <img style="margin-left: 10%" src="{{asset('public/img/Group 42.png')}}" width="80%" height="auto" />
                </div>
            </div>
        </div>
        <div class="col-md-5 p-0">
            <div class="bgcolor-log">
                <div class="login-deb1">
                    <div class="text-center mt-5">
                        <a href="{{url('/')}}">
                            <img src="{{asset('public/img/fantasy-allstars 1.png')}}" />
                        </a>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                </div>
                                <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                                <!-- <div class="col-md-6"> -->
                                <input id="email" type="email" class="input-login form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <!-- </div> -->
                            </div>
                            <br />
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                </div>
                                <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                                <!-- <div class="col-md-6"> -->
                                <input id="password" type="password" class="input-login form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="show-pass"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                </div>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <!-- </div> -->
                            </div>

                            <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                            <br />
                            <br />
                            <button type="submit" class="but">
                                {{ __('Login') }}
                            </button>
                            <br />
                            <br />


                        </form>
                        @if (Route::has('password.request'))
                        <a class="forgot-p" href="{{ route('ForgetPasswordGet') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif

                        <br>
                        <img class="mt-2 p-0" src="{{asset('public/img/Group 1.png')}}"><br><br>
                        <p style="color: #828282;" href="#">Have An Account?</p>
                        <br><br>
                        <a href="{{url('/register')}}">
                            <button class="but2"><b>Sing Up</b></button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
