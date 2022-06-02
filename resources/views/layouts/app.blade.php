<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Proud of Myanmar') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/images/favicon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/images/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/images/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('frontend/images/favicon/site.webmanifest')}}">

        <link href="{{ asset('frontend/icons/simpleline/css/simple-line-icons.css') }}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Animate -->
        <link href="{{ asset('frontend/css/animate.min.css') }}" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- Icons -->
        <link href="{{ asset('frontend/icons/simpleline/css/simple-line-icons.css') }}" rel="stylesheet">

        <!-- Styles -->
        <link type="text/css" href="{{ asset('themes/frontend/css/app.css') }}" rel="stylesheet">

        
    </head>
    <body class="{{ $class ?? '' }}">
        
        <!-- Preloader -->

         <!-- End Preloader -->

        <!-- Main Content -->
        <div class="main-content">
            @include('layouts.nav')
            @yield('content')
        </div>
        <!-- End Main Content -->

        <!-- Footer -->
        <!-- @guest() -->
            @include('layouts.footer')
        <!-- @endguest -->
        <!-- End Footer -->
        <!-- Scroll Top Button -->
        <a class="scroll-top" id="scroll-top" ><i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </a>  
        <script src="{{ asset('/frontend/js/jquery-3.6.0.js') }}"></script>
        {{-- <script src="{{ asset('/frontend/js/jquery.js') }}"></script> --}}

        <script src="{{ asset('/frontend/bootstrap/js/bootstrap.bundle.js') }}"></script>
        
        <!-- EXTRA JS -->
        <div class="extra_js">
            @yield('extra_js')
        </div>
       
        
        @stack('js')

        <!-- Main JS -->
        <script src="{{ asset('themes/frontend/js/app.js') }}"></script>
    </body>
</html>