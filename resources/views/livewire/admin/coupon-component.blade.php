<div>
    <div class="products-content">
        <div class="container">
            <!-- Filter top row -->
            <div class="row">
                <div class="col-md-12">
                <div class="filter-row">
                        <div class="search-wrap">
                            <input wire:model="search" type="text" class="search" placeholder="Search">
                        </div>
                        <div class="sortdata">
                            <select name="" id="" class="" wire:model="orderAsc">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </div> 
                        <div class="orderby">
                            <select name="" id=""  wire:model="orderBy" >
                                <option value="id">ID</option>
                                <option value="code">Code</option>
                                <option value="value">Coupon Value</option>
                            </select>
                        </div> 
                        <div class="per-page">
                            <span>Per Page</span>
                            <select name="" id="" wire:model="perPage">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                </div>
                </div>
            </div>
            </div> <!--  End Filter top row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">


                        <div class="card-header">
                           <div class="row">
                               <div class="col-md-6">
                               <h3 class="card-title">All Coupons</h3>
                               </div>
                               <div class="col-md-6">
                                   <a href="{{route('admin.addcoupon')}}" class="btn btn-success pull-right"><i class="tim-icons icon-simple-add"></i> New Coupon</a>
                               </div>
                           </div>
                        </div>
                        <!-- Start Card body -->
                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <div class="table-wrap">
                                <!-- table start -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Type</th>
                                            <th>Coupon Value</th>
                                            <th>Expiry Date</th>
                                            <th>Cart Value</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($coupons as $coupon)
                                        <tr>
                                            <td class="text-center">{{ $coupon->id }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->type }}</td>
                                            @if($coupon->type == 'fixed')
                                            <td>{{ $coupon->value }}</td>
                                            @else
                                            <td>{{ $coupon->value }} %</td>
                                            @endif
                                            <td>                                    
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $coupon->expiry_date )->format('d-m-Y') }}
                                           </td>
                                            <td>{{ $coupon->cart_value }}</td>

                                        
                                            <!-- Action buttons -->
                                            <td class="td-actions text-right">
                                            <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-settings"></i>
                                            </a>
                                          
                                            <button wire:click="confirmDelete({{ $coupon->id }})" data-toggle="modal" data-target="#deleteCouponModal" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                            <i class="tim-icons icon-simple-remove"></i>
                                            </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                            
                                    </tbody>
                                </table> 
                                <!-- table tag end -->

                                <!-- pagination links -->
                          
                            </div>

                    <!-- Delete Modal -->
                    <div wire:ignore.self class="modal fade" id="deleteCouponModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true close-btn">×</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                    <p>Are you sure want to delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                    <button type="button" wire:click.prevent="deleteCoupon()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- end Modal -->
                        </div><!--  End Card body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

