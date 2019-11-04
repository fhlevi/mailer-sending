<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.css">
</head>
<body>
    @php
        $route_name       = explode('.', Route::currentRouteName());
        $folder     = ((isset($route_name[0])) ? ($route_name[0]) : (''));
        $controller = ((isset($route_name[1])) ? ($route_name[1]) : (''));
        $function   = ((isset($route_name[2])) ? ($route_name[2]) : (''));
    @endphp

    @include('layouts.navbar')
        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @if ($folder = 'daftar_hadir')
        @include($folder . '.validation')
    @endif
</body>
</html>
