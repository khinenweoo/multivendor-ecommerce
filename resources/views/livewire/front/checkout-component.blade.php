<div>
    <div class="page-wrap checkout-page py-5">
    <form  wire:submit.prevent="placeOrder" id="checkout-form">
         @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
                </div>
             @endif
        @if($currentStep == 1)
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <!-- address details -->
                        <div class="address-container">
                            <h4 class="header-text my-3">Where do you want this delivered?</h4>
                            <div class="card">
                                <div class="card-header">
                                        <h4 class="my-2">Billing Address Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="msg-text">
                                        <p class="has-text-weight-semibold">
                                        Provide your complete address so we won’t miss anything.
                                        </p>
                                        <p class="is-text-medium">
                                        Please fill out all of the *required fields.
                                        </p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="city">
                                                    City/Town*
                                                </label>
                                                <input type="text" placeholder="City*" class="form-control input-md" wire:model="city">
                                                @error('city') <span class="text-danger error">{{ $message }}</span>@enderror                   
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="state">
                                                    State*
                                                </label>
                                                <input type="text" placeholder="State*" class="form-control input-md" wire:model="state">
                                                @error('state') <span class="text-danger error">{{ $message }}</span>@enderror                   
                                            </div>
                                        </div>                     
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="postcode">
                                                    Postcode*
                                                </label>
                                                <input type="text" placeholder="Postcode*" class="form-control input-md" wire:model="postcode">
                                                @error('postcode') <span class="text-danger error">{{ $message }}</span>@enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="country">
                                                    Country*
                                                </label>
                                                <input type="text" placeholder="Country*" class="form-control input-md" wire:model="country">
                                                @error('country') <span class="text-danger error">{{ $message }}</span>@enderror 
                                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="address">
                                                    Address*
                                                </label>
                                                <input type="text" placeholder="Address*" class="form-control input-md" wire:model="address">
                                                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 column">
                                        <label for="checkbox">
                                            <input type="checkbox" class="checkmark" value="1" wire:model="set_primary_address">
                                            <span>Set as my primary address</span>
                                        </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-save hover-up" wire:click="saveAddress()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div><!-- end address details -->
                        <div class="choice-container my-4">
                            <form action=""></form>
                                <div class="card">
                                    <div class="card-content p-5">
                                        <label for="" class="radio full-width">
                                            <input type="checkbox" id="diffreent-addr" value="1" wire:model="ship_to_different">
                                            <span>Ship to a different address?</span>
                                        </label>
                                        <!-- Shipping Address -->
                                        @if($ship_to_different)
                                        <div class="shipping-address-container">
                                        <h4 class="my-3">Shipping Address</h4>
                                            <div class="msg-text">
                                                <p class="has-text-weight-semibold">
                                                Provide your complete address so we won’t miss anything.
                                                </p>
                                                <p class="is-text-medium">
                                                Please fill out all of the *required fields.
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="block font-medium text-sm text-gray-700" for="s_name">
                                                            First Name*
                                                        </label>
                                                        <input type="text" placeholder="First Name*" class="form-control input-md" wire:model="s_name">
                                                        @error('s_name') <span class="text-danger error">{{ $message }}</span>@enderror                   
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="block font-medium text-sm text-gray-700" for="s_lastname">
                                                            Last Name*
                                                        </label>
                                                        <input type="text" placeholder="Last Name*" class="form-control input-md" wire:model="s_lastname">
                                                        @error('s_lastname') <span class="text-danger error">{{ $message }}</span>@enderror                   
                                                    </div>
                                                </div>                     
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="block font-medium text-sm text-gray-700" for="s_city">
                                                            City/Town*
                                                        </label>
                                                        <input type="text" placeholder="City*" class="form-control input-md" wire:model="s_city">
                                                        @error('s_city') <span class="text-danger error">{{ $message }}</span>@enderror                   
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="block font-medium text-sm text-gray-700" for="s_state">
                                                            State*
                                                        </label>
                                                        <input type="text" placeholder="State*" class="form-control input-md" wire:model="s_state">
                                                        @error('s_state') <span class="text-danger error">{{ $message }}</span>@enderror                   
                                                    </div>
                                                </div>                     
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="block font-medium text-sm text-gray-700" for="s_postcode">
                                                            Postcode*
                                                        </label>
                                                        <input type="text" placeholder="Postcode*" class="form-control input-md" wire:model="s_postcode">
                                                        @error('s_postcode') <span class="text-danger error">{{ $message }}</span>@enderror 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="block font-medium text-sm text-gray-700" for="s_country">
                                                            Country*
                                                        </label>
                                                        <input type="text" placeholder="Country*" class="form-control input-md" wire:model="s_country">
                                                        @error('s_country') <span class="text-danger error">{{ $message }}</span>@enderror 
                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="block font-medium text-sm text-gray-700" for="s_address">
                                                            Address*
                                                        </label>
                                                        <input type="text" placeholder="Address*" class="form-control input-md" wire:model="s_address">
                                                        @error('s_address') <span class="text-danger error">{{ $message }}</span>@enderror  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        <hr class="mb-4">
                        <!-- customer details -->
                        <div class="customer-info mb-4">
                            <h4 class="header-text my-3">Who will this be delivered to?</h4>
                            <div class="card">
                        
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="name">
                                                    Full Name*
                                                </label>
                                                <input type="text" placeholder="Full Name*" class="form-control input-md" wire:model="name">
                                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="phone">
                                                   Mobile Number*
                                                </label>
                                                <input type="text" placeholder="Mobile Number*" class="form-control input-md" wire:model="phone">
                                                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="email">
                                                   Email*
                                                </label>
                                                <input type="email" class="form-control input-md" wire:model="email">
                                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end customer details -->
                        <div class="action-buttons d-flex my-4 pb-2">
                            <button type="button" class="btn btn-save btn-primary btn-round btn-lg continue-btn" wire:click="increaseStep()">Continue to Payment</button>
                        </div>
                       
                    </div>
                    <!-- order details -->
                    <div class="col-md-4">
                        <div class="cart-summary px-4 py-2">
                           
                            <!-- cart summary content -->
                            <div class="cart-summary-content">
                                <div class="title-text my-4">Cart Summary</div>
                                @foreach (Cart::content() as $item)
                                <div class="cart-items">
                                    <div class="row cart-item">
                                        <div class="col-3">
                                            <div class="prod-thumb">
                         
                                                <figure><img width="50" height="50" src="{{ asset('storage/products/'.$item->model->product_image) }}" alt="{{$item->product_name}}"></figure>
                                            </div>
                                        </div>
                                        <div class="col-9 pl-4 d-flex" style="justify-content:space-between;">
                                            <div class="column info">
                                                <a href="{{ route('product.detail', ['product_slug'=>$item->model->product_slug]) }}" class="pr-name">{{$item->model->product_name}}</a>
                                                <div class="price-wrap">
                                                <span class="price">{{$item->model->price}} Ks </span><span class="txt-quantity"> x {{$item->qty}}</span>
                                                </div>

                                            </div>
                                            <div class="column">
                                                <span class="price">{{number_format($item->subtotal)}} Ks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div><!-- end cart summary content -->
                            <!--  -->
                            @if(Session::has('checkout'))
                            <div class="totals">
                                <hr class="my-2">
                                <div class="subtotal d-flex mb-0" style="justify-content:space-between;">
                                        <div class="column">
                                            <div class="">Order Subtotal</div>
                                        </div>
                                        <div class="column value">
                                             {{number_format(Session::get('checkout')['subtotal'])}} Ks
                                        </div>
                                        
                                </div>
                                <div class="shipping d-flex mb-0" style="justify-content:space-between;">
                                        <div class="column">
                                        <div class="">Shipping Fee</div>
                                        </div>
                                        <div class="column value"> 0 Ks</div>
                                </div>
                                <div class="shipping d-flex mb-0" style="justify-content:space-between;">
                                        <div class="column">
                                        <div class="">Tax</div>
                                        </div>
                                        <div class="column value">0 Ks</div>
                                </div>
                                <hr class="my-2">
                                <div class="order-total d-flex" style="justify-content:space-between;">
                                        <div class="column">
                                            <div class="">Order Total</div>
                                        </div>
                                         <div class="column value">{{number_format(Session::get('checkout')['total'])}} Ks</div> 
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="is-hidden-touch">
                            <hr class="mt-6">
                            <a class="columns d-flex step">
                                <div class="is-narrow flex-none">
                                    <div class="diamond">2 </div>
                                </div>
                                <div class="is-narrow flex-none" style="color: #B3B3B3;font-size:16px;font-weight:600;text-transform:uppercase;">
                                    <span class="has-text-heading">Payment</span>
                                </div>
                            </a>
                            <hr class="mb-5">
                            <a href=""></a>
                        </div>
                    </div>
                </div>
                <!-- end step two Payment -->
            </div>
        </section>
        @endif
        @if($currentStep == 2)
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card my-6">
                            <div class="card-header">
                                        <h4 class="my-2">Please select Payment method</h4>
                            </div>
                            <div class="card-body">
                            
                            <ul class="order-payment-method">
                                <li class="single-payment-method mt-4">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" value="cod" class="custom-control-input" checked="" wire:model="payment_type">
                                            <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                        </div>
                                    </div>
                                    @if($payment_type == "cod")
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                    @endif
                                </li>
                                <li class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" value="bank" class="custom-control-input" wire:model="payment_type">
                                            <label class="custom-control-label" for="directbank">Direct Bank Transfer</label>
                                        </div>
                                    </div>
                                    @if($payment_type == "bank")
                                    <div class="payment-method-details" data-method="bank" style="">
                                        <p>Make your payment directly into our bank account. 
                                            Please send money to our bank account: KBZ - 1990 404 19.
                                            Use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account..</p>
                                    </div>
                                    @endif
                                </li>
                                <li class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="paypalpayment" value="paypal" class="custom-control-input" wire:model="payment_type">
                                            <label class="custom-control-label" for="paypalpayment">Pay with Paypal</label>
                                        </div>
                                    </div>
                                    @if($payment_type == "paypal")
                                    <div class="payment-method-details" data-method="paypal">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    </div>
                                    @endif
                                </li>
                                @error('paymentmode') <span class="text-danger error">{{ $message }}</span>@enderror
                            </ul>
                            <div class="order-notes my-3"> 
                                <label for="order notes" class="control-label">Order Notes</label>
                                <textarea name="order_note" placeholder="Notes about your order, eg. special notes for delivery." class="form-control" rows="3"></textarea>
                            </div>
                                <div class="checkout-footer-area mt-3">
                                    <div class="custom-control custom-checkbox mb-14">
                                        <input type="checkbox" class="custom-control-input" id="terms" required="">
                                        <label class="custom-control-label" for="terms">I have read and agree to the website <a href="index.html">terms and conditions.</a></label>
                                    </div>
                                    <!-- <button type="submit" class="check-btn sqr-btn">Place Order</button> -->
                                    <button type="submit" class="btn btn-save btn-primary btn-round btn-lg mt-4">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- order details -->
                    <div class="col-md-4">
                        <div class="cart-summary px-4 py-2">
                           
                            <!-- cart summary content -->
                            <div class="cart-summary-content">
                                <div class="title-text my-4">Cart Summary</div>
                                @foreach (Cart::content() as $item)
                                <div class="cart-items">
                                    <div class="row cart-item">
                                        <div class="col-3">
                                            <div class="prod-thumb">
                         
                                                <figure><img width="50" height="50" src="{{ asset('storage/products/'.$item->model->product_image) }}" alt="{{$item->product_name}}"></figure>
                                            </div>
                                        </div>
                                        <div class="col-9 pl-4 d-flex" style="justify-content:space-between;">
                                            <div class="column info">
                                                <a href="{{ route('product.detail', ['product_slug'=>$item->model->product_slug]) }}" class="pr-name">{{$item->model->product_name}}</a>
                                                <div class="price-wrap">
                                                <span class="price">MMK {{$item->model->price}}</span><span class="txt-quantity"> x {{$item->qty}}</span>
                                                </div>

                                            </div>
                                            <div class="column">
                                                <span class="price">MMK {{$item->subtotal}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div><!-- end cart summary content -->
                            <!--  -->
                            @if(Session::has('checkout'))
                            <div class="totals">
                                <hr class="my-2">
                                <div class="subtotal d-flex mb-0" style="justify-content:space-between;">
                                        <div class="column">
                                            <div class="">Order Subtotal</div>
                                        </div>
                                        <div class="column">
                                            MMK {{Session::get('checkout')['subtotal']}}
                                        </div>
                                        
                                </div>
                                <div class="shipping d-flex mb-0" style="justify-content:space-between;">
                                        <div class="column">
                                        <div class="">Shipping Fee</div>
                                        </div>
                                        <div class="column"> MMK 0</div>
                                </div>
                                <hr class="my-2">
                                <div class="order-total d-flex" style="justify-content:space-between;">
                                        <div class="column">
                                            <div class="label">Order Total</div>
                                        </div>
                                         <div class="column">MMK {{Session::get('checkout')['total']}}</div> 
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </form>
    </div>
</div>
