<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Allstars @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/image/favicon.ico') }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css"  href="{{asset('public/css/bootstrap.min.css')}}" />
    <link href="{{ asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/jquery-ui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/custum.css')}}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YLJ8NL5151"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YLJ8NL5151');
</script>
  </head>
  <body >
    @include('element/web/header')
    @if($errors->any())
@foreach ($errors->all() as $err)
<div class="alert alert-danger" role="alert">
    <li>{{$err}}</li>
</div>

@endforeach
@endif
@if(session()->has('message'))
    <div class="alert alert-success alert-one" id="alert">
        {{ session()->get('message') }}

        <button type="button" class="btn-close" aria-label="Close" onclick="closeAlert()"></button>
    </div>
@endif

    @show
    @yield('content')
    @include('element/web/footer')
    @show

	<script src="{{asset('public/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/js/jquery-ui.js')}}"></script>
    <script src="{{asset('public/js/script.js')}}"></script>
  </body>
</html>
