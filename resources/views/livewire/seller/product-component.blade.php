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
                                <option value="product_id">ID</option>
                                <option value="product_name">Name</option>
                                <option value="stock_status">Stock Status</option>
                                <option value="price">Price</option>
                                <option value="conditions">Conditions</option>
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
            <div class="row py-3">
                <div class="col-md-6">
                <a href="{{route('seller.createproduct')}}" class="btn btn-sm btn-dark"><i class="tim-icons icon-simple-add"></i> New Product</a>
                </div>
                <div class="col-md-6">
                    <p class="pull-right">Total Products: {{$products->count()}} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h5 class="title">All Products</h5>
                    </div>
                        <!-- Start Card body -->
                        <div class="card-body">

                            @if(session()->has('message'))
                            <script>
                                toastr.success("{!! session()->get('message')!!}");
                            </script>
                            @endif

                            <div class="table-wrap">
                                <!-- table start -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <!-- <th>Image</th> -->
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Quantity</th>
                                            <th>Condition</th>
                                            <th>Status</th> 
                                             
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td class="text-center">{{ $product->product_id }}</td>
                                            
                                            <td><img src="{{ asset('storage/products/'.$product->product_image) }}" style="max-width: 50px;max-height: 50px;"  alt=""></td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>
                                            <span class="label label-success badge badge-success m-r-5 mr-1 m-b-5 mb-1"><i class="fa fa-folder-open"></i> 
                                            {{ $product->category->name }}
                                            </span>
                                            </td>

                                            <td class="text-left">MMK {{ $product->price }}</td>
                                            <td class="text-center">
                                                 @if($product->discount > 0)
                                                 {{ $product->discount }} %
                                                 @else
                                                   -
                                                 @endif

                                            </td>
                                            <td class="text-center">{{ $product->quantity }}</td>
                                            <td class="text-center">
                                                @if($product->conditions=='popular')
                                                <span class="badge badge-pill badge-default">{{ $product->conditions }}</span>
                                                @elseif($product->conditions=='new')
                                                <span class="badge badge-pill badge-dark">{{ $product->conditions }}</span>
                                                @else 
                                                <span class="badge badge-pill badge-info">{{ $product->conditions }}</span>
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                <span class="badge badge-pill badge-{{$product->status == 'active'? 'success': 'warning'}}">{{ $product->status }}</span>
                                            </td>
                                         


                                            <td class="td-actions text-right">
                                          
                    
                                            <a href="{{route('admin.createattribute',['product_id'=>$product->product_id])}}" title="add attribute" class="btn btn-info btn-sm btn-icon">
                                                <i class="tim-icons icon-simple-add"></i>
                                            </a>
                                            <a href="{{route('seller.editproduct',['product_slug'=>$product->product_slug])}}" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-settings"></i>
                                            </a>
                                          
                                            <button wire:click="confirmDelete({{ $product->product_id }})" data-toggle="modal" data-target="#deleteModal" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                            <i class="tim-icons icon-simple-remove"></i>
                                            </button>

                                            </td>
                                        </tr>
                                        @endforeach
                                        
                            
                                    </tbody>
                                </table> 
                                <!-- table tag end -->
                      
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

