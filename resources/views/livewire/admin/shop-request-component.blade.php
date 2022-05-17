<div>
<div class="products-content">
        <div class="container">
        <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Vendor Requests</h3>
                </div>
                <div class="col-md-6">
                    <!-- <a href="" class="btn btn-sm btn-success pull-right"><i class="tim-icons icon-simple-add"></i> New Order</a> -->
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
                                <option value="shop_name">Business Name</option>
                                <option value="business_email">Business Email</option>
                            </select>
                        </div> 
                        <div class="per-page">
                            <span>Per Page</span>
                            <select name="" id="" wire:model="perPage">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="50">100</option>
                            </select>
                        </div>
                </div>
                </div>
            </div>
            </div> <!--  End Filter top row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
    
                        <!-- Start Card body -->
                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{Session::get('message')}}
                                </div>
                            @endif
                            <div class="table-wrap">
                                <!-- table start -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Business Name</th>
                                            <th>Register Person</th>
                                            <!-- <th>Image</th> -->
                                            <th>Email</th>
                                            <th>Approved</th>                                          
                                            <th>Status</th>
                                            <th>Request Time</th>
                                            

                                             
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($shop_requests as $shop)
                                        <tr>
                                            <td class="text-center">{{ $shop->shop_id }}</td>
                                            <td>{{ $shop->shop_name }}</td>
                                            <td>{{ $shop->seller->name }}</td>
                                            <td>{{ $shop->seller->email }}</td>

                                            <td> 
                                                @if($shop->seller->approved === 1)
                                                <span class="badge badge-pill badge-info">Yes</span>
                                    
                                                @else 
                                                <span class="badge badge-pill badge-default">No</span>
                                                @endif
                                      
                                            </td>
                                            <td class="text-left">
                                                @if($shop->is_active === 1)
                                                <span class="badge badge-pill badge-success">active</span>
                                                @else
                                                <span class="badge badge-pill badge-warning">inactive</span>
                                                @endif
                                            </td> 
                                            <td>{{$shop->created_at->diffForHumans()}}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{route('admin.showrequest',['shop_slug'=>$shop->shop_slug])}}" class="btn btn-info btn-sm btn-icon">
                                                <i class="tim-icons icon-notes"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">  No Shop Request Available..</td>                                     
                                        </tr>
                                        @endforelse
                                        
                            
                                    </tbody>
                                </table> 
                                <!-- table tag end -->
                                {{ $shop_requests->links() }}
                            </div>

                    <!-- Delete Modal -->
                    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                    <button type="button" wire:click.prevent="deleteProduct()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
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
