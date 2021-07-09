<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keyword" content="{{ setting('meta_keyword') }}">

    @include('frontend.includes.meta')

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">
    <link rel="icon" type="image/ico" href="{{asset('favicon.png')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('before-styles')

    <link rel="stylesheet" href="{{ mix('css/wed.css') }}">

    @stack('after-styles')

    <x-google-analytics />
</head>

<body>

    @include('frontend.includes.header')

    <x-preloader />

    <main>
        @yield('content')
    </main>

    @include('frontend.includes.footer')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" type="text/css" rel="stylesheet">
</body>

<!-- Scripts -->
@stack('before-scripts')

<script src="{{ mix('js/wed.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#menuOpener').click(function(){
            $('.site-main-menu').addClass('active');
        });
        $('#menuCloser').click(function(){
            $('.site-main-menu').removeClass('active');
        });
    });
</script>

@stack('after-scripts')

</html>
