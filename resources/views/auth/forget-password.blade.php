@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-sm-7 p-0">
            <div class="bgcolor">
                <div class="text-center">
                    <h1>Reset Password</h1>
                    <h3>
                        Please enter the email address linked to<br />
                        your account.
                    </h3>
                </div>
                <div class="position_image">
                    <img class="posting-img" src="{{ asset('public/img/Group 42.png') }}" width="80%" height="auto" />
                </div>
            </div>
        </div>
        <div class="col-sm-5 p-0">
            <div class="bgcolor-log">
                <div class="p11">
                    <div class="text-center mt-5">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                           {{ Session::get('message') }}
                       </div>
                    @endif
                        <img src="{{ asset('public/img/fantasy-allstars 1.png') }}" />
                         <form method="POST" action="{{ route('ForgetPasswordPost') }}">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                </div>
                                {{-- <input id="email" type="email" class="input-login form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus> --}}
                                <input type="email" id="email_address" class="input-login form-control" name="email" required autofocus>
                            </div>
                                <div>
                                    @if ($errors->has('email'))
                                      <span class="text-danger passerror">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                {{-- <input
                    type="text"
                    class="input-login form-control"
                    name="email"
                    placeholder="Email"
                  /> --}}

                            <br />
                            <button type="submit" class="but"><b>Send</b></button>
                        </form>
                        <br />
                        <br />
                        <img class="mt-2 p-0" src="{{ asset('public/img/Group 1.png') }}" /><br /><br />
                        <a class="hdusjk" href="{{ url('/login') }}">Have No Account?</a>
                        <br /><br />
                        <a href="{{ url('/register') }}">
                            <button class="but2 mt-5"><b>Sing Up</b></button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
