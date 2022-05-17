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

        <!-- Icons -->
        <link href="{{ asset('frontend/icons/simpleline/css/simple-line-icons.css') }}" rel="stylesheet">

        <!-- Icons -->
        <link href="{{ asset('admin') }}/css/nucleo-icons.css" rel="stylesheet" />
        
        <!-- Styles -->
        <link type="text/css" href="{{ asset('themes/frontend/css/app.css') }}" rel="stylesheet">


        @livewireStyles
        <!-- EXTRA CSS -->
        <style>
             @import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600&display=swap');
            
            .equal-elm{
                height: 54px;
            }
            .product-badges {
                text-align: left;
            }
            .badge {
                display: inline-block;
                padding: 0.25rem 0.5rem;
                font-size: 0.62475rem;
                font-weight: 700;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25rem;
            }
            .badge {
                text-transform: uppercase;
                line-height: 12px;
                border: none;
                text-decoration: none;
                margin-bottom: 5px;
            }
            .badge-sale {
                color: #E80E29;
                background-color: #FACED3;
            }
            .badge-hot {
                color: #D35400;
                background-color: #F6DCCB;
            }
             .main-content {
                position: relative;
            }
            #masthead{
                position: absolute;
                width: 100%;
                z-index: 999;
            }
            #masthead .header-main{
                height: 120px;
            }

            #hero_banner .slick-dotted.slick-slider {
                margin-bottom: 0!important;
            }

            .productlist-sect {
                position: relative;
                padding-top: 100px;
                padding-bottom: 100px;
                margin-top: -20px;
            }
            .flashsale-sect {
                padding: 50px 0 30px 0;
            }
            .ads-sect{
                padding-top: 70px;
                padding-bottom: 60px;
            }

            .ads-sect .ads-content {
                padding: 40px 50px 40px 50px;
            }

            .ads-sect .ads-content h2{
                color: #18191B;
                font-size: 28px;
                font-weight: 600;
                line-height: 1.32em;
                margin-bottom: 10px;
            }
            .ads-sect .ads-content .btn-shop{
                padding: 12px 20px;
                margin-right: 12px;
                border-radius: 30px;
                background-color: #fff;
                border: none;
                position: relative;
                color: #333;
                font-size: 14px;
                font-weight: 600;
            }
            .ads-sect .ads-content .btn-shop:hover{
                color: #FFF;
                background-color: #219653;
            }
  
            .productlist-sect {
                background-color: #659676;
                padding-top: 130px;
                padding-bottom: 60px;
            }
            .productlist-sect, .ads-sect .ads-wrap{
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .productlist-sect, .ads-sect .ads-wrap{
                border-radius: 10px 10px 10px 10px;
            }

            .ads-sect .ads-wrap .ads-content{
                min-height: 220px;
                padding: 40px 50px;
            }
            .common-heading h1{
                font-family: 'Work Sans', sans-serif;
                text-transform: capitalize;
                margin-bottom: 1.975rem;
                color: #fff;
                z-index: 10;
            }

            .popular-products .slick-slide {
                margin: 10px 10px 0 10px;
            }

            .products-grid-wrap .slick-slider .slick-arrow{
                height: 50px;
                width: 50px;
                letter-spacing: 0;
                font-weight: 400;
                background-color: #fff;
                box-shadow: 0 3px 5px 0 #8f96ab;
                border: 1px solid #8f96ab;
                border-radius: 50%;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                z-index: 6;
                transition: transform .2s ease;
            }

            .products-grid-wrap .slick-slider .slick-prev::before,
            .products-grid-wrap .slick-slider .slick-next::before{
                display:none;
            }

            .products-grid-wrap .slick-slider .slick-prev i ,
            .products-grid-wrap .slick-slider .slick-next i {
                font-size: 20px;
                color: #7d7d7d;
            }

            .popular-products .single-product {
                position: relative;
                border-radius: 10px;
                padding: 1.3rem;
                text-align: center;
                background: #fffffa;
            }
            .single-product .view-icon{
                position: absolute;
                top: 0;
                bottom: 0;
                right: 0;
                width: auto;
                margin: 0;
                padding: 1.3rem 1.3rem 0 0;
            }
            .view-icon i {
                color: #747C97;
            }
            .view-icon button:hover, 
            .view-icon button:focus {
                border: none;
            }
            .single-product .thumbnail-wrapper img{
                max-width: 100%;
                height: auto;
                border: none;
            }
            .single-product .product-inner:hover .thumb-link.hover-zoom figure {
                transform: scale(1.15);
            }
            .product-inner figure {
                max-height: 200px;
            }
            .single-product .thumb-link {
                display: inline-block;
                vertical-align: top;
                max-width: 100%;
                position: relative;
            }
            .single-product .thumb-link.hover-zoom {
                overflow: hidden;
            }
            .single-product .thumb-link.hover-zoom figure {
                transition: all .3s ease;
            }
            .single-product .product-title {
                font-family: 'Work Sans', sans-serif;
                font-size: .875rem;
                font-weight: 500;
                line-height: 1.5;
                text-align: left;
            }
            .single-product .product-title a{
                color: #3e445a;
            }     

            .single-product .product-info .group-price {
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: relative;
            }
            .add-to-cart{
                display: block;
                position: relative;
                max-width: 100%;
            }
  
            .single-product .group-price .add-to-cart > a{
                background-color: #d8ae5f;
                width: 44px;
                color: #fff;
                border-radius: 40%;
                padding: 12px 0;
            }
            .single-product .group-price .prod-price {
                font-family: 'Work Sans', sans-serif;
                font-size: 14px;
                color: #ec4055;
                font-weight: 500;
            }


            /* Product Detail Modal Syles */
            .modal-dialog {
            max-width: 900px!important;
            }
            .unit-of-measure{
                font-size: 14px;
                line-height: 24px;
                margin: 0 0 3px;
                color: #abb8c3;
            }
            .short-description p{
                color: #abb8c3;
            }
     
            .unit-price .amount{
                font-weight: 600;
                font-size: 1.2em;
                color: #D35400;
            }
           .sku_wrapper .value,
           .categories_wrapper .value{
                color: #abb8c3;
           }

           /* .modal-backdrop.show{
               opacity: 0!important;
           } */
        </style>
        <!-- /EXTRA CSS -->

    </head>
    <body class="{{ $class ?? '' }}">
        
        <!-- Preloader -->
        <!-- End Preloader -->

        <!-- Main Content -->
        <div class="main-content">
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

        <!-- Main JS -->
        <script src="{{ asset('themes/frontend/js/app.js') }}"></script>
        @livewireScripts

        @stack('child-scripts')
    </body>
</html>