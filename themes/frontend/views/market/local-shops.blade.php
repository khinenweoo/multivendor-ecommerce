@extends('layouts.app')

@section('content')
<main class="local-market-shops">
    <div class="farmer-market-page">
        <div class="banner-wrap"  style="background: url({{ asset('../frontend/images/local-market/main-top.png') }}) no-repeat center center;background-size: cover;">
            <div class="max-width-wrap">
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <div class="banner-content">
                                <h2><span>FARMERS MARKET</span><br>
                                By Genius
                             </h2> 
                                <p class="banner-text">Find and Buy Products<br>
                                 @ Local Shops </p>
                            </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="event-intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto" style="">
                        <div class="content-wrap">
                        <div class="video-block">
                            <video controls preload="auto"  data-setup='{"fluid":true}' class="video-js vjs-big-play-centered" muted width="100%" height="100%" id="eventvideo" autoplay="autoplay" style="display:flex;justify-content: center;align-items: center;">
                            <source src="{{asset('../frontend/videos/farmer-market/event-video.mp4') }}#t=5" type='video/mp4'>
                            </video>
                        </div>
                        <div class="intro-block">
                            <p>
                            Where local vendors,  <br>
                            farmers and consumers <br>
                            gather to connect and<br>
                            shop for organic stuff
                            </p>
                        </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 event-text">
                        <h3 class="header-text text-center  mx-auto">
                            A thriving farmers market <br>
                         for local food lovers
                        </h3>
                        <p class="text-center mx-auto" style="max-width:450px;">Rich with fresh, local organic food products for retailers, stores and 
                            specialty buyers. Farmers and producers get direct access to customers and 
                             instant feedback to help them test and develop products and marketing. <br>
                        <strong> Find a wide range of products in our database, even after the tradefair.</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="search-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="header-text">Find market shops</h3>
                        <div class="search-box-form d-flex">
                            <input type="search" class="store-search-input" name="seller_search" placeholder="Enter Shop Name">
                                <button id="apply-filter-btn" class="search-vendor-btn" type="submit">
                                    Search
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="shops-grid">
            <div class="seller-shops">
                <div class="container">
                    <!-- sorting row -->
                    <!-- <div class="row my-4">
                        <div class="col-6">
                        <div class="result-count text-left">
                                <div class="shop-count">Total vendor showing: <span>20</span> results </div>
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="shoplist-sorting text-right">
                                <select id="shop_orderby" name="orderby" class="orderby">
                                    <option value="newness_asc" selected="selected">Sort by newness: old to new</option>
                                    <option value="newness_desc">Sort by newness: new to old</option>
                                    <option value="rating_asc">Sort by average rating: low to high</option>
                                    <option value="rating_desc">Sort by average rating: high to low</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <!-- end sorting row -->
                    <div class="row">
                        <!-- Single Shop -->
                        @foreach ($active_shops as $shop)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="shop-wrap">
                                <div class="shop-top-banner">
                                    <div class="shop-banner">
                                        <img src="{{ asset('storage/shop_banners/'.$shop->banner) }}" alt="">
                                    </div>
                                </div>
                                <div class="shop-detail">
                                    <div class="shop-info-wrap">
                                        <div class="shop-logo">
                                            <img src="{{ asset('storage/shop_logos/'.$shop->logo_image) }}" alt="seller logo">
                                        </div>
                                        <h3 class="shop-name">
                                            <a href="" class="seller-link">
                                                {{$shop->shop_name}}
                                            </a>
                                        </h3>
                                        <h4 class="shop-categories">{{$shop->main_categories}}</h4>
                                    </div>
                                    <a href="{{route('vendor-shop.home', ['shop_slug'=>$shop->shop_slug])}}" class="view-shop">Visit<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Shop -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="market-gallery">
        <div class="container">
            <div class="row">
                <div class="title-head">
                    <h3 class="header-text">Explore Market Mag:</h3>
                </div>
                <div class="grid-top-wrap">
                    <div class="grid-item">
                        <div class="blog-tile">
                            <a href="" class="tile tile--two-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/market-image.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                            <a href="" class="tile tile--one-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/feature1.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                            <a href="" class="tile tile--one-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/feature2.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                            <a href="" class="tile tile--two-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/market-image2.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                            <a href="" class="tile tile--two-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/market-image3.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                            <a href="" class="tile tile--one-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/feature3.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                            <a href="" class="tile tile--one-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/feature4.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                            <a href="" class="tile tile--two-third">
                                <div class="tile-image">
                                    <img src="{{ asset('../frontend/images/local-market/market-image4.jpg') }}" alt="">
                                    <h4></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
    </div>

</main>
@endsection

@section('extra_js')

  <script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>


@endsection