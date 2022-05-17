<div>
    <div class="container-wrap">
        <section class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 co-sm-12">
                        <div class="home_header">
                            <div class="hero_slider" data-autoplay="true" wire:ignore>
                                <!--.hero-slide-->
                                <div class="hero-slide">

                                    <!-- <img alt="Banner Slide" class="img-responsive cover" src="{{ asset('frontend/images/home/slide1.jpg') }}"> -->
                                    <div class="row">
                                    <div class="slide-content text-left col-md-4 col-sm-12">
                                        <span class="slide-text">
                                        Create & Sell
                                        </span>
                                        <h1 class="slide-title mb-3">Custom Products Online<br>
                                        <span style="text-transform:uppercase;"></span>
                                        <br/> <h5 class="sale-text">Only for<span >48</span> hours</h5>
                                        </h1>  

                                        <div class="slidebtn-wrap pt-3">
                                        <a class="slide-btn btn" href="#" tabindex="0">Shop Now <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="slide-image col-md-6 col-sm-12">
                                        <img alt="Banner Image" class="img-responsive" src="{{ asset('frontend/images/home/banner-photo.png') }}">
                                    </div>
                                    </div>
                                </div>
                                <!--.hero-slide-->
                                
                                <!--.hero-slide-->
                                <div class="hero-slide">
                                    <!-- <img alt="Banner Image" class="img-responsive cover" src="{{ asset('frontend/images/home/') }}"> -->
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
                                    <div class="slide-image col-md-6 col-sm-12">
                                        <img alt="Banner Image" class="img-responsive" src="{{ asset('frontend/images/home/banner-photo2.png') }}">
                                    </div>
                                </div>
                                <!--.hero-slide-->
                                <div class="hero-slide">
                                    <!-- <img alt="Banner Image" class="img-responsive" src="{{ asset('frontend/images/home/slide-4.jpg') }}"> -->
                                    <div class="slide-content text-left col-lg-4">
                                        <span class="slide-text">
                                            High Definition
                                        </span>
                                        <h1 class="slide-title mb-3">Custom Men's <br>
                                        <span style="text-transform:uppercase;">Running Shoes</span>
                                        <br/> <h5 class="sale-text">Sale up to <span >30% Off</span></h5>
                                        </h1>   
                                        <div class="slidebtn-wrap pt-3">
                                            <a class="slide-btn btn" href="#">Shop Now <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="slide-image col-md-6 col-sm-12">
                                        <img alt="Banner Image" class="img-responsive" src="{{ asset('frontend/images/home/banner-photo3.png') }}">
                                    </div>
                                </div>
                            </div><!--.hero-->
                        </div>
                    </div>
                    <div class="col-4 col-lg-4 d-none d-lg-block d-xl-block">
                        <div class="column_wrap">
                            <div class="side_ads">
                                <img alt="Banner Image" class="img-responsive" src="{{ asset('frontend/images/home/side-ad-banner.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="category-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cat-wrap">
                            <div class="sect-header">
                                <h2> Featured Categories</h2>
                            </div>
                            <div class="row categories-row mt-3">
                                @foreach($featured_categories as $category)
                                <div class="col-6 col-xl-2 col-lg-2 col-md-3 col-sm-4 cat-col">
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
                </div>
            </div>
        </section>
        <!-- Products section Start -->
        <section class="product-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <div class="product-container">
                        <ul class="nav nav-pills box-top">
                            <li class="nav-item" >
                            <a class="nav-link active show" href="#new_arrivals" data-toggle="tab" aria-expanded="false">New Arrivals</a>
                            </li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#best_seller" data-toggle="tab">Best Seller</a></li> -->
                            <li class="nav-item"><a class="nav-link" href="#most_popular" data-toggle="tab">Most Popular</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recommended" data-toggle="tab">Recommended</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- single tab pane -->
                            <div class="tab-pane active show" id="new_arrivals">
                                <div class="new-arrivals product-wrap" id="">
                                    <div class="row">
                                       
                                        @foreach ($new_products as $nproduct)
                                        <div class="col-6 col-xl-2 col-lg-2 col-md-3 item">
                                            <div class="single-product product-card">
                                                        <div class="product-image">
                                                            <a href="{{route('product.detail', $nproduct->product_slug)}}" class="prod-img">
                                                                <img src="{{ asset('storage/products/'.$nproduct->product_image) }}" alt="">
                                                            </a>
                                                            <div class="prod-action">
                                                                <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                                <!-- <a href="{{route('product.detail', $nproduct->product_slug)}}" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a> -->
                                                                <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="product-name">
                                                                <a href="{{route('product.detail', $nproduct->product_slug)}}">{{ $nproduct->product_name }}</a>
                                                            </h3>
                                                            <div class="product-price">
                                                                <span class="price">MMK {{ $nproduct->price }}</span>
                                                            </div>
                                                            @php
                                                                $prod_shop = App\Models\Shop::findOrFail($nproduct->seller_id);
                                                               
                                                            @endphp
                                                         
                                                            @if($nproduct->added_by == 'seller')
                                                            <div class="product-seller pb-3">
                                                                <i class="fa fa-home"></i>Store: <span>{{$nproduct->seller->name}}</span>
                                                            </div>
                                                            @else
                                                            <div class="product-seller">
                                                            <i class="fa fa-home"></i>Store: <span>Admin</span>
                                                            </div>
                                                            @endif
                                                            <div class="addtocart-button rounded transition-colors">
                                                                <a href="#"  wire:click.prevent="addtocart({{$nproduct->product_id}},'{{$nproduct->product_name}}',{{$nproduct->price}})" class="add-to-cart action-btn d-flex text-xs md:text-sm text-dark" style="justify-content:center;align-items:center;" aria-label="Add To Cart"><i class="fa fa-shopping-bag px-2"></i> Add</a>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        @endforeach   
                                   
                                    </div>
                                </div>
                            </div>
                            <!-- single tab pane -->
                            <!-- <div class="tab-pane" id="best_seller">
                                Best Seller Products
                            </div> -->
                            <div class="tab-pane" id="most_popular">
                                <div class="product-wrap" id="trending">
                                    <div class="row">
                                        @foreach ($trending_products as $tproduct)
                                        <div class="col-6 col-xl-2 col-lg-2 col-md-3 item">
                                            <div class="single-product product-card">
                                                        <div class="product-image">
                                                            <a href="{{route('product.detail', $tproduct->product_slug)}}" class="prod-img">
                                                                <img src="{{ asset('storage/products/'.$tproduct->product_image) }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="product-name">
                                                                <a href="{{route('product.detail', $tproduct->product_slug)}}">{{ $tproduct->product_name }}</a>
                                                            </h3>
                                                            <div class="product-price">
                                                                <span class="price">MMK {{ $tproduct->price }}</span>
                                                            </div>
                                                            @php
                                                                $prod_shop = App\Models\Shop::where('seller_id', $tproduct->seller_id)->first();
                                                            @endphp
                                                            @if($nproduct->added_by == 'seller')
                                                            <div class="product-seller pb-3">
                                                                <i class="fa fa-home"></i>Store: <span>{{$tproduct->seller->name}}</span>
                                                            </div>
                                                            @else
                                                            <div class="product-seller">
                                                            <i class="fa fa-home"></i>Store: <span>Admin</span>
                                                            </div>
                                                            @endif
                                                            <div class="addtocart-button rounded transition-colors">
                                                                <a href="#"  wire:click.prevent="addtocart({{$tproduct->product_id}},'{{$tproduct->product_name}}',{{$tproduct->price}})" class="add-to-cart action-btn d-flex text-xs md:text-sm text-dark" style="justify-content:center;align-items:center;" aria-label="Add To Cart"><i class="fa fa-shopping-bag px-2"></i> Add</a>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        @endforeach   
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="recommended">
                                <div class="product-wrap">
                                    <div class="row">
                                        @foreach ($recommend_products as $rcproduct)
                                            <div class="col-6 col-xl-2 col-lg-2 col-md-3 item">
                                                <div class="single-product product-card">
                                                            <div class="product-image">
                                                                <a href="{{route('product.detail', $rcproduct->product_slug)}}" class="prod-img">
                                                                    <img src="{{ asset('storage/products/'.$rcproduct->product_image) }}" alt="">
                                                                </a>
                                                                <div class="prod-action">
                                                                    <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                                                    <!-- <a href="{{route('product.detail', $nproduct->product_slug)}}" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a> -->
                                                                    <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h3 class="product-name">
                                                                    <a href="{{route('product.detail', $rcproduct->product_slug)}}">{{ $rcproduct->product_name }}</a>
                                                                </h3>
                                                                <div class="product-price">
                                                                    <span class="price">MMK {{ $rcproduct->price }}</span>
                                                                </div>
                                                                @php
                                                                    $prod_shop = App\Models\Shop::where('seller_id', $rcproduct->seller_id)->first();
                                                                @endphp
                                                                @if($rcproduct->added_by == 'seller')
                                                                <div class="product-seller pb-3">
                                                                    <i class="fa fa-home"></i>Store: <span>{{$prod_shop->shop_name}}</span>
                                                                </div>
                                                                @else
                                                                <div class="product-seller">
                                                                <i class="fa fa-home"></i>Store: <span>Admin</span>
                                                                </div>
                                                                @endif
                                                                <div class="addtocart-button rounded transition-colors">
                                                                    <a href="#"  wire:click.prevent="addtocart({{$rcproduct->product_id}},'{{$rcproduct->product_name}}',{{$rcproduct->price}})" class="add-to-cart action-btn d-flex text-xs md:text-sm text-dark" style="justify-content:center;align-items:center;" aria-label="Add To Cart"><i class="fa fa-shopping-bag px-2"></i> Add</a>
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
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Shop Section Start -->
        <section class="vendor-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="vendors_block">
                            <div class="box-slider-top">
                                <div class="block-title">
                                    <h3>Weekly Top Vendors</h3>
                                </div>
                            </div>
                            <div class="box-slider-bottom">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                        @if($featured_stores->count() > 0 )
                                        <div class="vendor-slider" id="vendor-slider" wire:ignore>
                                            @foreach($featured_stores as $store)
                                            <div class="shop-wrap">
                                                <div class="shop-top-banner">
                                                    <div class="shop-banner">
                                                        <img src="{{ asset('storage/shop_banners/'.$store->banner) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="shop-detail">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 column">
                                                            <div class="shop-info-wrap">
                                                                <div class="shop-logo">
                                                                    <img src="{{ asset('storage/shop_logos/'.$store->logo_image) }}" alt="shop logo">
                                                                </div>
                                                                <h3 class="shop-name">
                                                                    <a href="{{route('vendor-shop.home', ['shop_slug'=>$store->shop_slug])}}" class="seller-link">
                                                                    {{$store->shop_name}}
                                                                    </a>
                                                                </h3>
                                                                <!-- <h4 class="shop-categories">{{$store->main_categories}}</h4> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 column">
                                                        <a href="{{route('vendor-shop.home', ['shop_slug'=>$store->shop_slug])}}" class="view-shop">View <i class="fa fa-caret-right" aria-hidden="true"></i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                        <div class="adv_block">
                                            <img src="{{ asset('frontend/images/home/ads-side.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shop Section -->

        <!-- Blog Section Start -->
        <section class="blog-section">
            <div class="blog-wrap">
                <div class="container">
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
                                            <img height="270" src="{{ asset('frontend/images/home/blog1.jpg') }}" alt="blog post image">
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
                                            <img height="270" src="{{ asset('frontend/images/home/blog3.jpg') }}" alt="blog post image">
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
                                            <img height="270" src="{{ asset('frontend/images/home/blog4.jpg') }}" alt="blog post image">
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
                                            <img height="270" src="{{ asset('frontend/images/home/blog6.jpg') }}" alt="blog post image">
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
                        <div class="totals">
                            <div class="subtotal">
                                <span class="label">Subtotal:</span> <span class="amount"> {{Cart::subtotal()}}</span>
                            </div>
                        </div>

            @else
                <p class="my-5"><h5 style="color:#606975;text-align:center;">No item in your cart</h5></p>
                <div class="totals">
                            <div class="subtotal">
                                <span class="label">Subtotal:</span> <span class="amount"> {{Cart::subtotal()}}</span>
                            </div>
                </div>
            @endif
            </ul>

          <div class="action-buttons">
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