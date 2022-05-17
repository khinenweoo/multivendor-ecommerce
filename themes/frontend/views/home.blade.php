@extends('layouts.app')

@section('content')
<div id="body-content" class="body-content">
    <!-- Main Slider-->
    <section class="home_header">
        <div class="hero_slider" data-arrows="true" data-autoplay="true">
          <!--.hero-slide-->
          <div class="hero-slide">
             <img alt="Banner Slide" class="img-responsive cover" src="{{ asset('frontend/images/home/slide1.jpg') }}">
            <div class="row">
            <div class="slide-content text-left col-md-4 col-sm-12">
                <span class="slide-text">
                    Top Selling
                 </span>
                <h1 class="slide-title mb-3">Custom Men's <br>
                   <span style="text-transform:uppercase;">Running Shoes</span>
                   <br/> <h5 class="sale-text">Sale up to <span >30% Off</span></h5>
                </h1>  
                <div class="slidebtn-wrap pt-3">
                <a class="slide-btn btn" href="#" tabindex="0">Shop Now <i class="fa fa-arrow-right"></i></a>
                </div>
             </div>
             <div class="slide-image col-md-6 col-sm-12">
                <img alt="Banner Image" class="img-responsive cover" src="{{ asset('frontend/images/home/shoes.png') }}">
             </div>
            </div>
          </div>
           <!--.hero-slide-->

         
          <!--.hero-slide-->
          <div class="hero-slide">
             <img alt="Banner Image" class="img-responsive cover" src="{{ asset('frontend/images/home/slide-2.jpg') }}">
             <div class="slide-content text-left col-lg-4">
                <span class="slide-text">
                    Deals and Promotions
                 </span>
                 <h1 class="slide-title mb-3">Smart Phones <br>
                   <span style="text-transform:uppercase;">Huge Sale</span>
                   <br/> <h5 class="sale-text">Sale off <span >75%</span> all products</h5>
                </h1>  
                <div class="slidebtn-wrap pt-3">
                    <a class="slide-btn btn" href="#" tabindex="0">Shop Now</a>
                </div>
             </div>
             <!-- <div class="slide-image col-md-6 col-sm-12">
                <img alt="Banner Image" class="img-responsive cover" src="{{ asset('frontend/images/home/ski.png') }}">
             </div> -->
          </div>
          <!--.hero-slide-->
          <div class="hero-slide">
             <img alt="Banner Image" class="img-responsive cover" src="{{ asset('frontend/images/home/slide-4.jpg') }}">
             <div class="slide-content text-left col-lg-4">
                <span class="slide-text">
                    High Definition
                 </span>
                 <h1 class="slide-title mb-3" style="color:#fff;">Best Camera For You<br>
                   <span style="color:#fff;text-transform:uppercase;">Get It Now</span>
                   <!-- <br/> <h5 class="sale-text">Sale off <span >75%</span> all products</h5> -->
                </h1>  
                <div class="slidebtn-wrap pt-3">
                    <a class="slide-btn btn" href="#" style="color:#fff;">Shop Now <i class="fa fa-arrow-right"></i></a>
                </div>
             </div>
             <!-- <div class="slide-image col-md-6 col-sm-12">
                <img alt="Banner Image" class="img-responsive cover" src="{{ asset('frontend/images/home/ski.png') }}">
             </div> -->
          </div>
  
        </div><!--.hero-->
    </section>	 
    <!-- End Main Slider -->
    <!-- Category Section -->
    <div class="category-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="sect-header">
                        <h2> Featured Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row categories-row">
                @foreach($featured_categories as $category)
                <div class="col-6 col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="item-cat">
                        <div class="item-image">
                            <a href="{{route('category.products', ['category_slug'=>$category->slug])}}" class="category-link">
                                <img src="{{ asset('storage/'.$category->category_image) }}" alt="category photo">
                            </a>
                            <div class="cat-name">
                                <h3>
                                    <a href="{{route('category.products', ['category_slug'=>$category->slug])}}">{{ $category->name }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    
        </div>
    </div>
    <!-- Category Section -->
    <!-- Shop Section -->
    <section class="shop-section" >
        <div class="feature-seller-wrap mb-4">
        <!-- section title -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="sect-header pull-left">
                        <h2>Top Weekly Vendors</h2>
                    </div>
                    <div class="right-block d-inline pull-right my-3">
                            <a class="viewall-btn px-3 py-2" href="{{route('vendor-shop.list')}}">See All →</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section title -->
        @if($featured_stores->count() > 0 )
            <div class="seller-shop-slider">
                @foreach($featured_stores as $store)
                <div class="shop-wrap">
                    <div class="shop-top-banner">
                        <div class="shop-banner">
                            <img src="{{ asset('storage/shop_banners/'.$store->banner) }}" alt="">
                        </div>
                    </div>
                    <div class="shop-detail">
                        <div class="shop-info-wrap">
                            <div class="shop-logo">
                                <img src="{{ asset('storage/shop_logos/'.$store->logo_image) }}" alt="shop logo">
                            </div>
                            <h3 class="shop-name">
                                <a href="{{route('vendor-shop.home', ['shop_slug'=>$store->shop_slug])}}" class="seller-link">
                                   {{$store->shop_name}}
                                </a>
                            </h3>
                            <h4 class="shop-categories">{{$store->main_categories}}</h4>
                        </div>
                        <a href="{{route('vendor-shop.home', ['shop_slug'=>$store->shop_slug])}}" class="view-shop">Visit</a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        </div>
    </section>
    <!-- End Shop Section -->
    
    <!-- Advertisement Section -->
    <section class="advertisement-section">
        <div class="advertise-grid">
            <ul class="advertise-wrap">
                <!-- Promo Block -->
                <li class="promo-wrapper">
                    <a class="banner-block banner-effect" href="#">
                        <img class="promo-img" src="{{ asset('frontend/images/home/ads1.jpg') }}" alt="promotion product">
                        <!-- <div class="contain-banner">
                            <div class="promo-content text-left">
                                <h3 class="promo-name">Dresser Chest in white</h3>
                                <h4 class="promo-percent"> Sale Up to <br> <span>30%</span>off</h4>
                               
                            </div>
                            <a href="" class="shop-now">
                                Shop Now
                            </a>
                        </div> -->
                    </a>
                </li>
                <!-- Promo Block -->
                <li class="promo-wrapper">
                    <a class="banner-block banner-effect" href="#">
                        <img class="promo-img" src="{{ asset('frontend/images/home/ads2.jpg') }}" alt="promotion product">
                        <!-- <div class="contain-banner">
                            <div class="promo-content text-left">
                                <h3 class="promo-name">Desk and table lamps</h3>
                                <h4 class="promo-percent"> Discount Price <br> <span>30%</span>off</h4>
                               
                            </div>
                            <a href="" class="shop-now">
                                Shop Now
                            </a>
                        </div> -->
                    </a>
                </li>
                 <!-- Promo Block -->
                <li class="promo-wrapper">
                    <a class="banner-block banner-effect" href="#">
                        <img class="promo-img" src="{{ asset('frontend/images/home/ads3.jpg') }}" alt="promotion product">
                        <!-- <div class="contain-banner">
                            <div class="promo-content text-left">
                                <h3 class="promo-name">Home Decorations</h3>
                                <h4 class="promo-percent"> Sale Up to <br> <span>30%</span>off</h4>
                                
                            </div>
                            <a href="" class="btn shop-now">
                                Shop Now
                            </a>
                        </div> -->
                    </a>
                </li>
                 <!-- Promo Block -->
                 <li class="promo-wrapper">
                    <a class="banner-block banner-effect" href="#">
                        <img class="promo-img" src="{{ asset('frontend/images/home/ads4.jpg') }}" alt="promotion product">
                        <!-- <div class="contain-banner">
                            <div class="promo-content text-left">
                                <h3 class="promo-name">Brand New Jewelry</h3>
                                <h4 class="promo-percent"> Save Up to <br> <span>40%</span>off</h4>
                                
                            </div>
                            <a href="" class="btn shop-now">
                                Shop Now
                            </a>
                        </div> -->
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Advertisement Section -->

    <!-- Trending and New Arrivals Items Section -->
    <section class="trending-section">
        <div class="product-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 col-sm-12">
                        <!-- section title -->
                        <div class="sect-header trending">
                            <h2>
                                <img src="{{ asset('frontend/images/home/diamond-gold.svg') }}" alt="">
                                <span>Trending</span> 
                            </h2>
                        </div>
                        <!-- end section title -->
                        <!-- trending slider -->
                        <div class="trending-slider" id="trending-slider">
                                    
                                    @foreach ($trending_products as $tproduct)
                                        <!-- sigle product start -->
                                        <div class="single-product product-card">
                                            <div class="product-image">
                                                <a href="{{route('product.detail', $tproduct->product_slug)}}" class="prod-img">
                                                    <img src="{{ asset('storage/products/'.$tproduct->product_image) }}" alt="">
                                                </a>
                                                <div class="prod-action">
                                                    <a href="" class="wishlist"><i class="fa fa-heart"></i></a>


                                                    <a href="#"  wire:click.prevent="addtocart({{$tproduct->product_id}},'{{$tproduct->product_name}}',{{$tproduct->price}})" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>

                                                    <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-name">
                                                    <a href="{{route('product.detail', $tproduct->product_slug)}}">{{ $tproduct->product_name }}</a>
                                                </h3>
                                                <div class="prodct-price">
                                                    <span class="price">MMK{{ $tproduct->price }}</span>
                                                </div>
                                                @php
                                                    $prod_shop = App\Models\Shop::where('seller_id', $tproduct->seller_id)->first();
                                                @endphp
                                                @if($tproduct->added_by == 'seller')
                                                <div class="product-seller pb-3">
                                                    <i class="fa fa-home"></i>Store: <span>{{$prod_shop->shop_name}}</span>
                                                </div>
                                                @else
                                                <div class="product-seller">
                                                <i class="fa fa-home"></i>Store: <span>Admin</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- single product end -->
                                    @endforeach

                        </div>
                        <!-- end trending slider-->       
                    </div>
                    <div class="col-12 col-lg-4 col-sm-12">
                        <!-- section title -->
                        <div class="sect-header new-arrivals">
                            <h2><i class="fa fa-cube" aria-hidden="true"></i> <span>New</span></h2>
                        </div>
                         <!-- end section title -->
                        <!-- new arrival slider -->
                        <div class="new-arrivals-slider" id="new-arrivals-slider">
                                    @foreach ($new_products as $nproduct)
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="{{route('product.detail', $nproduct->product_slug)}}" class="prod-img">
                                                <img src="{{ asset('storage/products/'.$nproduct->product_image) }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="{{route('product.detail', $nproduct->product_slug)}}" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="{{route('product.detail', $nproduct->product_slug)}}">{{ $nproduct->product_name }}</a>
                                            </h3>
                                            <div class="prodct-price">
                                                <span class="price">MMK {{ $nproduct->price }}</span>
                                            </div>
                                            @php
                                                $prod_shop = App\Models\Shop::where('seller_id', $nproduct->seller_id)->first();
                                            @endphp
                                            @if($nproduct->added_by == 'seller')
                                            <div class="product-seller pb-3">
                                                <i class="fa fa-home"></i>Store: <span>{{$prod_shop->shop_name}}</span>
                                            </div>
                                            @else
                                            <div class="product-seller">
                                            <i class="fa fa-home"></i>Store: <span>Admin</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                   
                        </div>
                        <!-- end new arrival slider -->
                    </div>
                    <div class="col-12 col-lg-4 col-sm-12">
                                <!-- section title -->
                                <div class="sect-header top-rated"> 
                               <h2><i class="fa fa-line-chart" aria-hidden="true"></i>
                                    <span>Top Rated</span> 
                                </h2>
                                </div>
                                <!-- end section title -->
                                <!-- Top Rated slider -->
                                <div class="product-slider" id="top-rated-slider">
                                    
                                @foreach ($default_products as $product)
                                    <!-- sigle product start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="{{route('product.detail', $product->product_slug)}}" class="prod-img">
                                                <img src="{{ asset('storage/products/'.$product->product_image) }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="{{route('product.detail', $product->product_slug)}}" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="{{route('product.detail', $product->product_slug)}}">{{ $product->product_name }}</a>
                                            </h3>
                                            <div class="prodct-price">
                                                <span class="price">MMK{{ $product->price }}</span>
                                            </div>
                                            @php
                                                $prod_shop = App\Models\Shop::where('seller_id', $product->seller_id)->first();
                                            @endphp
                                            @if($product->added_by == 'seller')
                                            <div class="product-seller pb-3">
                                                <i class="fa fa-home"></i>Store: <span>{{$prod_shop->shop_name}}</span>
                                            </div>
                                            @else
                                            <div class="product-seller">
                                            <i class="fa fa-home"></i>Store: <span>Admin</span>
                                            </div>
                                            @endif
                                            <div class="reviewStarsWrapper text-left">
                                           <div class="rating_stars">
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star"></i>
                                           </div>
                                       </div>
                                        </div>
                                    </div>
                                    <!-- single product end -->
                                @endforeach

                                </div>
                                <!-- end trending slider-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Section --> 

    <section class="flash-sale-section">
    </section>

    <!-- Top Rated Products Section -->
    <section class="user-selection-section" style="background: url({{ asset('../frontend/images/home/shop-bg.png') }}) no-repeat center center;background-size: cover;">
        <div class="product-wrap top-rated-product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- section title -->
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12">
                                <div class="sect-header">
                                    <h2><span>Best</span> Sellers</h2>
                                </div>
                            </div>
                        </div>
                        <!-- end section title -->
                    </div>
                    <div class="col-12">
                        <div class="product-slider" id="recommended-slider">

                        @foreach ($recommend_products as $rproduct)
                            <div class="single-product product-card">
                                <div class="product-image">
                                    <a href="{{route('product.detail', $rproduct->product_slug)}}" class="prod-img">
                                        <img src="{{ asset('storage/products/'.$rproduct->product_image) }}" alt="">
                                    </a>
                                    <div class="prod-action">
                                        <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                        <a href="{{route('product.detail', $rproduct->product_slug)}}" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                        <a href="{{route('product.detail', $rproduct->product_slug)}}" class="quick-view"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                       <h3 class="product-name">
                                           <a href="">{{ $rproduct->product_name }}</a>
                                       </h3>
                                       <div class="prodct-price">
                                           <span class="price">{{ $rproduct->price }} MMK</span>
                                       </div>
                                            @php
                                                $prod_shop = App\Models\Shop::where('seller_id', $rproduct->seller_id)->first();
                                            @endphp
                                        @if($nproduct->added_by == 'seller')
                                            <div class="product-seller pb-3">
                                                <i class="fa fa-home"></i>Store: <span>{{$prod_shop->shop_name}}</span>
                                            </div>
                                        @else
                                            <div class="product-seller">
                                            <i class="fa fa-home"></i>Store: <span>Admin</span>
                                            </div>
                                         @endif             
                                       <div class="reviewStarsWrapper text-left">
                                           <div class="rating_stars">
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star"></i>
                                           </div>
                                       </div>
                                </div>
                            </div>
                        @endforeach
                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Rated Products Section -->

    <section class="justforyou-section">
    <div class="product-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- section title -->
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12">
                                <div class="sect-header">
                                    <h2><span>Just</span> For You</h2>
                                </div>
                            </div>
                        </div>
                        <!-- end section title -->
                    </div>
                    <div class="col-12">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section Start -->
    <section class="blog-section">
        <div class="blog-wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- section title -->
                        <div class="sect-header">
                            <h2><span>Latest</span> Blog</h2>
                        </div>
                         <!-- end section title -->

                        <div class="blog-slider" id="blog-slider">
                            <!-- single blog -->
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <a href="">
                                        <img height="270" src="{{ asset('frontend/assets/images/home/blog1.jpg') }}" alt="blog post image">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title">
                                        <a href=""> Vestibulum ante ipsum primis..</a>
                                    </h2>
                                    {{-- <p class="blog-desc">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis inventore laborum soluta ipsam sed accusantium. Fugiat velit molestias mollitia. Eius laboriosam eos commodi rem magnam molestiae! Excepturi ipsum eaque sequi?
                                    </p> --}}
                                    <div class="post-meta">
                                        <div class="post-author">Posted By<span>Jackson</span></div>
                                        <div class="post-date"><span>May 24, 2021</span></div>
                                    </div>
                                </div>
                            </div>
                            <!-- single blog -->
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <a href="">
                                        <img height="270" src="{{ asset('frontend/images/home/blog2.jpg') }}" alt="blog post image">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title">
                                        <a href="">Delicious Handcraft Bread</a>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-author">Posted By<span>Jackson</span></div>
                                        <div class="post-date"><span>May 24, 2021</span></div>
                                    </div>
                           

                                </div>
                            </div>
                             <!-- single blog -->
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <a href="">
                                        <img height="270" src="{{ asset('frontend/images/home/blog3.jpg') }}" alt="blog post image">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title">
                                        <a href="">Sed neque velit lobortis..</a>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-author">Posted By<span>Jackson</span></div>
                                        <div class="post-date"><span>May 24, 2021</span></div>
                                    </div>
                                    {{-- <p class="blog-desc">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis inventore laborum soluta ipsam sed accusantium. Fugiat velit molestias mollitia. Eius laboriosam eos commodi rem magnam molestiae! Excepturi ipsum eaque sequi?
                                    </p> --}}
                                </div>
                            </div>
                             <!-- single blog -->
                             <div class="blog-post">
                                <div class="blog-post-image">
                                    <a href="">
                                        <img height="270" src="{{ asset('frontend/assets/images/home/blog3.jpg') }}" alt="blog post image">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title">
                                        <a href="">Amoi akua iwed alieuy..</a>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-author">Posted By<span>Jackson</span></div>
                                        <div class="post-date"><span>May 24, 2021</span></div>
                                    </div>
                                </div>
                            </div>
                             <!-- single blog -->
                             <div class="blog-post">
                                <div class="blog-post-image">
                                    <a href="">
                                        <img height="270" src="{{ asset('frontend/assets/images/home/blog4.jpg') }}" alt="blog post image">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title">
                                        <a href="">Eeihu agakmcs auwakla kagui</a>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-author">Posted By<span>Jackson</span></div>
                                        <div class="post-date"><span>May 24, 2021</span></div>
                                    </div>
                                </div>
                            </div>
                             <!-- single blog -->
                             <div class="blog-post">
                                <div class="blog-post-image">
                                    <a href="">
                                        <img height="270" src="{{ asset('frontend/assets/images/home/blog6.jpg') }}" alt="blog post image">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title">
                                        <a href="">Donec pellentesque egestas consequat</a>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-author">Posted By<span>Jackson</span></div>
                                        <div class="post-date"><span>May 24, 2021</span></div>
                                    </div>
                                </div>
                            </div>
                             <!-- single blog -->
                             <div class="blog-post">
                                <div class="blog-post-image">
                                    <a href="">
                                        <img height="270" src="{{ asset('frontend/images/home/blog7.jpg') }}" alt="blog post image">
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title">
                                        <a href="">Italian Spicy Peri</a>
                                    </h2>
                                    <div class="post-meta">
                                        <div class="post-author">Posted By<span>Jackson</span></div>
                                        <div class="post-date"><span>May 24, 2021</span></div>
                                    </div>
                                    {{-- <p class="blog-desc">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis inventore laborum soluta ipsam sed accusantium. Fugiat velit molestias mollitia. Eius laboriosam eos commodi rem magnam molestiae! Excepturi ipsum eaque sequi?
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->
    <!-- Newsletter Section -->
    <section class="newsletter-section" style="background: url({{ asset('frontend/images/home/curvebg.png') }});overflow:hidden;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    <!-- section title -->
                        <div class="section-title">
                            <span class="sub-title">Our Newsletter</span>
                            <h2>
                                <span>Subscribe To Get Latest Deals</span>
                                <img src="" alt="">
                            </h2>
                        </div>
                <!-- end section title -->
                    <div class="newsletter-block">
                        <div class="subscribe-content">
                            <div class="subscribe-block">
                                <input type="email" placeholder="Your Email Address" class="">
                                <button class="subscribe-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Newsletter Section -->
    
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
            @livewire('sidebar-cart-component')


          <div class="action-buttons">
            <a class="view-cart-button" href="{{route('product.cart')}}">Cart</a><a class="checkout-button" href="#">Checkout</a>
          </div>
        </main>
      </aside>
      <div id="sidebar-cart-curtain" class="cart-overlay"></div>

    <!-- end cart sidebar -->

</div>
@endsection