@extends('layouts.app')

@section('content')
<div id="main-content" class="category-page main-content">

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
                                 <a href="permal-link">Item List</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Breadcrumbs -->
     
     <!-- page content -->
     <div class="page-contain">
         <div class="container-fluid">
             <div class="row">
                <!-- Left Sidebar -->
                <aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="mobile-panels" style="display: none;">
                        <span class="current-panel-title">Sidebar</span>
                        <a class="close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                    </div>
                    <div class="sidebar-contain">
                        <div class="widget filter">
                            <h4 class="wgt-title"><span>Categories</span></h4>
                            <div class="wgt-content">
                                <ul class="sidebar_categories">
                                    <li class="lvl1 sub-level">
                                        <a href="#" class="cat-link">Grocery</a>
                                       <ul class="sublinks">
                                            <li class="level2">
                                                <a href="#" class="sub-category">Dairy, Eggs & Cheese</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Canned Goods & Soups</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Meat & Seafood</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Cookies, Snacks & Candy</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Frozen Food</a>
                                            </li>
                                       </ul>
                                    </li>
                                    <li class="lvl1 sub-level">
                                        <a href="#" class="cat-link">Beverage</a>
                                        <ul class="sublinks">
                                            <li class="level2">
                                                <a href="#" class="sub-category">Milk</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Coffee</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Fruit Juice</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Energy Drinks</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Health Drinks</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="lvl1 sub-level">
                                        <a href="#" class="cat-link">Beers & Wines</a>
                                        <ul class="sublinks">
                                            <li class="level2">
                                                <a href="#" class="sub-category">Beers</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Wine</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="lvl1 sub-level">
                                        <a href="#" class="cat-link">Health Care</a>
                                        <ul class="sublinks">
                                            <li class="level2">
                                                <a href="#" class="sub-category">Facial Care</a>
                                            </li>
                                            <li class="level2">
                                                <a href="#" class="sub-category">Body Care</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="lvl1"><a href="#" class="cat-link">Beauty</a></li>
                                    <li class="lvl1"><a href="#" class="cat-link">Cleaning Supplies</a></li>
                                    <li class="lvl1"><a href="#" class="cat-link">Fruits & Vegetables</a></li>
                                    <li class="lvl1"><a href="#" class="cat-link">Clothing</a></li>
                                    <li class="lvl1"><a href="#" class="cat-link">Furniture</a></li>
                                    <li class="lvl1"><a href="#" class="cat-link">Household Supplies</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget filter" id="filter-selectors">
                            <h2 class="sidebar-title" style="position: relative;">
                                <div class="dokan-icons">
                                    <div class="dokan-icon-div"></div>
                                    <div class="dokan-icon-div"></div>
                                    <div class="dokan-icon-div"></div>
                                </div>Filter
                             </h2>
                            <h4 class="wgt-title"><span>Top Brands</span></h4>
                            <div class="wgt-content">
                                <ul class="check-list multiple">
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="input_brand">
                                        </span>
                                        <a href="#" class="check-link">CHIC</a>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="input_brand">
                                        </span>
                                        <a href="#" class="checkbox-content">Mari_wear</a>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="input_brand">
                                        </span>
                                        <a href="#" class="checkbox-content">Zara</a>
                                    </li>
                        
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="input_brand">
                                        </span>
                                        <a href="#" class="checkbox-content">Razer</a>
                                    </li>
                                
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="input_brand">
                                        </span>
                                        <a href="#" class="checkbox-content">Chi Khin</a>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="input_brand">
                                        </span>
                                        <a href="#" class="checkbox-content">Inn Cotton</a>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="input_brand">
                                        </span>
                                        <a href="#" class="checkbox-content">Garment by BBG</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <h4 class="wgt-title"><span>Top Manufacturers</span></h4>
                            <div class="wgt-content">
                                <ul class="check-list multiple">
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="" class="input_seller">
                                        </span>
                                        <label class="checkbox-content">GATSBY</label>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="" class="input_seller">
                                        </span>
                                        <label class="checkbox-content">Kracie</label>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="" class="input_seller">
                                        </span>
                                        <label href="#" class="checkbox-content">SHISEIDO</label>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="" class="input_seller">
                                        </span>
                                        <label href="#" class="checkbox-content">Kanebo</label>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="" class="input_seller">
                                        </span>
                                        <label href="#" class="ccheckbox-content">ROHTO</label>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="" class="input_seller">
                                        </span>
                                        <label href="#" class="checkbox-content">DHC</label>
                                    </li>
                                    <li class="check-list-item">
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="" class="input_seller">
                                        </span>
                                        <label href="#" class="checkbox-content">Nature Republic</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="filterbtn-wrap">
                                <button class="filter-btn">Filter</button>
                                <button class="clear-btn">Clear</button>
                            </div>
                        </div>

                        <div class="widget filter">
                            <h4 class="wgt-title">Sales & Events</h4>
                            <div class="wgt-content">
                                <ul class="wgt-sales">
                                    <li class="sale-link"><a href="" class="sale-link">Sales & Events</a></li>
                                    <li class="sale-link"><a href="" class="sale-link">Deals</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget filter">
                            <h4 class="wgt-title">Sell On Prod of Myanmar</h4>
                            <div class="wgt-content">
                                <ul class="wgt-sell">
                                    <li><a href="#" class="sell-link">Sell Direct</a></li>
                                    <li><a href="#" class="sell-link">Become Our Partner</a></li>
                                    <li><a href="#" class="sell-link">How to Sell</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </aside>
                <!-- End Left Sidebar -->
                <!-- main content -->
                 <div class="main-column col-lg-9 col-md-8 col-sm-12 col-xs-12">
                     <div class="product-category grid-style">
                         <!-- Top Filter Area -->
                         <div class="top-functions-area">
                            <div class="filter-item toleft">
                                <div class="wrap-selectors">
                                    <div class="selector-item radio-selector">
                                        <form action="" method="get" class="filterprods">
                                            <div class="radiobox">
                                                <input type="checkbox" name="newarrival" class="input_check">
                                                <label for="newarrival">New Arrival</label>
                                            </div>
                                            <div class="radiobox">
                                                <input type="checkbox" class="input_check" onclick="gosearch()" name="discount">
                                                <label for="discount">Discount</label>
                                            </div>
                                            <div class="radiobox">
                                                <input type="checkbox" name="instock" class="input_check">
                                                <label for="instock">Instock</label>
                                            </div>
                                            <div class="radiobox">
                                                <input type="checkbox" name="hotdeal" class="input_check">
                                                <label for="hotdeal">Hot Deal</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-item toright">
                                <span class="filter-title">Sort by</span>
                                <div class="wrap-selectors">
                                    <!-- sorting -->
                                    <div class="selector-item orderby-selector">
                                        <select name="orderby" class="orderby" aria-label="Shop order">
                                            <option value="product-sort" selected="selected">Default sorting</option>
                                            <option value="rating">average rating</option>
                                            <option value="date">newest</option>
                                            <option value="price">From lowest price</option>
                                            <option value="price-desc">From highest price</option>
                                        </select>
    
                                    </div>
                                    <!-- desktop view sort -->
                                    
                                </div>
                            </div>
                         </div>
                         <!-- Product List -->
                         
                        <div class="prducts-grid" id="cat-grid-style">
                            <div class="row">
                               
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p1.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Personalized Makeup Bag</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Custom Divatee </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">8,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p2.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Sterlin Silver Necklace</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Your Minimalist </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">40,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p3.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Wooden Board with Engravine</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Wunderwutch </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">23,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p4.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Personalized Gift for Women</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Wunderwutch </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">30,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p5.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Birthday Gift, spa gift</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Little Flower Spa Co </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">23,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p6.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Birthday Gift, spa gift</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Little Flower Spa Co </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">23,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p7.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Custom Name Ring</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Flawless Art Shop </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">23,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                                <div class="col-6 col-lg-3 col-md-4 col-sm-4 col-xs-6 item">
                                    <!-- Single Product Start -->
                                    <div class="single-product product-card">
                                        <div class="product-image">
                                            <a href="" class="prod-img">
                                                <img src="{{ asset('frontend/images/home/p8.jpg') }}" alt="">
                                            </a>
                                            <div class="prod-action">
                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-name">
                                                <a href="">Mama Shirt</a>
                                            </h3>
                                            <div class="product-seller">
                                                by <span> Flawless Art shop </span>
                                            </div>
                                            <div class="product-desc" style="display: none"></div>
                                            <div class="prodct-price">
                                                <span class="price">23,000 Ks</span>
                                            </div>
                                            <div class="reviewStarsWrapper text-left">
                                                <div class="rating_stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                </div>
                              
                            </div>
                         </div>
                         <!-- Pagination -->
                         <div class="panigations-block">
                            <ul class="panigation-contain">
                                <li><a href="#" class="link-page previous"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                <li><a class="link-page current-page">1</a></li>
                                <li><a href="#" class="link-page">2</a></li>
                                <li><a href="#" class="link-page">3</a></li>
                                <li><a href="#" class="link-page">4</a></li>
                                <li><a href="#" class="link-page">20</a></li>
                                <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                     </div>  
                 </div>
             </div>
         </div>
     </div>
</div>

@endsection