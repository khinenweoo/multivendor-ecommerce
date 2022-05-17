<div>
    <header id="masthead" class="header-area">
        <nav>
                    <!-- Primary Navbar -->
                    <div class="header-middle header-main">
                        <div class="header-main-area">
                            <div class="container-fluid">
                                <div class="row">
                                <div class="col-12">
                                    <div class="header-main">
                                        <div class="logo header-block">
                                            <a href="{{ route('admin.home') }}" 
                                            class="pt-2" style="color: #fff!important;font-size:22px;line-height:1;font-weight:600;letter-spacing:.3em;">
                                                Demo <br>
                                                <span style="font-size:11px;letter-spacing:.1em;text-transform:uppercase;">of Ecom</span>
                                            </a>
                                        </div>
                                        <div class="primary-menu header-block">
                                            <nav class="main-navbar navbar-expand-xl">
                                                <ul class="primary-menu d-flex justify-content-center">
                                                    <li class="menu-item">
                                                        <a class="link-title active" href="{{route('home')}}" style="color: #FFB800!important;">
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
    <div class="content" id="demopage">
        <!-- Banner Slider  -->
        <!-- <section class="main-header" id="hero_banner">
            <div class="home_header">
                    <div class="hero_slider" data-autoplay="true" wire:ignore>
                                
                                    <div class="hero-slide">
                                        <img alt="Banner Slide" class="img-fluid cover" src="{{ asset('frontend/images/home/slider-bg.jpg') }}">
                                        <div class="row">
                                        <div class="slide-content text-left col-md-8 col-12">
                                            <span class="slide-text">
                                            New Arrivals
                                            </span>
                                            <h1 class="slide-title mb-3">Create Your Own </h1>  
                                            <a class="sale-text">See Our promotions</a>
                                        </div>

                                        </div>
                                    </div>
                                   
                                    
                               
                                    <div class="hero-slide">
                                        <img alt="Banner Image" class="img-fluid cover" src="{{ asset('frontend/images/home/home-banner2.jpg') }}">
                                        <div class="slide-content text-left col-md-8 col-12">
                                            <span class="slide-text">
                                            Kitchen
                                            </span>
                                            <h1 class="slide-title mb-3"> Stools with Style </h1>
                                            <a class="sale-text">Explore Now</a>
                        
                                        </div>
                                    
                                    </div>
                               
                                    <div class="hero-slide">
                                        <img alt="Banner Image" class="img-fluid" src="{{ asset('frontend/images/home/home-slide3.jpg') }}">
                                        <div class="slide-content text-left col-md-8 col-12">
                                            <span class="slide-text"> Living Room </span>
                                            <h1 class="slide-title mb-3"> New Arrivals </h1>
                                            <a class="sale-text">Explore Now</a>
                                        </div>
                            
                                    </div>
                    </div>
            </div>
        </section> -->
        <!-- Banner Slider end -->

        <!-- Product Section -->
        <section class="productlist-sect" style="background-image: url({{ asset('../frontend/images/home/bg-img.png') }});">
            <div class="container-fluid widget-container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="common-heading">
                            <h1 class="text-center mb0">Top Picks For You</h1>
                        </div>
                    </div>
                </div>
                <div class="products-grid-wrap">
                    <ul wire:ignore class="popular-products product-slider" id="popularprod-slider">
                        @foreach ($trending_products as $tproduct)
                            <li class="product single-product">
                                <div class="product-inner">
                                    <div class="product-badges">
                                            <span class="badge badge-sale">Sale</span>
                                            <span class="badge badge-hot">Hot</span>
                                    </div>
                                    <div class="view-icon">
                                        <a wire:click.prevent="showDetail({{ $tproduct->product_id }})" data-toggle="modal" data-target="#viewItemModal" type="button" rel="tooltip">
                                            <i class="icon-eye" style="font-size:16pt;"></i>
                                        </a>
                                    </div>
                                    <div class="thumbnail-wrapper">
                                        <a href="" class="thumb-link hover-zoom">
                                            <figure class="primary-thumb">
                                            <img src="{{asset('storage/products/'.$tproduct->product_image)}}" class="img-fluid" alt="{{ $tproduct->product_name }}">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <div class="equal-elm">
                                            <h3 class="product-title">
                                                <a href="{{route('product.detail', $tproduct->product_slug)}}">{{ $tproduct->product_name }}</a>
                                            </h3>
                                        </div>
                                        <div class="group-price">
                                            <span class="price">
                                                <span class="prod-price">{{ $tproduct->price }} Ks</span>
                                            </span>
                                            <span class="add-to-cart">
                                                <a href="#" wire:click.prevent="addtocart({{$tproduct->product_id}},'{{$tproduct->product_name}}',{{$tproduct->price}})" class="btn" aria-label="Add To Cart">

                                                <i class="icon-plus p-2" style="font-size:16pt;"></i>
                                                </a>
                                            </span>
                                        </div>  
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    @include('livewire.front.product.show')
                </div>
            </div>
        </section>

        <section class="ads-sect" >
            <div class="container ads-container">
                <div class="row">
                    <div class="col-md-6 col-12 mt-3">
                        <div class="ads-wrap" style="background-image: url({{ asset('../frontend/images/home/ads1.jpg') }});">
                            <div class="ads-content">
                            <h2 class="heading-title">Organic <br> Up to 20% off</h2>
                            <div class="button-wrapper">
                                <a href="#" class="btn btn-shop"><span>Shop now > </span></a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="ads-wrap mt-3" style="background-image: url({{ asset('../frontend/images/home/ads2.jpg') }});">
                            <div class="ads-content">
                            <h2 class="heading-title text-white">Eat Green <br> Food and Organic</h2>
                            <div class="button-wrapper">
                                <a href="#" class="btn btn-shop"><span>Shop now > </span></a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- sticky shopping cart -->
    <div class="sticky-cart-icon" id="cartcount">
        @livewire('sticky-cart-value-component')
    </div>
    <!-- cart sidebar -->
    <aside id="sidebar-cart" class="cart">
        <main>
            <div class="cart-header">
                <h2>
                    Your Cart
                </h2>
                <a href="#"class="close-button"><span class="close-icon"><i class="tim-icons icon-simple-remove"></i></span></a>
            </div>
            <ul class="products">
            @if(Cart::count() > 0)

            @foreach(Cart::content() as $cartitem)
                <li class="product">
                        <a href="#" class="product-link">
                            <span class="product-image">
                            <figure><img width="90" height="90" src="{{ asset('storage/products/'.$cartitem->model->product_image) }}" alt="Product photo"></figure>
                            </span>
                            <span class="product-details">
                            <h3>{{$cartitem->model->product_name}}</h3>
                
                            <h4 class="price"><strong>{{number_format($cartitem->model->price)}} Ks</strong></h4>
                            <span class="qty-price">
                                <span class="qty">
                                <button type="button" class="minus-button" id="minus-button-1" wire:click="decreaseQuantity('{{$cartitem->rowId}}')" >-</button>
                                <input type="number" id="qty-input" class="qty-input" data-max="120" name="qty-input" value="{{$cartitem->qty}}" pattern="[0-9]*" title="Quantity" >
                                <button type="button" class="plus-button" id="plus-button-1"  wire:click.prevent="increaseQuantity('{{$cartitem->rowId}}')">+</button>
                                
                                </span>

                                <span class="total-price">{{number_format($cartitem->subtotal)}} Ks</span>
                            </span>
                            </span>
                        </a>
                        <form>
                                <a href="#" wire:click.prevent="destroy('{{$cartitem->rowId}}')" class="remove-button" title="remove item"><i class="tim-icons icon-simple-remove"></i></a>
                        </form>
                </li>

            @endforeach
     
            @else
                <p class="my-5"><h5 style="color:#606975;text-align:center;">No item in your cart</h5></p>
            @endif
            </ul>

          <div class="action-buttons" style="height:auto;">
            <div class="totals" style="position: relative!important;bottom: 0!important;">
                <div class="subtotal">
                    <span class="label">Subtotal:</span> <span class="amount"> {{Cart::subtotal()}} Ks</span>
                </div>
            </div>
            <a class="view-cart-button" href="{{route('product.cart')}}"> View Cart</a>
            @auth
            <a class="checkout-button" href="{{ route('user.checkout.confirm') }}">Checkout</a>
            @else
            <a class="checkout-button" href="{{ route('user.regaccount') }}">Checkout</a>
            @endauth
            
          </div>
        </main>
    </aside>
    <div id="sidebar-cart-curtain" class="cart-overlay"></div>
    <!-- end cart sidebar -->
    </div>
</div>

@push('child-scripts')
<script>
            window.livewire.on('ItemDetailModal', () => {
                $('#viewItemModal').modal('hide');
                removeModalShadow();
                location.reload(); 
            });


        function removeModalShadow() {
            var modalshadow = document.querySelector(".modal-backdrop"); 
            modalshadow.classList.remove("show");
        } 
           
</script>
@endpush
