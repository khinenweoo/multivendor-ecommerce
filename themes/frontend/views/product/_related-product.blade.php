    <!-- Similar Items Section -->
    <section class="similar_items">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-30" style="font-weight:600;font-family:'Hind Siliguri', sans-serif;color:#606975;margin:30px 0;">You May Also Like</h2>
            </div>
        </div>
        <div class="similar-prod-carousel" id="similarItemsCarousel">

        @if(count($product->rel_products) > 0)
            @foreach ($product->rel_products as $item)
            <!-- sigle product start -->
            <div class="single-product product-card">
                <div class="product-image">
                    <a href="{{route('product.detail', $item->product_slug)}}" class="prod-img">
                        <img src="{{ asset('storage/products/'.$item->product_image) }}" alt="">
                    </a>
                    <div class="prod-action">
                        <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                        <a href="{{route('product.detail', $item->product_slug)}}" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                        <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h3 class="product-name p-0">
                        <a class="" href="{{route('product.detail', $item->product_slug)}}">{{ucfirst($item->product_name)}}</a>
                    </h3>
                    <div class="product-brand ">
                        <p style="color:#ba8b33;" class="m-0"></p>
                    </div>
                    <div class="prodct-price my-2">
                        <span class="price"><strong>MMK {{ number_format($item->price, 2) }}</strong></span>
                    </div>
                    @php
                    
                        $item_shop = App\Models\Shop::where('seller_id', $item->seller_id)->first();

                    @endphp

                    @if($product->added_by == 'seller')
                    <div class="product-seller pb-3">
                        <i class="fa fa-home"></i>Store: {{$item_shop->shop_name}}<span></span>
                    </div>
                    @else
                    <div class="product-seller">
                    <i class="fa fa-home"></i>Store: Admin<span></span>
                    </div>
                    @endif
                </div>
            </div>
            <!-- single product end -->
            @endforeach
        @endif

     
        </div>
    </div>
    </section>
    <!-- End Similar Items Section -->
    <!-- Compatible Products Section -->
    <section class="compatible_products">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="sect-title">Compatible Products</h2>
                </div>
            </div>
            <div class="compatible-prod-carousel" id="compatibleProdCarousel">
                <div class="single-product product-card">
                    <div class="product-image">
                        <a href="" class="prod-img">
                            <img src="{{ asset('frontend/images/products/detail/cleaner1.jpg') }}" alt="">
                        </a>
                        <div class="prod-action">
                            <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                            <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">
                            <a href="">Polly Fill Medium Support Pillow</a>
                        </h3>
                        <div class="product-seller">
                            by<span>Darby Home Co</span>
                        </div>
                        <div class="product-desc" style="display: none"></div>
                        <div class="prodct-price">
                            <span class="price">8000 Ks</span>
                        </div>
                        <div class="reviewStarsWrapper">
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
                <div class="single-product product-card">
                    <div class="product-image">
                        <a href="" class="prod-img">
                            <img src="{{ asset('frontend/images/products/detail/cleaner2.jpg') }}" alt="">
                        </a>
                        <div class="prod-action">
                            <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                            <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3  class="product-name">
                            <a href="">Criss Pillow Cover & Insert</a>
                        </h3>
                        <div class="product-seller">
                            by<span>August Criss</span>
                        </div>
                        <div class="product-desc" style="display: none"></div>
                        <div class="prodct-price">
                            <span class="price">
                                8000 MMK
                            </span>
                        </div>
                        <div class="reviewStarsWrapper">
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
                <div class="single-product product-card">
                    <div class="product-image">
                        <a href="" class="prod-img">
                            <img src="{{ asset('frontend/images/products/detail/cleaner3.jpg') }}" alt="">
                        </a>
                        <div class="prod-action">
                            <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                            <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3  class="product-name">
                            <a href="">Wayfair Basis Square Throw Pillow</a>
                        </h3>
                        <div class="product-seller">
                            by<span>Wayfair Basis</span>
                        </div>
                        <div class="product-desc" style="display: none"></div>
                        <div class="prodct-price">
                            <span class="price">
                                6000 MMK
                            </span>
                        </div>
                        <div class="reviewStarsWrapper">
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
                <div class="single-product product-card">
                    <div class="product-image">
                        <a href="" class="prod-img">
                            <img src="{{ asset('frontend/images/products/detail/cleaner4.jpg') }}" alt="">
                        </a>
                        <div class="prod-action">
                            <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                            <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3  class="product-name">
                            <a href="">Hargreaves Corded Throw Pillow</a>
                        </h3>
                        <div class="product-seller">
                            by<span>Three Posts</span>
                        </div>
                        <div class="product-desc" style="display: none"></div>
                        <div class="prodct-price">
                            <span class="price">
                                12000 MMK
                            </span>
                        </div>
                        <div class="reviewStarsWrapper">
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
                <div class="single-product product-card">
                    <div class="product-image">
                        <a href="" class="prod-img">
                            <img src="{{ asset('frontend/images/products/detail/cleaner5.jpg') }}" alt="">
                        </a>
                        <div class="prod-action">
                            <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                            <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3  class="product-name">
                            <a href="">Ghyslain Square Pillow Cover</a>
                        </h3>
                        <div class="product-seller">
                            by<span>Ebern Designs</span>
                        </div>
                        <div class="product-desc" style="display: none"></div>
                        <div class="prodct-price">
                            <span class="price">
                                6000 MMK
                            </span>
                        </div>
                        <div class="reviewStarsWrapper">
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
                <div class="single-product product-card">
                    <div class="product-image">
                        <a href="" class="prod-img">
                            <img src="{{ asset('frontend/images/products/detail/cleaner6.jpg') }}" alt="">
                        </a>
                        <div class="prod-action">
                            <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                            <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                            <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="" class="product-vendor"></a>
                        <h3  class="product-name">
                            <a href="">Product 6</a>
                        </h3>
                        <div class="product-desc" style="display: none"></div>
                        <div class="prodct-price">
                            <span class="price">
                                9000 MMK
                            </span>
                        </div>
                        <div class="reviewStarsWrapper">
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


            </div>
        </div>
    </section>
    <!-- End Compatible Products Section -->