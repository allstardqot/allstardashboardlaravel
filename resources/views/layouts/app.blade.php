<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>All Stars @yield('title')</title>

    

    <!-- Styles -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style1.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('public/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/js/script.js')}}"></script>
    <script>
         $("#show-pass").click(function (e) {
        e.preventDefault();
        var type = $("#password").attr('type');
        switch (type) {
            case 'password':
            {
                $("#password").attr('type', 'text');
                return;
            }
            case 'text':
            {
                $("#password").attr('type', 'password');
                return;
            }
        }
    });
    </script>
</body>
</html>
