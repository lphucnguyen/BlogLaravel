<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('APP_NAME', 'Blog') }}</title>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/articleContent.css') }}">
</head>
<body style="background: #ffffff url({{ asset('public/assets/frontend/image/back-pattern.png') }}) repeat fixed top center;">
    @include('layouts.frontend.partial.header')

    @yield('content')

    @include('layouts.frontend.partial.footer')

    <script src="{{ asset('public/assets/frontend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('public/assets/frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('public/assets/frontend/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('public/assets/frontend/js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    <script src="{{ $cdn ?? asset('public/vendor/sweetalert/sweetalert.all.js')  }}"></script>
    @include('sweetalert.alert')
</body>
</html>