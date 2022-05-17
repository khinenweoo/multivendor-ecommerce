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
                                <option value="name">Name</option>
                                <option value="email">email</option>
                                <option value="phone">Phone</option>
                                <option value="gender">Gender</option>
                                <option value="classifications">Classifications</option>
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
                               <h3 class="card-title"><strong>All Users</strong></h3>
                               </div>
                               <div class="col-md-6">
                               </div>
                           </div>
                        </div>
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
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <!-- <th>Image</th> -->
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Classifications</th>
                                            <th>Registered Date</th>

                                             
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $user->id }}</td>
                                            
                                            <td><img src="{{asset('/users')}}/{{ $user->profile_photo }}" style="max-width: 50px;max-height: 50px;"alt=""></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @if( $user->classifications=='standard')
                                                <span class="badge badge-pill badge-default">{{ $user->classifications }}</span>
                                                @elseif($user->classifications=='gold')
                                                <span class="badge badge-pill badge-warning">{{ $user->classifications }}</span>
                                                @else 
                                                <span class="badge badge-pill badge-success">{{  $user->classifications }}</span>
                                                @endif
                                            </td>
                    
                                            <td>{{ date_format($user->created_at,'d M, Y') }}</td>
                                            <td class="td-actions text-right">
                                          
                                            <!-- <button wire:click="showInfo({{ $user->id }})" type="button" data-toggle="modal" data-target="#infoModal" rel="tooltip" class="btn btn-info btn-sm btn-icon">
                                                <i class="tim-icons icon-notes"></i>
                                            </button> -->
                                            <a href="{{route('admin.edituser',['user_id'=>$user->id])}}" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-settings"></i>
                                            </a>
                                            <button wire:click="confirmDelete({{ $user->id }})" data-toggle="modal" data-target="#deleteModal" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                            <i class="tim-icons icon-simple-remove"></i>
                                            </button>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">  No Users</td>
                                      
                                        </tr>
                                        @endforelse
                                        
                            
                                    </tbody>
                                </table> 
                                <!-- table tag end -->
                                {{ $users->links() }}
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
