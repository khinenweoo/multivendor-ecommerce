<div class="categories-content">
<div class="container">
<div class="row">
    <div class="col-md-6">
    <h3 class="col-md-6 card-title">Categories</h3>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#createModal">
        <i class="tim-icons icon-simple-add"></i> Create
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
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="parent_id">Category</option>
                    <option value="has_featured">Featured</option>
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
                <div class="card-header">

                </div>
                <div class="card-body">

                        @include('livewire.category.update')
                
                        @include('livewire.category.create')

                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('message') }}
                            </div>
                        @endif

                    <div class="table-wrap" id="main-categories">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Parent</th>
                                        <th>Status</th> 
                                        <th class="text-left">Featured</th>
                                        <th class="text-left">Created at</th>

                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    
                                    <tr>
                                        <td class="text-center">{{ $category->id }}</td>
                                        <td><img src="{{ asset('storage/'.$category->category_image) }}"style="max-width: 50px;max-height: 50px;" alt=""></td>
                                        <td>{{ $category->name }}</td>
                                        
                                        <td class="text-left">{{ $category->parent_id != null ? 'sub' : 'parent' }}</td>
                                        <td class="text-left">
                                           @if ($category->parent_id != null)
                                           {{\App\Models\Category::where('id', $category->parent_id)->value('name')}}
                                           @else
                                            -
                                           @endif
                                        </td>
                                        <td class="text-left">
                                            <span class="badge badge-pill badge-{{$category->status == 'active'? 'success': 'warning'}}">{{ $category->status }}</span>
                                        </td>
                                        
                                        <td>
                                        @if($category->is_featured == 1)
                                            <span class="badge badge-pill badge-info">on</span>
                                        @else
                                            <span class="badge badge-pill badge-default">off</span>
                                        @endif
                                        </td>

                                        <td>{{ date_format($category->created_at,'d M, Y') }}</td>

                                        <td class="td-actions text-right">
                            
                                        <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $category->id }})" type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                            <i class="tim-icons icon-settings"></i>
                                        </button>
                                        <button wire:click="confirmDelete({{ $category->id }})" data-toggle="modal" data-target="#deleteModal" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                        </td>
                                    </tr>
                                
                                    @endforeach
                        
                                </tbody>
                            </table>
                                {!! $categories->links() !!}
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


