@extends('layouts.app')

@section('content')
<div id="main-content" class="main-content shopping-cart-page">

    <div class="container">
        <!--Cart Table-->
                <div class="shopping-cart-container py-5">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="title">Your cart</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <div class="line-item is-desktop d-flex">
                                    <div class="column d-flex pr-0">
                                        <div class="prod_thumbnail">
                                            <a class="prod-thumb mr-4" href="#">
                                                <figure><img width="90" height="90" src="" alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product_meta">
                                            <div class="prod-brand">
                                                <a href="#">Happy Skin</a>
                                            </div>
                                            <div class="prod-name">
                                                <a href="#">Lip & Cheek Tint</a>
                                            </div>  
                                            <div class="has-attribute prod-attribute">
                                                <span class="attr-name">Primary color:</span><span class="attr-value">Yellow</span><br>
                                                <span class="attr-name">Size & Embroidery:</span><span class="attr-value">BEACH size WITH name</span>
                                            </div>
                                            <div class="price-container my-2">
                                                <span class="current-price">Ks 399</span>
                                            </div>
                                    </div>
                                    </div>
                                    <div class="column is-narrow quantity-wrap">
                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <input class="qty-input qty" type="text" name="updates[]" id="qty" value="1" pattern="[0-9]*">
                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="column is-narrow line-item-total">
                                        <div class="px3 text-center total-price"><strong>Ks 29000</strong></div>
                                    </div>
                                    <div class="column is-narrow line-item-action">
                                        <form action="">
                                            <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </form>
                                    </div>
                                </div>
                                <!-- Item row mobile view -->
                                <div class="line-item is-mobile d-flex my-4">
                                    <div class="column-mobile prod_thumbnail">
                                        <a class="prd-thumb" href="#">
                                            <figure><img width="90" height="90" src="" alt=""></figure>
                                        </a>
                                    </div>
                                    <div class="column-mobile cart_content ml-4" style="width:100%;">
                                        <div class="product_meta mb-3">
                                            <div class="prod-brand">
                                            <a  href="#">Happy Skin</a>
                                            </div>
                                            <div class="prod-name">
                                            <a href="#">Lip & Cheek Tint</a>
                                            </div>  
                                            <div class="has-attribute prod-attribute">
                                                <span class="attr-name">Primary color:</span><span class="attr-value">Yellow</span><br>
                                                <span class="attr-name">Size & Embroidery:</span><span class="attr-value">BEACH size WITH name</span>
                                            </div>

                                        </div>

                                        <div class="quantity-wrap my-2 clearfix">
                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <input class="qty-input qty" type="text" name="updates[]" id="qty" value="1" pattern="[0-9]*">
                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="item-total-wrap d-flex my-3" style="justify-content:space-between;">
                                            <span class="subtotal"><strong>Ks 399</strong></span>
                                            <span class="ordertotal"><strong>Ks 798</strong></span>
                                        </div>

                                    </div>
                                </div>
                                 <!-- Item row mobile view  end -->
                            </form>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="cart-subtotal-block">	
                                <div class="row border-bottom pb-2">
                                    <span class="col-12 col-sm-6 cart__subtotal-title">Order Subtotal</span>
                                    <span class="col-12 col-sm-6 text-right"><span class="subtotal">Ks 6000</span></span>
                                </div>
                                <div class="row pb-2 pt-2">
                                    <span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
                                    <span class="col-12 col-sm-6 text-right tax-price">Ks 900</span>
                                </div>
                                <div class="row border-bottom pb-2 pt-2">
                                    <span class="col-12 col-sm-6 cart__subtotal-title">Shipping Fee</span>
                                    <span class="col-12 col-sm-6 text-right">Free shipping</span>
                                </div>
                                <div class="row border-bottom pb-2 pt-2">
                                    <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Order Total</strong></span>
                                    <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="ordertotal">$1001.00</span></span>
                                </div>
                                <div class="cart__shipping py-2">Shipping &amp; taxes calculated at checkout</div>
  
                                <input type="submit" name="checkout" id="cartCheckout" class="btn btn-checkout" value="Proceed To Checkout" disabled="disabled">
                            </div>

                            <!-- Discount Coupon Block -->
                            <div class="coupon-block">
                                <h5>Discount Codes</h5>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="address_zip">Enter your coupon code if you have one.</label>
                                        <input type="text" name="coupon" class="form-control">
                                    </div>
                                    <div class="actionRow">
                                        <div><input type="button" class="btn btn-secondary btn-apply" value="Apply Coupon"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
        <!-- End Cart Table -->

    </div>
</div>

@endsection