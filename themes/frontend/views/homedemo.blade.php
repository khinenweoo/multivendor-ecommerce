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
        

        <!-- Styles -->
        <link type="text/css" href="{{ asset('themes/frontend/css/app.css') }}" rel="stylesheet">
        
        <!-- Smooth Video UI -->
        <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />

        <!-- EXTRA CSS -->
        <div class="extra_css">
        <style>
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            #demo-page{
                height: 100%;
            }
            .hero-section .hero_bg {
                width: 100%;
                height: 100%;
                padding: 25px;
                overflow: hidden;

                /* background: linear-gradient(90deg, rgba(226,165,52,1) 0%, rgba(216,174,95,1) 100%); */
                /* background: linear-gradient(90deg, rgba(226,165,52,1) 0%, rgba(236,171,50,1) 72%, rgba(218,171,82,1) 100%); */
            }
            .product-list {
                position: relative;
                display: block;
                box-sizing: border-box;
            }
            .hero-section h1 {
                color: #000;
                font-size: 2.6rem;
            }
            .product-card {
                padding: 25px 20px;
                background-color: #ffffff;
                border-radius: 0;
                box-shadow: 0 3.4px 2.7px -30px rgb(0 0 0 / 6%), 0 8.2px 8.9px -30px rgb(0 0 0 / 7%), 0 25px 40px -30px rgb(0 0 0 / 20%);
            }
            .product-card .product-photo img{
                max-width: 100%;
                height: auto;
                margin-bottom: 15px;
            }
            @media only screen and (min-width: 375px){
                .row-for-card {
                    grid-template-columns: repeat(2,1fr);
                }
            }
            @media only screen and (min-width: 520px){
                .row-for-card {
                    grid-template-columns: repeat(2,1fr);
                }
            }
            @media only screen and (min-width: 767px){
                .row-for-card {
                    grid-template-columns: repeat(3,1fr);
                }
            }
            @media only screen and (min-width: 991px){
                .row-for-card {
                    grid-template-columns: repeat(3,1fr);
                }
            }
            @media only screen and (min-width: 1300px){
                .row-for-card {
                    grid-template-columns: repeat(4,1fr);
                }
            }
            @media only screen and (min-width: 1660px){
                .row-for-card {
                    grid-template-columns: repeat(6,1fr);
                }
            }
            @media only screen and (min-width: 1800px){
                .row-for-card {
                    grid-template-columns: repeat(8,1fr);
                }
            }
            .product-list .row-for-card {
                display: grid;
                grid-gap: 30px;
                padding: 20px 0;
            }
     
            .product-info .prod-name, .product-info .prod-price{
                font-family: "Poppins", sans-serif;
                color: #000;
                font-size: 1.2rem;
            }

            .product-container-full {
                position: relative;
            }


            .header_container {
                width: 100%;
            }
            .banner-slide img {
                height: 600px;
            }
        </style>
        </div>
        <!-- /EXTRA CSS -->
        
    </head>
    <body class="{{ $class ?? '' }}">
        
        <!-- Preloader -->

         <!-- End Preloader -->

        <!-- Main Content -->
        <div class="main-content site" id="demo-page">
            <header id="masthead" class="header-area">
                <nav>
                    <!-- Primary Navbar -->
                    <div class="header-middle header-sticky">
                        <div class="header-main-area">
                            <div class="container">
                                <div class="row">
                                <div class="col-12">
                                    <div class="header-main">
                                        <div class="logo header-block">
                                            <a href="{{ route('admin.home') }}"
                                            class="pt-2" style="color:#232f3e;font-size:22px;line-height:1;font-weight:600;letter-spacing:.3em;">
                                                Demo <br>
                                                <span style="font-size:11px;letter-spacing:.1em;text-transform:uppercase;">of Ecom</span>
                                            </a>
                                        </div>
                                        <div class="primary-menu header-block">
                                            <nav class="main-navbar navbar-expand-xl">
                                                <ul class="primary-menu d-flex justify-content-center">
                                                    <li class="menu-item">
                                                        <a class="link-title active" href="{{route('home')}}">
                                                            <span>Home</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="" class="link-title">
                                                            <span>Promotions</span>
                                                            
                                                        </a>
                                            
                                                    </li>
                      
                                                    <li class="menu-item">
                                                        <a class="link-title" href="{{ route('vendor-shop.list') }}">
                                                            <span>Official Stores</span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown">                    
                                                        <li><a href="{{ route('vendor-shop.list') }}" class="site-nav">Local Stores</a></li>
                                                        <li><a href="#" class="site-nav">Global Stores</a></li>
                                                        </ul>
                                                    </li>
                                
                                                    <li class="menu-item">
                                                        <a class="link-title" href="{{ route('becomeseller') }}">
                                                            <span>Sell</span>
                                                        </a>
                                                        <ul class="dropdown">                    
                                                        <li><a href="{{ route('seller.register') }}" class="site-nav">Local Seller</a></li>
                                                        <li><a href="#" class="site-nav">Global Seller</a></li>
                                                        </ul>
                                                    </li>
                            
                                                    <li class="menu-item">
                                                        <a class="link-title" href="{{ route('blogs') }}">
                                                            <span>Blog</span>
                                                        </a>
                                                    
                                                    </li>
                            
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="right-block header-block">
                                            <ul class="shop-element">

                                                <li class="user-wrap d-none d-sm-block">
                                                @if (Route::has('user.login')) 
                                                    <div class="user d-flex" style="width:100%;">

                                                    @auth
                                                        
                                                        <i class="icon-user"></i>
                                                            <h6 class="auth-username mx-2">Hi, {{Auth::user()->name}}</h6>
                                                            <i class="fa fa-angle-down py-1"></i>
                                                        @else
                                                        <div class="icon-wrap">
                                                        <i class="icon-user"></i>
                                                        </div>
                                                        <div class="auth-links" >

                                                            <a href="{{ route('user.login') }}" class="text-left">Login</a>
                                                            <a href="{{ route('user.register') }}" >Register</a>
                                                            
                                                        </div>
                                                        @endauth
                                                    </div>
                                                @endif 
                                                @auth
                                                <ul class="dropdown">
                                        
                                                    <li class="user-profile-link">
                                                    <a href="{{route('user.dashboard')}}" class="site-nav">
                                                        <div class="avatar-wrap">
                                                        @if(Auth::user()->profile_photo)
                                                        <img src="{{ asset('/users/'.Auth::user()->profile_photo) }}" style="max-width: 60px;max-height: 60px;" class="user-avatar-icon" alt="">
                                                        @else
                                                        <img src="{{ asset('frontend/images/customer/no-user-avatar.svg') }}" class="user-avatar-icon" alt="">
                                                        @endif
                                                        </div>
                                                        <div class="submenu-text">
                                                        <p>View your profile</p>
                                                        </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="" class="site-nav">
                                                        <i class="icon-notebook"></i>
                                                        Purchases 
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="" class="site-nav"> 
                                                        <i class="icon-settings"></i>
                                                        Account settings
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="" class="site-nav">
                                                        <i class="icon-heart"></i>
                                                        Your wish list
                                                    </a>
                                                    </li>
                                                
                                                    <li class="logout-container">
                                                    <a class="site-nav" href="{{ route('user.logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="icon-logout"></i>
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                    </li>
                                                                        
                                                </ul>
                                                @endauth
                                                </li>
                                                <li class="wishlist-wrap">
                                                    <a href="" class="wishlist-btn">
                                                        <i class="icon-heart"></i>
                                                        <span class="wishlist-counter">0</span>
                                                    </a>
                                                </li>
                                            
                                                <li class="cart-wrap">
                                                <div class="shopping-cart">
                                                @livewire('cart-count-component')
                                                </div>
                                            </li>
                                                <li class="toggler-wrap">
                                                <button class="site-header__menu navbar-toggler mobile-nav--open" type="button" data-toggle="collapse" data-target="#navbarContent">
                                                    <span class="line"></span>
                                                </button>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
    
            <!-- Main Slider-->
            <section class="header_conatiner">
                <div id="demopg-slider" class="demopg-slider">
                    <!--.hero-slide-->
                    <div class="banner-slide">
                        <img alt="Banner Slide" class="img-fluid cover" src="{{ asset('frontend/images/home/home-slide1.jpg') }}">
                        <div class="row">
                        <div class="slide-content text-left col-md-6 col-sm-12">
                            <span class="slide-text">
                                Top Selling
                            </span>
                            <h1 class="slide-title mb-3">Custom Men's <br>
                            <span style="text-transform:uppercase;">Running Shoes</span>
                            <br/> <h5 class="sale-text">Sale up to <span >30% Off</span></h5>
                            </h1>  
                        </div>
                        </div>
                    </div>
   
                    <!--.hero-slide-->
                    <div class="banner-slide">
                        <img alt="Banner Slide" class="img-fluid cover" src="{{ asset('frontend/images/home/home-slide2.jpg') }}">
                        <div class="row">
                        <div class="slide-content text-left col-md-6 col-sm-12">
                            <span class="slide-text">
                                Top Selling
                            </span>
                            <h1 class="slide-title mb-3">Custom Men's <br>
                            <span style="text-transform:uppercase;">Running Shoes</span>
                            <br/> <h5 class="sale-text">Sale up to <span >30% Off</span></h5>
                            </h1>  
                        </div>
                        </div>
                    </div>
                    <!--.hero-slide-->
                    <div class="banner-slide">
                        <img alt="Banner Slide" class="img-fluid cover" src="{{ asset('frontend/images/home/home-slide3.jpg') }}">
                        <div class="row">
                        <div class="slide-content text-left col-md-6 col-sm-12">
                            <span class="slide-text">
                                Top Selling
                            </span>
                            <h1 class="slide-title mb-3">Custom Men's <br>
                            <span style="text-transform:uppercase;">Running Shoes</span>
                            <br/> <h5 class="sale-text">Sale up to <span >30% Off</span></h5>
                            </h1>  
                        </div>
                        </div>
                    </div>
         
                </div>
            </section>
            <!-- End Main Slider -->

            <!-- Product section -->
            <section class="product-list">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="filter-bar d-flex justify-content-between">
                                <div class="left-col"></div>
                                <div class="right-col">
                                    <div class="product-count">Showing <span class="perpage"></span> of <span class="total"></span> results</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container product-container-full">
                    <div class="container-wrap">
                        <div class="row-for-card">
                            @foreach ($trending_products as $tproduct)
                            <div class="product-card">
                                <div class="product-photo">
                                    <img src="{{asset('storage/products/'.$tproduct->product_image)}}" alt="product image">
                                </div>
                                <div class="product-info">
                                    <h3 class="prod-name">
                                        <a href="{{route('product.detail', $tproduct->product_slug)}}">{{ $tproduct->product_name }}</a>
                                    </h3>
                                    <span class="prod-price">MMK {{ $tproduct->price }}</span>
                                </div>
                                <div class="product-action">
                                    <div class="addtocart-button rounded transition-colors">
                                        <a href="#" class="add-to-cart action-btn d-flex text-xs md:text-sm text-dark" style="justify-content:center;align-items:center;" aria-label="Add To Cart">
                                        <i class="fa fa-shopping-bag px-2"></i></a>
                                    </div>
                                </div>                       
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Main Content -->

        <!-- Scroll Top Button -->
        <a class="scroll-top" id="scroll-top" ><i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </a>  
        <script src="{{ asset('/frontend/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('/frontend/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('/frontend/js/plugins.js') }}"></script>
        <script>
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        </script>
       
        @stack('js')

        <!-- Main JS -->
        <script src="{{ asset('/js/app.js') }}"></script>

    </body>
</html>