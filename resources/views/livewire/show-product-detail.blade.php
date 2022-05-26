<div>
<main class="product-detail-page">
    <!-- Product Detail -->
    <section class="product-detail" wire:ignore.self>
        <div class="container-fluid">
        <div class="row">
        <div class="toast-container d-block w-100">
                @if (session()->has('message'))
                            <div class="alert alert-success d-block" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('message') }}
                            </div>
                @endif
            </div>
        </div>
        <div class="row">
            <!--Product Image Column Start-->
            <div class="col-md-4 col-sm-12 col-xs-12">
            <!-- Main Image Column Start-->
            <div class="main-image-column" id="main-image">
                
                <!--Product Image Large-->   
                <div class="product-image" id="preview-enlarged">
                    <img id="product-image" class="product-cover img-fluid" src="{{ asset('storage/products/'.$product->product_image) }}">
                </div>
                <!-- End Product Image-->
                <!-- Product Carousel -->
                <!-- <div class="product-image-selector">
                    <div class="carousel thumbnail-slider"  id="thumbnail-slider">
                        <div class="thumbnail-item">
                            <div id="thumbnail-container" class="thumbnail-container">
                                <img class="d-block w-100" src="{{ asset('frontend/images/products/detail/pillow.jpg') }}" alt="1 slide">
                            </div>
                        </div>
                        <div class="thumbnail-item">
                            <div id="thumbnail-container" class="thumbnail-container">
                                <img class="d-block w-100" src="{{ asset('frontend/images/products/detail/pillow2.jpg') }}" alt="1 slide">
                            </div>
                        </div>
                        <div class="thumbnail-item">
                            <div id="thumbnail-container" class="thumbnail-container">
                                <img class="d-block w-100" src="{{ asset('frontend/images/products/detail/pillow3.jpg') }}" alt="1 slide">
                            </div>
                        </div>
                        <div class="thumbnail-item">
                            <div id="thumbnail-container" class="thumbnail-container">
                                <img class="d-block w-100" src="{{ asset('frontend/images/products/detail/pillow-black.jpg') }}" alt="1 slide">
                            </div>
                        </div>
                        <div class="thumbnail-item">
                            <div id="thumbnail-container" class="thumbnail-container">
                                <img class="d-block w-100" src="{{ asset('frontend/images/products/detail/pillow-blue.jpg') }}" alt="1 slide">
                            </div>
                        </div>
                        <div class="thumbnail-item">
                            <div id="thumbnail-container" class="thumbnail-container">
                                <img class="d-block w-100" src="{{ asset('frontend/images/products/detail/pillow-gray.jpg') }}" alt="1 slide">
                            </div>
                        </div>
                        <div class="thumbnail-item">
                            <div id="thumbnail-container" class="thumbnail-container">
                                <img class="d-block w-100" src="{{ asset('frontend/images/products/detail/pillow-white.jpg') }}" alt="1 slide">
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Product Carousel End-->
                <!-- Product Video -->
                @if($product->product_video != null )
                <div class="product-video-wrapper"></div>
    
                    <div class="product-video-wrapper">
                        <video controls preload="auto" width="200" height="160">
                        <source src="{{asset('storage/prod_videos')}}/{{$product->product_video}}" type='video/mp4'>
                        </video>
                    </div> 
                @endif
            </div>
            <!-- Main Image Column End-->
            </div>
            <!-- End Product Image Column -->
            <!-- Product Detail Column -->
            <div class="col-md-5 col-sm-12 col-xs-12 product-info-col">
                <div class="product-name">
                    <h1 class="heading">{{$product->product_name}}</h1>
                </div>
                <div class="product-reviews">
                    <div class="rating_stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    </div>
                    <span class="review_wrap">
                        <span itemprop="reviewCount">5</span> 
                    Reviews
                    </span>
                </div>
                @if ($product->discount > 0)
                <div class="product-price h5 has-discount"> 
                    <div class="current-price discounted">
                    <span class="discount-price">{{number_format($product->sale_price)}} MMK</span>
                    </div>
       
                    <div class="base-price-block">
                        <span class="base-price has-sale">{{number_format($product->price)}} MMK</span>
                    </div>      
                    <span class="PercentageOff PercentageOff--highlight">{{round($product->discount)}} % Off</span>
                </div>
                @else
                <div class="product-price h5 no-discount"> 
                    <div class="base-price-block">
                        <span class="base-price">{{number_format($product->price)}} MMK</span>
                    </div>      
                </div>
                @endif

              
                <div class="prod_attributes_select">
                    <div class="select-container">
                    @forelse($product->attributes as  $key => $attribute)
                        <div class="wrapper mb-3">
                           <label class="title-options" for="{{ $attribute->attr_name }}">
                                Select {{ $attribute->attr_name }}<span class="color-required">*</span>
                            </label>
                           <select wire:model="attributes.{{$key}}" name="attr_name[]" class="form-control select-inline"
                                   id="{{ $attribute->attr_name }}" required>
                              @forelse($attribute->attributeValues as $value)
                                 <option value="{{$attribute->attr_name.':'.$value->value }}">{{ $value->value }}</option>
                              @empty
                              @endforelse
                           </select>
                        </div>
                     @empty
                        <input type="hidden" name="select-inline">
                     @endforelse
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="quantity-wrapper">
                        <label for="quantity">Quantity</label>
                        <input min="1" class="form-control form-control-sm d-inline" placeholder="Quantity" id="quantity" name="quantity" type="number" value="1" wire:model="qty">
                        <a href="#" class="btn btn-increase" wire:click.prevent="increaseQuantity"></a>
                        <a href="#" class="btn btn-decrease"  wire:click.prevent="decreaseQuantity"></a>
                    </div> 
                    </div>
                </div>

                <div class="prod-add-to-cart">
                    <div class="add">
                    <a href="#" wire:click.prevent="addToCart({{$product->product_id}},'{{$product->product_name}}',{{$product->price}})" class="btn btn-primary add-cart-btn d-flex" style="align-items:center;"><i class="icon-basket-loaded"></i> Add to cart</a>
                    </div>
                        
                    <div class="wishlist">
                        <a class="wishlist-btn btn-product btn-primary btn" href="javascript:void(0)" data-id-wishlist="" data-id-product="1" data-id-product-attribute="4" title="Add to Wishlist">
                        <span class="leo-wishlist-bt-content">
                            <i class="icon-heart"></i>
                        </span>
                        </a>
                    </div>
                </div>
        
            
                <hr class="divider">

                <div class="product-availability">
                    <span class="label">Availability:</span>
                    <span class="prod-status">
                        {{$product->stock_status == 'instock' ? 'In Stock' : 'Out of Stock'}}
                    </span>
                </div>
                <div class="product-categories">
                    <span class="label">Category:</span>
                    <span class="category-default">
                        {{$product->category->name}}
                    </span>
                </div>
    
                <div class="product-share"> 
                    <div class="social-sharing">
                            <span>Share:</span>
                            <ul class="social-icons"> 
                                <li class="facebook icon-gray">
                                    <a href="#" class="" title="Share" target="_blank"><i class="icon-social-facebook"></i></a>
                                </li>
                                <li class="twitter icon-gray">
                                    <a href="#" class="" title="Tweet" target="_blank"><i class="icon-social-twitter"></i></a>
                                </li>
                                <li class="pinterest icon-gray">
                                    <a href="#" class="" title="Pinterest" target="_blank"><i class="icon-social-google"></i></a>
                                </li>
                            </ul>
                    </div> 
                </div>
            </div>
            <!-- End Product Detail Column -->
            <div class="col-md-3 col-sm-12">
                <div class="fixed-right-block">
                    <div class="action-inner">
                        <!-- <div class="ship-area">
                            <ul>
                               
                                <li>
                                    <div class="shipping-country_select">        
                                        <div class="select-container">
                                            <label for="country">Deliver to Country</label>
                                            <select aria-label="Choose country" name="estimated-shipping-country" id="estimated-shipping-country" class="shipping-country" >
                                                <optgroup label="Choose country">
                                                <option value="xl">Singapore</option>
                                                <option value="l">Malaysia</option>
                                                <option value="m">Indonesia</option>
                                                <option value="s">Japan</option>
                                                <option value="s">Canada</option>
                                                <option value="s">New Zealand</option>
                                                <option value="s">Poland</option>
                                                </optgroup>
                                            
                                            
                                            </select>
                                        </div>  
                                    </div>
                                </li>
                           
                                <li>
                                    <div class=" text-left">
                                        Ship From
                                        <span class="method">Myanmar</span>
                                    </div>
                                    
                                </li>
                                <li class="shipping-time">
                                    <span>
                                        Estimated Arrival
                                        <b>15</b> days
                                        <i class="fa fa-time"></i>
                                    </span>
                                </li>
                            </ul>
                        </div> -->
                        <a href="" class="btn action-btn start-order mx-auto">Start Order</a>
                        <a href="" class="btn action-btn contact-seller mx-auto"><i class="fa fa-envelope"></i> Contact Seller</a>
                        <a href="" class="btn action-btn call-us mx-auto"><i class="fa fa-phone"></i>Call Us</a>
                    </div>

                </div>

                <div class="company-card seller-card">
                    @php
                        $prod_shop = App\Models\Shop::where('seller_id', $product->seller_id)->first();
                    @endphp
                        <div class="card-logo">
                            <a href=""><i class="icon-diamond"></i> Seller</a>
                        </div>
                        @if($product->added_by == 'seller')
                        <div class="company-name-container">
                            <a href="" class="company-name">
                                {{$prod_shop->shop_name}}
                            </a>
                        </div>
                        <div class="join-year">
                            <span class="value">{{$prod_shop->created_at->diffForHumans()}}</span>
                            <!-- <span class="unit">Years</span> -->
                        </div>
                        @else
                        <div class="company-name-container">
                            <a href="" class="company-name">
                                {{$product->added_by}}
                            </a>
                        </div>
                        <div class="join-year">
                            <span class="value"></span>
                            <!-- <span class="unit">Years</span> -->
                        </div>
                        @endif
                        
                        <div class="card-info-item">
                            <table>
                                <tr class="response-time">
                                    <td>
                                        <b class="average-time">< 6h</b>
                                        <span>Response Time </span>
                                    </td>
                                </tr>
                                <tr class="on-time-shipment">
                                    <td>
                                        <span class="value">
                                           <b>95.8%</b> 
                                        </span>
                                        <span>On-time delivery rate</span>
                                    </td>
                                </tr>

                            </table>
                        </div>
              
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="detail-tabs">
                    <div class="detail-tabs-wrapper">
                        <div class="tab-main">
                            <ul class="nav nav-tabs">
                                <li class="nav-item active">
                                    <a href="#details" class="nav-link main-link" data-toggle="tab">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#seller-profile" class="nav-link main-link" data-toggle="tab">Seller Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#reviews" class="nav-link main-link" data-toggle="tab">Reviews <span class="reviews-count">(11)</span></a>
                                </li>
                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="details">
                                    <!-- Product Inner Tabs -->
                                    <div class="product-tabs">
                                        <ul class="nav nav-tabs">
                                           
                                            <li class="nav-item active">
                                            <a class="nav-link" href="#prod_details" data-toggle="tab">Details</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="#highlight" data-toggle="tab">Highlights</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#desc" data-toggle="tab">Description</a>
                                            </li>
                                           
                                            
                                        </ul>
                                        <div class="tab-content ">
                                            <div class="tab-pane active" id="prod_details">
                                                <p>
                                                <table class="table table-bordered basicInfo">
                                                            <tr>
                                                                <td class="field-title">
                                                                    SKU:
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        {{$product->sku}}
                                                                    </div>
                                                                </td>
                                                                <td class="field-title">
                                                                    Brand:
                                                                </td>
                                                                @if(empty($product->brand))
                                                                <td>
                                                                    None
                                                                </td>
                                                                @else
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        {{$product->brand->brand_name}}
                                                                    </div>
                                                                </td>
                                                                @endif
                                                     
                                                            </tr>
                                                            <tr>
                                                                <td class="field-title">
                                                                   Seller:
                                                                </td>
                                                               
                                                                <td class="field-content">
                                                                @if(isset($product->seller))
                                                                    <div class="content-value">
                                                                    {{$product->seller->name}}
                                                                    </div>
                                                                @endif
                                                                </td>
                                                                <td class="field-title">
                                                                    Weight:
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                     {{$product->weight}}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="field-title">
                                                                    Last Update:
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                    {{date_format($product->updated_at,'d M, Y')}}
                                                                    </div>
                                                                </td>
                                                                <td class="field-title">
                                                                    Packaging & Delivery:
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        <p>
                                                                        Selling Units: Single item<br>
                                                                        Single package size: 40X25X20 cm<br>
                                                                        Single gross weight: 2.5 lb.<br>
                                                                        Overall : 18'' H x 18'' W x 4'' D <br>
                                                                        
                                                                        </p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                             
                                                </table>
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="highlight">
                                                <p>
                                                   {{$product->short_description}}
                                                </p>
                                            </div>

                                            <div class="tab-pane" id="desc">
                                                <p>
                                                    Size:18 x 18 Inch / 45 x 45cm. Suitable for sofa,bed,home,office. Zipper is hidden. This pillow cover is very noble. Pillow inserts are included.
                                                    <h4>What's Included?</h4>
                                                    - Insert/ Cushion Pad
                                                    <h4>Product Details</h4>
                                                    <ul>
                                                        <li>Fill Material: Polyester/Polyfill</li>
                                                        <li> Closure Type: Zipper</li>
                                                        <li> Insert Included: Yes</li>
                                                    </ul>
                                                </p>
                                            </div>
                                    
                         
                                        </div>
                                    </div>
                                    <!-- End Product Inner Tabs -->
                                </div>
                                <div class="tab-pane" id="seller-profile">
                                     <!-- Product Inner Tabs -->
                                     <div class="seller-profile-tabs product-tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item active">
                                            <a class="nav-link" href="#overview" data-toggle="tab">Seller Overview</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#certificates" data-toggle="tab">Certifications</a>
                                            </li>
                                    
                                            <li class="nav-item"><a href="#trade" data-toggle="tab">Trade Capacities</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content ">
                                            <div class="tab-pane active" id="overview">
                                                <div class="content">
                                                    <h3>Company Overview</h3>
                                                    <div class="company-images">
                                                        <div class="image-box">
                                                        <img src="{{ asset('frontend/images/products/detail/cover.jpg') }}" alt="" class="seller-banner" >
                                                        </div>
                                                     
                                                    </div>
                                                    <div class="company-basicInfo-wrap">
                                                        <table class="table table-bordered basicInfo">
                                                            <tr>
                                                                <td class="field-title">
                                                                    Business Type
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        Manufacturer
                                                                    </div>
                                                                </td>
                                                                <td class="field-title">
                                                                    Year Established
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        2016
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="field-title">
                                                                    Main Products
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        Pillow sets, bed suite
                                                                    </div>
                                                                </td>
                                                                <td class="field-title">
                                                                    Product Certifications
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        CE
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="field-title">
                                                                    Certifications
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        <a href="">Business License</a>
                                                                    </div>
                                                                </td>
                                                                <td class="field-title">
                                                                    Trade Marks
                                                                </td>
                                                                <td class="field-content">
                                                                    <div class="content-value">
                                                                        BF
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                             
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="certificates">
                                                <div class="content">
                                                    <h3>Production Certification</h3>
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Picture</th>
                                                            <th scope="col">Certification Name</th>
                                                            <th scope="col">Issued By</th>
                                                            <th scope="col">Business Scope</th>
                                                            <th scope="col">Available Date</th>
                                                            <th scope="col">Verified</th>
                                                        </tr>
                                                        </thead>
                                                        <tr>
                                                            <td>
                                                            <img class="certi-image img-fluid" src="{{ asset('frontend/images/products/detail/certi1.jpg') }}" width="90">
                                                            </td>
                                                            <td>
                                                                CE
                                                            </td>
                                                            <td>BKC Testing Co.,Ltd</td>
                                                            <td>Sale and Service for Home appliances</td>
                                                            <td>2019-08-06 ~ 2039-08-06</td>
                                                            <td><i class="fa fa-check" aria-hidden="true" style="color:#ec5f35eb;"></i></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="content">
                                                    <h3>Certification</h3>
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Picture</th>
                                                            <th scope="col">Certification Name</th>
                                                            <th scope="col">Issued By</th>
                                                            <th scope="col">Business Scope</th>
                                                            <th scope="col">Available Date</th>
                                                            <th scope="col">Verified</th>
                                                        </tr>
                                                        </thead>
                                                        <tr>
                                                            <td>
                                                            <img class="certi-image img-fluid" src="{{ asset('frontend/images/products/detail/certi.jpg') }}" width="90" >
                                                            </td>
                                                            <td>
                                                            Business License
                                                            </td>
                                                            <td>Mark Regulation</td>
                                                            <td>Business License. Tax registration certificate.</td>
                                                            <td>2019-08-06 ~ 2039-08-06</td>
                                                            <td><i class="fa fa-check" aria-hidden="true" style="color:#ec5f35eb;"></i></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="content">
                                                    <h3>Trademarks</h3>
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Picture</th>
                                                            <th scope="col">Trademark No</th>
                                                            <th scope="col">Trademark Name</th>
                                                            <th scope="col">Trademark Category</th>
                                                            <th scope="col">Available Date</th>
                                                            <th scope="col">Verified</th>
                                                        </tr>
                                                        </thead>
                                                        <tr>
                                                            <td>
                                                            <img class="certi-image img-fluid" src="{{ asset('frontend/images/products/detail/certi.jpg') }}" width="90">
                                                            </td>
                                                            <td>
                                                                350723AE
                                                            </td>
                                                            <td>BF</td>
                                                            <td>Sale and Service for Home appliances</td>
                                                            <td>2019-08-06 ~ 2039-08-06</td>
                                                            <td><i class="fa fa-check" aria-hidden="true" style="color:#ec5f35eb;"></i></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="trade">
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <!-- End Product Inner Tabs -->
                                </div>
                                <div class="tab-pane" id="reviews" class="reviews">
                                    <!-- User Comment -->
                                    <div class="user-comment">
                                        <div class="review-wrapper">
                                            <!-- Review Header & rating stars-->
                                            <div class="review-header">
                                                <span class="reiview-header-byline">
                                                    <span>Great value for an awesome product</span>
                                                </span>
                                                <div class="rating d-flex">
                                                    <div class="star-content">
                                                        <div class="rating">
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-user ml-2">
                                                      by <span class="username">peter-mario</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Review Content -->
                                            <div class="review-content">
                                                <p class="review-content-body">
                                                    I love this stuff. I use it 3 times a day. It took me about 2 months to see the result, and others start notice change
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-comment">
                                        <div class="review-wrapper">
                                            <!-- Review Header & rating stars-->
                                            <div class="review-header">
                                                <span class="reiview-header-byline">
                                                    <span>large, light and good value</span>
                                                </span>
                                                <div class="rating d-flex">
                                                    <div class="star-content">
                                                        <div class="rating">
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                            <i class="fa fa-star filled"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-user ml-2">
                                                        by <span class="username">ashelle</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Review Content -->
                                            <div class="review-content">
                                                <p class="review-content-body">
                                                    Comes in very large volume. has a gel texture with small beads that dissolve on contact. very light and absorbs immediately but it effective.
                                                </p>
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
        </div>
    </section>
    <!-- End Product Detail -->
</main>
</div>
