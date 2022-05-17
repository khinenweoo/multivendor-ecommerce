@extends('layouts.app')

@section('content')
<main class="main-content" id="page-content">
<section class="checkout-page py-5">
            <div class="container-fluid">
                <div class="row">

                    <!-- Left Column -->
                    <div class="col-md-8">
                        <!-- address details -->
                        <div class="address-container">
                       
                            <div class="card">
                                <div class="card-header">
                                        <h4 class="my-2">Account Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="msg-text" style="padding: .75rem!important;background-color: rgb(215 190 120 / 84%);">
                                        
                                        <p>Register an account by filling below information.</p>
                                    </div>
                                    <p class="" style="color:#333;">
                                        Already have an account? <span><a href="{{ route('user.login') }}" class="link d-flex" style="color:#0d6efd;">Sign In</a></span>
                                    </p>
                                    <form method="POST" action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group @error('name') has-error @enderror ">
                                                <label class="block font-medium text-sm text-gray-700" for="fullname">
                                                    Full Name
                                                </label>
                                                <input id="name" type="text" class="form-control input-md" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="form-control-hint" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror                  
                                            </div>
                                        </div>
                                                  
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group @error('email') has-error @enderror">
                                                <label class="block font-medium text-sm text-gray-700" for="email">
                                                    Email*
                                                </label>
                                                <input id="email" type="email" class="form-control input-md" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                                @error('email')
                                                    <span class="form-control-hint" role="alert">
                                                        <strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group @error('phone') has-error @enderror">
                                                <label class="block font-medium text-sm text-gray-700" for="phone">
                                                    Phone*
                                                </label>
                                     
                                                <input id="phone" type="phone" class="form-control input-md" name="phone" value="{{ old('phone') }}" required autocomplete="off">
                                                @error('phone')
                                                    <span class="form-control-hint" role="alert">
                                                        <strong>{{ $message }}</strong></span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group @error('password') has-error @enderror">
                                                <label class="block font-medium text-sm text-gray-700" for="password">
                                                    Password*
                                                </label>
                                                <input id="password" type="password" class="form-control input-md @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                                @error('password')
                                                    <span class="invalid-feedback btn-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="block font-medium text-sm text-gray-700" for="password">
                                                    Confirm Password*
                                                </label>
                                                <input id="password-confirm" type="password" class="form-control input-md" name="password_confirmation" required autocomplete="new-password">
    
                                                @error('password')
                                                    <span class="invalid-feedback btn-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-save hover-up" >Save Account</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                           
                        </div><!-- end address details -->

                    </div>
                    <!-- End Left Column-->
            
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
                                                <span class="price"> {{$item->model->price}}</span><span class="txt-quantity"> x {{$item->qty}}</span>
                                                </div>

                                            </div>
                                            <div class="column value">
                                                <span class="price"> {{number_format($item->subtotal)}} Ks</span>
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
                
            </div>
        </section>

</main>
@endsection