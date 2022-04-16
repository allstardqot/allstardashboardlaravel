<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All Stars @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css"  href="{{asset('public/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css"  href="{{asset('public/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/custum.css')}}" />
  </head>
  <body >
    @include('element/web/header')

    @show
    @yield('content')
    @include('element/web/footer')
    @show

	<script src="{{asset('public/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/js/script.js')}}"></script>
  </body>
</html>
