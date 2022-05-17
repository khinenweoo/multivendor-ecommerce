@extends('layouts.app')

@section('content')
<main class="shop-list-page">

    <!-- Breadcrumbs -->
    <div class="breadcrumb-section">
        <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12 col-sm-12">
                     <nav class="breadcrumb">
                         <ul>
                             <li class="nav-item">
                                 <a href="" class="permal-link">Home</a>
                             </li>
                             <li class="nav-item">
                                 <a href="permal-link">Shop Listing</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
             </div>
        </div>
    </div>
     <!-- End Breadcrumbs -->
    <div class="local-shop-content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="image-block">
                         <img src="{{ asset('../frontend/images/local-market/fm-bg.jpg') }}" alt="" >
                    </div>
                </div>
                <div class="col-md-6 content-block">
                        <h3 class="header-text text-center">
                            Our official Shops
                        </h3>
                        <p class="text-center mx-auto" style="max-width:550px;">Rich with fresh, local organic food products for retailers, stores and 
                            specialty buyers. Farmers and producers get direct access to customers and 
                             instant feedback to help them test and develop products and marketing. <br>
                        <strong> Find a wide range of products at our official stores.</strong>
                        </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop List Section -->
    <div id="shop-list" class="shop-list"> 
        <div class="inner search-bar">
            <div class="container">
                <div class="row">
   
                    <div class="col-12">
                        <!-- Filter Vendor Topbar -->
                        <div class="store-listing-filter-wrap">
                            <!-- <div class="left">
                                <select class="selectCat" name="" >
                                    <option>Choose Category</option>
                                    <option>furniture</option>
                                    <option>handicraft</option>
                                    <option>art & collectibles</option>
                                    <option>clothing & shoes</option>
                                    <option>health & beauty</option>
                                </select>
                            </div>  -->
                            <div class="right">
                                <h3 class="header-text">Find local vendors</h3>
                                <div class="store-search d-flex">
                                <input type="search" class="store-search-input" name="seller_search" placeholder="Enter Shop Name...">
                                <button id="apply-filter-btn" class="search-vendor-btn" type="submit">
                                    Search
                                </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Filter Vendor Topbar -->
                    </div>
                </div>
            </div>
        </div>
        <section class="shops-grid my-5">
            <div class="seller-shops">
                <div class="container">
                    <!-- data count and sort -->
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
                    <!-- end data count and sort -->

                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="shop-wrap">
                                <div class="shop-top-banner">
                                    <div class="shop-banner">
                                        <img src="{{ asset('frontend/images/home/shop-banner1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="shop-detail">
                                    <div class="shop-info-wrap">
                                        <div class="shop-logo">
                                            <img src="{{ asset('frontend/images/home/shoplogo1.png') }}" alt="seller logo">
                                        </div>
                                        <h3 class="shop-name">
                                            <a href="" class="seller-link">
                                                KOTMAN
                                            </a>
                                        </h3>
                                        <h4 class="shop-categories">Clothing</h4>
                                    </div>
                                    <a href="" class="view-shop">Visit<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="shop-wrap">
                                <div class="shop-top-banner">
                                    <div class="shop-banner">
                                        <img src="{{ asset('frontend/images/home/shop-banner2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="shop-detail">
                                    <div class="shop-info-wrap">
                                        <div class="shop-logo">
                                            <img src="{{ asset('frontend/images/home/shoplogo2.png') }}" alt="seller logo">
                                        </div>
                                        <h3 class="shop-name">
                                            <a href="" class="seller-link">
                                                KOTMAN
                                            </a>
                                        </h3>
                                        <h4 class="shop-categories">Home Furniture</h4>
                                    </div>
                                    <a href="" class="view-shop">Visit<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="shop-wrap">
                                <div class="shop-top-banner">
                                    <div class="shop-banner">
                                        <img src="{{ asset('frontend/images/home/shop-banner.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="shop-detail">
                                    <div class="shop-info-wrap">
                                        <div class="shop-logo">
                                            <img src="{{ asset('frontend/images/home/shoplogo3.png') }}" alt="seller logo">
                                        </div>
                                        <h3 class="shop-name">
                                            <a href="" class="seller-link">
                                                The STYLE TK
                                            </a>
                                        </h3>
                                        <h4 class="shop-categories">Handmade Accessories</h4>
                                    </div>
                                    <a href="" class="view-shop">Visit<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="shop-wrap">
                                <div class="shop-top-banner">
                                    <div class="shop-banner">
                                        <img src="{{ asset('frontend/images/home/shop-banner4.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="shop-detail">
                                    <div class="shop-info-wrap">
                                        <div class="shop-logo">
                                            <img src="{{ asset('frontend/images/home/shoplogo4.png') }}" alt="seller logo">
                                        </div>
                                        <h3 class="shop-name">
                                            <a href="" class="seller-link">
                                                Piseces Moon
                                            </a>
                                        </h3>
                                        <h4 class="shop-categories">Jewelry</h4>
                                    </div>
                                    <a href="" class="view-shop">Visit<i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </section>
    </div>
</main>
@endsection