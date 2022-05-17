
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                            <h3 class="card-title">Edit Coupon</h3>
                            </div>
                            <div class="col-md-6">
                            <a href="{{route('admin.coupons')}}" class="link success pull-right"><i class="tim-icons icon-double-left"></i>Back to coupons list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('message') }}
                            </div>
                        @endif


                        <form class="" wire:submit.prevent="updateCoupon" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Coupon Code</strong></label>
                                        <div class="">
                                            <input type="text" placeholder="Coupon Code" class="form-control input-md" wire:model="code">
                                            @error('code') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Coupon Type</strong></label>
                                     
                                        <select wire:model="type" class="form-control">
                                            <option value="">-- Select ---</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">Percent</option>
                                        </select>
                                        @error('type') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="control-label"><strong>Expiry Date</strong></label>
                                        <input type="date" id="expiry-date" placeholder="Expiry Date" class="form-control input-md" wire:model="expiry_date">
                                     
                                        @error('expiry_date') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Coupon Value</strong></label>
                                        <div class="">
                                            <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value">
                                            @error('value') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Cart Value</strong></label>
                                        <div class="">
                                            <input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value">
                                            @error('cart_value') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                            
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-default pull-right">Update Coupon</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
