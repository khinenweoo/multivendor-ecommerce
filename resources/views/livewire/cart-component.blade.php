<div>  
    <div id="main-content" class="main-content shopping-cart-page">
        @if(Cart::count() > 0)
        <div class="container">
            <!--Cart Table-->
                    <div class="shopping-cart-container py-5">
                        <div class="row">
                            <!-- Cart Column -->
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <h3 class="title"><i class="icon-basket"></i> Your cart</h3>
                    
                                    <!-- Item single row desktop -->
                                    @if (session()->has('message'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('message') }}
                                    </div>
                                    @endif
                                @forelse (Cart::content() as $item)
                                    <div class="line-item is-desktop d-flex mb-3">
                                        <div class="column d-flex pr-0">
                                            <div class="prod_thumbnail">
                                                <a class="prod-thumb mr-4" href="#">
                                                    <figure><img width="90" height="90" src="{{ asset('storage/products/'.$item->model->product_image) }}" alt="{{$item->product_name}}"></figure>
                                                </a>
                                            </div>
                                            <div class="product_meta">
                                                <div class="prod-brand">
                                                    <a href="#"></a>
                                                </div>
                                                <div class="prod-name">
                                                    <a href="{{ route('product.detail', ['product_slug'=>$item->model->product_slug]) }}">{{$item->model->product_name}}</a>
                                                </div>  
                                                <div class="has-attribute prod-attribute">
                                                    @php
                                                        $attr_list = $item->options->attr;
                                                    @endphp

                                                @if($attr_list !== null)
                                                    @forelse($attr_list as $attrvalue)
                                                    <span class="attr-name"></span><span class="attr-value">{{ $attrvalue }}</span><br>
                                                    @empty
                                                    @endforelse
                                                @endif
                                                    <!-- <span class="attr-name">Size & Embroidery:</span><span class="attr-value">BEACH size WITH name</span> -->
                                                </div>
                                                <div class="price-container my-2">
                                                    <span class="current-price"><strong>Ks {{$item->model->price}}</strong></span>
                                                </div>
                                        </div>
                                        </div>
                                        <div class="column is-narrow quantity-wrap">
                                            <a class="btn btn-sm qtyBtn" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')" ><i class="fa fa-fw fa-minus"></i></a>
                                            <input class="qty-input qty" type="text" id="qty" value="{{$item->qty}}" data-max="120" pattern="[0-9]*">
                                            <a class="btn btn-sm qtyBtn" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fa fa-fw fa-plus"></i></a>
                                        </div>

                                        <div class="column is-narrow line-item-total">
                                            <div class="px3 text-center total-price"><strong>Ks {{$item->subtotal}}</strong></div>
                                        </div>
                                        
                                        <div class="column is-narrow line-item-action">
                                            <form action="">
                                                <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="remove" title="remove from your cart"><i class="fa fa-trash-o btn-outline-danger" aria-hidden="true"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Item single row desktop end -->

                                    <!-- Item row mobile view -->
                                    <div class="line-item is-mobile d-flex my-4">
                                        <div class="column-mobile prod_thumbnail">
                                            <a class="prd-thumb" href="#">
                                            <figure><img width="90" height="90" src="{{ asset('storage/products/'.$item->model->product_image) }}" alt="{{$item->product_name}}"></figure>
                                            </a>
                                            
                                          
                                        </div>
                                        <div class="column-mobile cart_content ml-4" style="width:100%;">
                                            <div class="product_meta mb-3">
                                                <div  class="d-flex"  style="justify-content:space-between;">
                                                    <a class="prod-brand" href="#">Happy Skin</a>
                                                    <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="remove" title="remove from your cart"><i class="fa fa-trash-o btn-outline-danger" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="prod-name">
                                                <a href="{{ route('product.detail', ['product_slug'=>$item->model->product_slug]) }}">{{$item->model->product_name}}</a>
                                                </div>  
                                                <div class="has-attribute prod-attribute">
                                                    @php
                                                        $attr_list = $item->options->attr;
                                                    @endphp

                                                @if($attr_list !== null)
                                                    @forelse($attr_list as $attrvalue)
                                                    <span class="attr-name"></span><span class="attr-value">{{ $attrvalue }}</span><br>
                                                    @empty
                                                    @endforelse
                                                @endif
                                                </div>
                                            </div>

                                            <div class="quantity-wrap my-2 clearfix">
                                                <a class="btn btn-sm qtyBtn" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')" ><i class="fa fa-fw fa-minus"></i></a>
                                                <input class="qty-input qty" type="text" id="qty" value="{{$item->qty}}" data-max="120" pattern="[0-9]*">
                                                <a class="btn btn-sm qtyBtn" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fa fa-fw fa-plus"></i></a>
                                            </div>
                                            <div class="item-total-wrap d-flex my-3" style="justify-content:space-between;">
                                                <span class="current-price"><strong>Ks {{$item->model->price}}</strong></span>
                                                <span class="total-price"><strong>Ks {{$item->subtotal}}</strong></span>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Item row mobile view  end -->
                                    @empty
                                        <p class="my-5"><h5 style="color:#606975;text-align:center;">You have no items in your shopping cart</h5></p>
                                    @endforelse

                                    @if(Cart::count() > 0)
                                    <div class="shopping-cart-footer d-flex" style="justify-content:space-between;">
                                        <a href="{{ route('shop.products')}}" class="btn btn-sm btn-outline-secondary back-to-shop" style="border-radius:18px;text-transform:uppercase;"><i class="icon-arrow-left" style="font-size:12px;"></i>Back To Shopping</a>
                                        <a class="btn btn-sm btn-outline-danger btn-clear" wire:click.prevent="destroyAll()" style="border-radius:18px;text-transform:uppercase;">clear all</a>
                                    </div>
                                    @else
                                    <div class="shopping-cart-footer d-flex" style="justify-content:center;">
                                        <a href="{{ route('shop.products')}}" class="btn btn-sm btn-outline-secondary back-to-shop" style="border-radius:18px;text-transform:uppercase;"><i class="icon-arrow-left" style="font-size:12px;"></i>Back To Shopping</a>
                                   </div>
                                    @endif
                            </div>
                            <!-- Order Column -->
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="cart-subtotal-block">	
                                    <div class="row border-bottom pb-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Order Subtotal</span>
                                        <span class="col-12 col-sm-6 text-right"><span class="subtotal">Ks {{number_format(Cart::subtotal())}}</span></span>
                                    </div>
                                    @if(Session::has('coupon'))
                                    <div class="row pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Discount ({{Session::get('coupon')['code']}})</span>
                                        <span class="col-12 col-sm-6 text-right tax-price">- Ks {{number_format($discount)}}</span>
                                    </div>
                                    <div class="row pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal with Discount</span>
                                        <span class="col-12 col-sm-6 text-right tax-price">Ks {{number_format($subtotalAfterDiscount)}}</span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__tax-title">Tax ({{config('cart.tax')}}) %</span>
                                        <span class="col-12 col-sm-6 text-right tax-price">Ks{{number_format($taxAfterDiscount)}}</span>
                                    </div>
                                    <div class="row pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Order Total</strong></span>
                                        <span class="col-12 col-sm-6 cart__subtotal-title ordertotal text-right"><strong>Ks {{number_format($totalAfterDiscount)}}</strong></span>
                                    </div>
                                    @else
                                    <div class="row pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__tax-title">Tax</span>
                                        <span class="col-12 col-sm-6 text-right tax-price">Ks {{number_format(Cart::tax())}}</span>
                                    </div>
                                    <div class="row border-bottom pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title">Shipping Fee</span>
                                        <span class="col-12 col-sm-6 text-right">Free shipping</span>
                                    </div>
                                    <div class="row pb-2 pt-2">
                                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Order Total</strong></span>
    
                                        <span class="col-12 col-sm-6 cart__subtotal-title ordertotal text-right"><strong>Ks {{number_format(Cart::total())}}</strong></span>
                                    </div>
                                    @endif

                                @if(!Session::has('coupon'))
                                    <div class="coupon-box">
                                        <div id="coupon-link">
                                            <input type="checkbox" wire:model="haveCouponCode" value="1" class="mx-2" name="have-code" id="have-code">
                                            Have a coupon code?
                                        </div>
                                        @if($haveCouponCode == 1)
                                        <form id="coupon-form" wire:submit.prevent="applyCouponCode" class="coupon" style="">
                                            @if (session()->has('coupon_message'))
                                                <div class="alert alert-danger" role="danger">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                {{ session('coupon_message') }}
                                                </div>
                                            @endif
                                            <input type="text" wire:model="couponCode" placeholder="Enter Coupon Code" id="code" >
                                            <button type="submit">Apply</button>
                                        </form>
                                        @endif
                                    </div>
                                @endif
                                    <!-- <div class="cart__shipping py-2">Shipping &amp; taxes calculated at checkout</div> -->
                                    @auth
                                    <a href="#" wire:click.prevent="checkout" class="btn btn-checkout d-flex" style="align-items:center;justify-content:center;">Proceed To Checkout</a>
                                    @else
                                    <a href="#" wire:click.prevent="registerAccount" class="btn btn-checkout d-flex" style="align-items:center;justify-content:center;">Proceed To Checkout</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Cart Table -->
        </div>
        @else
        <div class="container">
            <div class="shopping-cart-container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1>Your cart is empty!</h1>
                            <p>Add items to shopping cart.</p>
                            <a href="" class="btn btn-success">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
    </div><!-- main content end -->
</div>
