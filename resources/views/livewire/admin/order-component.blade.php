<div>
    <div class="products-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">All Orders</h3>
                </div>
                <div class="col-md-6">
                    <!-- <a href="{{route('admin.addproduct')}}" class="btn btn-sm btn-success pull-right"><i class="tim-icons icon-simple-add"></i> New Order</a> -->
                </div>
            </div>
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
                                <option value="code">Order Number</option>
                                <option value="customer">Customer Name</option>
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

            @include('livewire.admin.order.show')
            <!-- List -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
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
                                            <th>Order Number</th>
                                            <th>Billed To</th>
                                            <th>Discount</th>
                                            <th>Grand Total</th>
                                            <th>Status</th>
                                            <th>Is Paid</th>
                                            <th>Payment Method</th>
                                            <th>Order Date</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td class="text-center">{{ $order->order_id }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{$order->name}}</td>
                                            <td>Ks {{ $order->discount }}</td>
                                            <td>Ks {{ $order->grand_total }}</td>
                                            <td class="text-left">
                                                @if($order->order_status == 'pending')
                                                <span class="badge badge-pill badge-warning">
                                                    {{ $order->order_status }}
                                                </span>
                                                @elseif($order->order_status == 'processing')
                                                <span class="badge badge-pill badge-success">
                                                    {{ $order->order_status }}
                                                </span>
                                                @elseif($order->order_status == 'canceled')
                                                <span class="badge badge-pill badge-danger">
                                                    {{ $order->order_status }}
                                                </span>
                                                @else
                                                <span class="badge badge-pill badge-info">
                                                    {{ $order->order_status }}
                                                </span>
                                                @endif
                                            </td>   
                                            <td>
                                            <span class="badge badge-pill badge-{{$order->is_paid == true? 'success': ''}}">
                                                {{$order->is_paid == true? 'paid': '-'}}
                                            </span>
                                            </td> 
                                            <td> 
                                            <span>COD</span>    
                                        
                                            </td> 
                            
                                            <td>{{ date_format($order->created_at,'d M, Y') }}</td>

                                        
                                            <!-- Action buttons -->
                                            <td class="td-actions text-right">

                                                <button wire:click="show({{ $order->order_id }})" title="view order"  data-toggle="modal" data-target="#showOrderModal" type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                                    <i class="tim-icons icon-bulb-63"></i>
                                                </button>
                                        
                                                <a href="{{route('admin.updateorder',['order_id'=>$order->order_id])}}" title="edit order" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-settings"></i>
                                                </a>
                                                <button wire:click="confirmDelete({{ $order->order_id }})" title="delete order" data-toggle="modal" data-target="#deleteOrderModal" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                                <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                            
                                    </tbody>
                                </table> 
                                <!-- table tag end -->

                                <!-- pagination links -->
                                {{ $orders->links() }}
                            </div>

                    <!-- Delete Modal -->
                    <div wire:ignore.self class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteOrderModal">Delete Confirm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true close-btn">×</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                    <p>Are you sure want to delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                    <button type="button" wire:click.prevent="deleteOrder()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
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

