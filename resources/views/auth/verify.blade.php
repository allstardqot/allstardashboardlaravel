@extends('layouts.app')


@section('content')
<a href="{{ url('/') }}">
    <button type="button" class="close close-x" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>

</a>
<div class="verify-contents">
    <style>
        body {
  background-color: #12133d;
}
    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="logo-verify text-center mb-3">
                <img src="{{asset('public/assets/image/fantasy-allstars 1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="card verify-modal-sec">
                <div class="card-header">
                <h5 class="modal-title">{{ __('Verify Your Email Address') }}</h5>    
                </div>

                <div class="card-body text-dark">
                    @if (session('resent'))
                        <div class="alert alert-success " role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline links-are">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
