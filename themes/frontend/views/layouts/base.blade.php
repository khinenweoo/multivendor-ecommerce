<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Proud of Myanmar') }}</title>

        <!-- Bootstrap -->
        <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Animate -->
        <link href="{{ asset('frontend/css/animate.min.css') }}" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- NoUI Slider Min CSS-->
        <link href="{{ asset('assets') }}/nouislider/nouislider.min.css" rel="stylesheet" />


        <!-- Icons -->
        <link href="{{ asset('frontend/icons/simpleline/css/simple-line-icons.css') }}" rel="stylesheet">

        <!-- Icons -->
        <link href="{{ asset('admin') }}/css/nucleo-icons.css" rel="stylesheet" />
        
        <!-- Styles -->
        <link type="text/css" href="{{ asset('themes/frontend/css/app.css') }}" rel="stylesheet">

        
        @livewireStyles

        <!-- EXTRA CSS -->
        <div class="extra_css">
            @yield('extra_css')
        </div>
        <!-- /EXTRA CSS -->
        
    </head>
    <body class="{{ $class ?? '' }}">
        
        <!-- Preloader -->

         <!-- End Preloader -->

        <!-- Main Content -->
        <div class="main-content">
            @include('layouts.nav')
            @yield('content')

            {{ $slot }}
        </div>
        <!-- End Main Content -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- End Footer -->
        
        <!-- Scroll Top Button -->
        <a class="scroll-top" id="scroll-top" ><i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </a>  
        <script src="{{ asset('/frontend/js/jquery-3.6.0.js') }}"></script>
        <script src="{{ asset('/frontend/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <!-- NOUI Slider Min JS -->
        <script src="{{ asset('assets/nouislider/nouislider.min.js') }}"></script>
        <!-- EXTRA JS -->
        <div class="extra_js">
            @yield('extra_js')
        </div>

        @stack('js')

        <!-- Main JS -->
        <script src="{{ asset('themes/frontend/js/app.js') }}"></script>

        @livewireScripts

    </body>
</html>