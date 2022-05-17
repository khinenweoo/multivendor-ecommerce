<div class="categories-content">
<div class="container">
    <div class="row">
        <div class="col-md-6">
                    <h3 class="card-title">Brands</h3>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#createBrandModal" style="padding:6px 10px;">
            <i class="tim-icons icon-simple-add"></i> Create Brand
            </button>  
        </div>
    </div>
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
                    <option value="brand_id">ID</option>
                    <option value="brand_name">Name</option>
                    <option value="brand_slug">Slug</option>
                    <option value="status">Status</option>
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
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
             
                <div class="card-body">
                @include('livewire.admin.edit-brand')
                @include('livewire.admin.add-brand')


                @if (session()->has('message'))
                <script>
                    toastr.success("{!! session()->get('message')!!}");
                </script>
                    
                @endif
               
            
                    <div class="table-wrap" id="main-categories">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>          
                                        <th>Created</th>          
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    
                                    <tr>
                                        <td class="text-center">{{ $brand->brand_id }}</td>
                                        <td><img src="{{ asset('storage/brands/'.$brand->brand_image) }}" style="max-width: 60px;max-height: 60px;" alt=""></td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->brand_slug }}</td>
                                        <td>
                                        <span class="badge badge-pill badge-{{$brand->status == 'active'? 'success': 'danger'}}">{{ $brand->status }}</span>
                                        </td>
                                        <td>{{ date_format($brand->created_at,'d M, Y') }}</td>

                                        <td class="td-actions text-right">
                                        <button data-toggle="modal" data-target="#updateBrandModal" wire:click="edit({{ $brand->brand_id }})" type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                            <i class="tim-icons icon-settings"></i>
                                        </button>
                                        <button wire:click="confirmDelete({{ $brand->brand_id }})" data-toggle="modal" data-target="#deleteModal" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                        </td>
                                    </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                                {!! $brands->links() !!}
                     </div>
                    </div>
         
                    <!-- Modal -->
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
                                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- end Modal -->
                </div><!-- End card body -->
            </div>
    </div>
</div>
</div>


