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

        <style>
            #new_arrivals .row {
                margin-right: 0 !important;
                margin-left:0 !important;
            }
            .single-product.product-card {
                padding: 10px 0!important;
            }
            .single-product .product-title {
                font-family: 'Work Sans', sans-serif;
                font-size: .875rem;
                font-weight: 500;
                line-height: 1.5;
            }
            .single-product .product-title a{
                color: #3e445a;
            }     

            .single-product .group-price {
                display: flex;
                align-items: center;
                justify-content: space-around;
                position: relative;
            }
            .add-to-cart{
                display: block;
                position: relative;
                max-width: 100%;
            }
  
            .single-product .group-price .add-to-cart > a{
                background-color: #f3f4f6;
                width: 38px;
                color: #fff;
                border-radius: 40%;
                padding: 9px 0 5px 0;
                transition: all .3s ease;
            }
            .single-product .group-price .add-to-cart > a i{
                font-size: 18px;
                    color: #000;
            }

            .single-product .group-price .add-to-cart > a:hover{
                background-color: #d8ae5f;
                box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.11);
            }
            .single-product .group-price .prod-price {
                font-family: 'Work Sans', sans-serif;
                font-size: 15px;
                color: #ec4055;
                font-weight: 500;
            }
        </style>
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