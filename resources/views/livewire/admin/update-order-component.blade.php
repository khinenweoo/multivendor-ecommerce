
<div>
    <div class="container" id="update_order_page">
                    
        @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ Session::get('message') }}
                </div>
        @endif

        <div class="row">
            <!-- order info card -->
            <div class="col-md-12 col-sm-12">

            <div class="accordion" id="order-info">
                <div class="card">
                        <div class="card-header" id="orderhead">
                            <a href="#" class="btn-header-link" data-toggle="collapse" data-target="#orderblock"
                            aria-expanded="true" aria-controls="orderblock">Order Information #{{ $order_number}}</a>
                        </div>
                      
                        <div id="orderblock" class="collapse show" aria-labelledby="orderhead" data-parent="#order-info">
                            <div class="card-body">
                                <div class="order-info d-flex px-3" style="justify-content:space-between;">   
                                    <div class="text-left">
                                    <label for="title">Order Date: </label>
                                    <span class="value">{{ $order_date}}</span>
                                    </div>
                                    <div class="text-right">
                                    <label for="title">Order Status: </label>
                                    <span class="value" style="text-transform:capitalize;">{{ $order_status}}</span>
                                    </div>
                                </div>
                       
                                @foreach($ordered_items as $item)
                            
                                <div class="table-wrap">
                                    <table class="order-table table-none-border table-divided">
                                        <tbody>
                                            <tr>
                                                <td class="wd-60 min-wd-60">
                                                    <div class="wrap-img">
                                                        <img src="" alt="" class="thumb-image">
                                                    </div>
                                                </td>

                                                <td class="min-wd-200">
                                                @php
                                                    $product = App\Models\Product::where('product_id', $item->product_id)->first();
                                                    $total_cost = $item->price * $item->quantity;
                                                @endphp
                                                    <a href="" class="item-name hover-underline">{{$product->product_name}}</a> (SKU: {{$product->sku}} )
                                                    <p class="attributes">
                                                        <small>Color: White, Size: L</small>
                                                    </p>
                                                    <div class="item-store">
                                                        <span>Vendor Name:</span><a href=""></a>
                                                    </div>
                                                </td>
                                                <td class="pl-5 text-end">
                                                    <div class="price-block">
                                                        <span>{{$item->price}}</span>
                                                    </div>
                                                </td>
                                                <td class="pl5 text-center"> x </td>
                                                <td class="pl5 text-center">
                                                    <span>{{$item->quantity}}</span>
                                                 </td>

                                                <td class="pl-5 text-end">
                                                    <span class="subtotal">{{number_format($total_cost)}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endforeach
                                <div class="amount-block flex-grid-default">
                                    <div class="flexbox-left"></div>
                                    <div class="flexbox-right">
                                        <div class="table-wrap">
                                            <table class="table-normal table-none-border">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-end color-subtext">Sub Amount</td>
                                                        <td class="text-end pl-5"><span>{{number_format($subtotal)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end color-subtext">Discount</td>
                                                        <td class="text-end pl-5"><span>{{$discount}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end color-subtext">Shipping Fee</td>
                                                        <td class="text-end pl-5"><span>$0.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end color-subtext">Tax</td>
                                                        <td class="text-end pl-5"><span>{{$tax}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end">
                                                            <p class="color-subtext">Total amount</p>
                                                            <p style="font-size:13px;">Cash On Delivery (COD)</p>
                                                        </td>
                                                        <td class="text-end pl-5"><strong>{{number_format($grand_total)}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                    <td class="border-bottom"></td>
                                                    <td class="border-bottom"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-end color-subtext">Paid Amount</td>
                                                        <td class="text-end pl-5"><span>$0.00</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="py-3">
                                            <form action="">
                                            <label class="control-label text-title-field">Note</label>
                                            <textarea class="form-control ui-text-area textarea-auto-height" name="description" rows="3" placeholder="Add note..."></textarea>
                                            <div class="mt10">
                                            <button type="button" class="btn btn-info btn-sm btn-save-note">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @if($order_status !== 'confirmed')
                                <div class="border-top-title-main p-4">
                                    <div class="flex-grid-default flexbox-align-items-center">
                                        <div class="flexbox-auto-left pr-4">
                                            <i class="tim-icons icon-check-2"></i>
                                        </div>
                                        <div class="flexbox-auto-right">
                                            <span class="text-upper">Order was confirmed</span>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="border-top-title-main p-4">
                                    <div class="flex-grid-default flexbox-align-items-center">
                                        <div class="flexbox-auto-left pr-4">
                                        <i class="tim-icons icon-credit-card"></i>
                                        </div>
                                        <div class="flexbox-auto-right">
                                            <span class="text-upper">Pending Payment</span>
                                        </div>
                                        <div class="flexbox-auto-right text-right">
                                        <button type="button" class="btn btn-info btn-sm btn-save-note">Confirm Payment</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-top-title-main p-4">
                                    <div class="flex-grid-default flexbox-align-items-center">
                                       <div class="flexbox-auto-left pr-4">
                                       <i class="tim-icons icon-delivery-fast"></i>
                                       </div>
                                       <div class="flexbox-auto-right">
                                        <span class="text-upper">Pending Delivery</span>
                                        </div>
                                    </div>

                                    <!-- Shipping Details -->
                                    <div class="shipping-details-wrap">
                                        <h5>Shipping Details</h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="panel-bottom" style="background:#eee;">
                                <div class="row">
                                    <div class="col-md-12 pull-right">
                                        <!-- Action Buttons -->
                                        <div class="action-buttons">
                                            <div class="form-group">
                                                <div class="col-md-12 ">
                                                    <a href="" title="Create Invoice" class="btn btn-info btn-sm btn-invoice pull-right">
                                                        <i class="tim-icons icon-simple-add"></i> Invoice
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>


                <!-- Address  -->
                <div class="card">
                    <div class="card-header" id="addresshead">
                         <a href="#" class="btn-header-link" data-toggle="collapse" data-target="#addressblock"
                            aria-expanded="true" aria-controls="addressblock">Customer Information</a>
                    </div>
                    <div id="addressblock" class="collapse hide" aria-labelledby="addresshead" data-parent="#order-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="title">Name: </label>
                                            <span class="value">{{ $customer_name }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Phone: </label>
                                            <span class="value">{{ $phone }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Email: </label>
                                            <span class="value">{{ $email }}</span>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <h4>Billing Address</h4>
                                    <div class="form-group">
                                        <label for="title">Address Line 1: </label>
                                        <span class="value">{{ $address1 }}</span>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="title">Address Line 2: </label>
                                        <span class="value">{{$address2 != 'null'? $address2: '-'}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">City: </label>
                                        <span class="value">{{ $city }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">State/Region: </label>
                                        <span class="value">{{ $state }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Country: </label>
                                        <span class="value">{{ $country }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h4>Shipping Address</h4>   
                                    @if($is_shipping_different === true)
                                                                    
                                    <div class="form-group">
                                        <label for="title">Address Line 1: </label>
                                        <span class="value">{{ $shipping->address1 != 'null'? $address1: '-' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Address Line 2: </label>
                                        <span class="value">{{ $address2 }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">City: </label>
                                        <span class="value">{{ $city }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">State/Region: </label>
                                        <span class="value">{{ $state }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Country: </label>
                                        <span class="value">{{ $country }}</span>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="title">Address Line 1: </label>
                                        <span class="value">-</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Address Line 2: </label>
                                        <span class="value">-</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">City: </label>
                                        <span class="value">-</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">State/Region: </label>
                                        <span class="value">-</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Country: </label>
                                        <span class="value">-</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Address -->

            </div>

            </div>
            <!-- end order info card-->
        </div>

    </div>
</div>

@section('extra_js')

@endsection