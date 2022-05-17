

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="showOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Order #{{$order_id}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
           <div class="modal-body">
                <form enctype="multipart/form-data"> 
                @csrf
                <input type="hidden" wire:model="order_id">
                <!-- order and user info -->
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="info-wrapper">
                            <div class="header-block">
                                <h3>Order Information</h3>
                            </div>
                            <div class="form-group">
                                <label for="order code">Order Code: </label>
                                <span class="value-text">{{ $order_number}}</span>
                            </div>
                            <div class="form-group">
                                <label for="nameInput">Order Date: </label>
                                <span class="value-text">{{ $order_date}}</span>
                            </div>
                            <div class="form-group">
                                <label for="nameInput">Order Status: </label>
                                <span class="value-text">{{ $order_status}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="info-wrapper">
                            <div class="header-block">
                                <h3>Customer Information</h3>
                            </div>
                            <div class="form-group">
                                <label for="order code">Name: </label>
                                <span class="value-text">{{ $customer_name }}</span>
                            </div>
                            <div class="form-group">
                                <label for="nameInput">Phone: </label>
                                <span class="value-text">{{ $phone }}</span>
                            </div>
                            <div class="form-group">
                                <label for="nameInput">Email: </label>
                                <span class="value-text">{{ $email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end order and user info -->
                <!-- address info -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="info-wrapper">
                            <div class="header-block">
                                <h3>Billing Address</h3>
                            </div>
                            <div class="form-group">
                                <label for="order code">Address Line 1: </label>
                                <span class="value-text">{{ $address1 }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">Address Line 2: </label>
                                <span class="value-text">{{ $address2 }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">City: </label>
                                <span class="value-text">{{ $city }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">State/Region: </label>
                                <span class="value-text">{{ $state }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">Country: </label>
                                <span class="value-text">{{ $country }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end address info -->
                @if($is_shipping_different === true)
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="info-wrapper">
                            <div class="header-block">
                                <h3>Shipping Address</h3>
                            </div>
                            <div class="form-group">
                                <label for="order code">Address Line 1: </label>
                                <span class="value-text">{{ $address1 }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">Address Line 2: </label>
                                <span class="value-text">{{ $address2 }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">City: </label>
                                <span class="value-text">{{ $city }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">State/Region: </label>
                                <span class="value-text">{{ $state }}</span>
                            </div>
                            <div class="form-group">
                                <label for="order code">Country: </label>
                                <span class="value-text">{{ $country }}</span>
                            </div>
                        </div>
                    </div>
                </div
                @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-success" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>