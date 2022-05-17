@extends('layouts.app')

@section('content')
<div class="shop-page">
@include('store.navigation')
<div class="shop-main">
    <div class="container">
        <!-- Banner Section -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Store Cover Image Section -->
                <div class="shop-banner__section">
                    <div class="banner_wrapper">
                        <img src="{{ asset('frontend/images/store/store-cover.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Products Section -->
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-part pull-left">
      
                <div class="left-sidebar p-t-20">
                    <aside class="sidebar sidebar-offcanvas">
                        <section class="widget pt-1">
                            <div class="input-group form-group">
                                <input class="form-control" type="text" name="search" placeholder="Search..." value="">                 
                                <button class="input-group-btn" type="submit" name="ok"><i class="fa fa-search"></i></button>
                            </div>
                        </section>
                        <!-- Categories -->
                        <section class="widget widget-categories">
                                <h3 class="widget-title">Shop Categories</h3>
                                <ul>
                                    <li>
                                        <a href="">Accessories</a>
                                    </li> 
                                    <li>
                                        <a href="">Kitchen</a>
                                    </li> 
                                    <li>
                                        <a href="">Pots and Pans</a>
                                    </li> 
                                    <li>
                                        <a href="">Knifes</a>
                                    </li> 
                                    <li>
                                        <a href="">Blender</a>
                                    </li> 
                                </ul>
                        </section>
                        <!-- Brands -->
                        <section class="widget">
                            <h3 class="widget-title">Filter by Brand</h3>
                            <div class="">
                                <div class="icheckbox_flat-blue" style="position: relative;"><input class="" name="brand[]" value="nikon" type="checkbox" id="brand_12" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                                    <label class="" for="brand_12">Nikon&nbsp;<span class="text-muted">(2)</span>
                                    </label>
                            </div>
                            <div class="">
                                <div class="icheckbox_flat-blue" style="position: relative;"><input class="" name="brand[]" value="nikon" type="checkbox" id="brand_12" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                                    <label class="" for="brand_12">Sony&nbsp;<span class="text-muted">(2)</span>
                                    </label>
                            </div>
                            
                            
                            </section>
                    </aside>
                </div>

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 pull-right main-right-section">
                <div class="row profile-right-section-row">
                    <div class="col-md-12 profile-header">
                        <div class="row">
                            <div class="col-md-10 profile-header-content pull-left">
                                <h1></h1>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum reiciendis temporibus alias dolores, tempore ea vitae facilis in ab exercitationem eum dolorum nemo ipsum tempora amet iure nisi optio placeat
                                </p>
                            </div>
                            <div class="col-md-2">
                                <a href="" class="btn btn-primary btn-contact pull-right">
                                    <i class="fa fa-envelope-o"></i>
                                    Contact <span>Seller Name</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-xl-12 col-md-12 mb-20">
                        <div class="row shop-toolbar mb-2">
                            <div class="col-lg-7 col-md-6">
                                <div class="top-bar-left">
                                    <div class="product-filter-mode mr-70 mr-sm-0">
                                        <label for="" class="sortbar-label">Sortby</label>
                                       <div class="sortby-options">
                                           <div class="sortby-option">Popular</div>
                                           <div class="sortby-option">Last</div>
                                           <div class="sortby-option">Hot Deal</div>
                                       </div>
                                    </div>
                                           
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="top-bar-right">
                                    <div class="product-sort">
                                        <p>Sort By : </p>
                                        <select class="sorting-select" name="sortby" wire:model="sorting">
                                                    <option value="default" >Select Sort Option</option>
                                                    <option value="date">Sort by newest</option>
                                                    <option value="price">Price (Low &gt; High)</option>
                                                    <option value="price-dsc">Price (High &gt; Low)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Products Grid Section -->
                        <div class="shop-items">
                            <div class="prducts-grid" id="prods-grid">
                                <div class="row">
                                <!-- Single Product Start -->
                                    <div class="col-6 col-md-4 col-sm-4 col-xs-6 item">
                                        <div class="single-product product-card">
                                            <div class="product-image">
                                                <a href="" class="prod-img text-center">
                                                    <img src="{{ asset('frontend/images/store/catalog/p1.jpg') }}" alt="">
                                                </a>
                                                <div class="prod-action">
                                                    <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                    <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                    <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-name">
                                                    <a href="">Nikon SB-300 AF Speedlight</a>
                                                </h3>
                                                <div class="prodct-price">
                                                    <span class="price">49000 MMK</span>
                                                </div>
                                                <div class="product-seller">
                                                <i class="fa fa-home"></i> Store: <span>Best Buy </span>
                                                </div>                
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
                                    </div>
                                     <!-- End Single Product -->
                                <!-- Single Product Start -->
                                    <div class="col-6 col-md-4 col-sm-4 col-xs-6 item">
                                        <div class="single-product product-card">
                                            <div class="product-image">
                                                <a href="" class="prod-img text-center">
                                                    <img src="{{ asset('frontend/images/store/catalog/p2.jpg') }}" alt="">
                                                </a>
                                                <div class="prod-action">
                                                    <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                    <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                    <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-name">
                                                    <a href="">Classic Stovetop Whistling Kettle</a>
                                                </h3>
                                                <div class="prodct-price">
                                                    <span class="price">30000 MMK</span>
                                                </div>
                                                <div class="product-seller">
                                                <i class="fa fa-home"></i> Store: <span>Best Buy </span>
                                                </div>                
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
                                    </div>
                                     <!-- End Single Product -->
                                <!-- Single Product Start -->
                                    <div class="col-6 col-md-4 col-sm-4 col-xs-6 item">
                                        <div class="single-product product-card">
                                            <div class="product-image">
                                                <a href="" class="prod-img text-center">
                                                    <img src="{{ asset('frontend/images/store/catalog/p3.jpg') }}" alt="">
                                                </a>
                                                <div class="prod-action">
                                                    <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                    <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                                    <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3 class="product-name">
                                                    <a href="">Quick Speed Toaster</a>
                                                </h3>
                                                <div class="prodct-price">
                                                    <span class="price">19000 MMK</span>
                                                </div>
                                                <div class="product-seller">
                                                <i class="fa fa-home"></i> Store: <span>Best Buy </span>
                                                </div>                
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
                                    </div>
                                     <!-- End Single Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

@endsection