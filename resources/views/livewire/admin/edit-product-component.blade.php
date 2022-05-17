
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Edit Product</h3>
            </div>
            <div class="col-md-6">
            <a href="{{route('admin.products')}}" class="link success pull-right"><i class="tim-icons icon-double-left"></i>Back to products list</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <form class="" wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                @csrf
                <input type="hidden" wire:model="product_id" >
                <!-- detail card -->
                <div class="card p-3">
                    <div class="card-header">
                        <h4>Product Details</h4>
                    </div>
                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Product Name</label>
                                        <div class="">
                                            <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Product Slug</label>
                                        <div class="">
                                            <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug">
                                            @error('slug') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class=" control-label"> SKU (Product Code)</label>
                                        <div class="">
                                            <input type="text" placeholder="Product SKU" class="form-control input-md" wire:model="sku">
                                            @error('sku') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <label class="control-label">Short Description(Highlights*)</label>
                
                                <textarea name="short_description" placeholder="Short Description.." class="form-control input-md" rows="6" wire:model="short_description"></textarea>
                                 @error('short_description') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quantity</label>
                                        <div class="">
                                            <input type="number" min="0" placeholder="Quantity" class="form-control input-md" wire:model="quantity">
                                            @error('quantity') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class=" control-label">Weight</label>
                                        <div class="">
                                            <input type="text" placeholder="Product Weight" class="form-control input-md" wire:model="weight">
                                            @error('weight') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="stock_options">
                                <label>Product Available :</label><br>
                                <div class="form-check form-check-radio d-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" value="1" name="stock_status" wire:model="stock_status" checked>
                                        In Stock
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio d-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input"  type="radio" value="0" name="stock_status" wire:model="stock_status">
                                        Out of Stock
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                                @error('stock_status') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>  
                          
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Current Price</label>
                                        <div class="">
                                            <input type="number" min="0" placeholder="Price" class="form-control input-md" wire:model="price">
                                            @error('price') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Discount(%)</label>
                                        <div class="">
                                            <input type="number" min="0" placeholder="Discounted Price" class="form-control input-md" wire:model="discount">
                                            @error('discount') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="brand_id">Choose Brand (Optional)</label>
                                        <select name="brand_id" id="brand_id" class="form-control"  wire:model="brand_id">
                                            <option value=""  selected>Choose your brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="categoryInput">Product Condition</label>
                                    <select wire:model="conditions" class="form-control">
                                      <option value="">-- Choose Conditions ---</option>
                                       
                                            <option value="new" {{ old('conditions')== 'new' ? 'selected' : ''}}>New</option>
                                            <option value="popular" {{ old('conditions')== 'popular' ? 'selected' : ''}}>Popular</option>
                                            <option value="recommend" {{ old('conditions')== 'recommend' ? 'selected' : ''}}>Recommend</option>
                                       
                                    </select>
                                    @error('conditions') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="status-wrap">
                                        <label>Status :</label><br>
                                        <div class="form-check form-check-radio d-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" value="active" name="status" wire:model="status" checked>
                                                Active
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-radio d-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input"  type="radio" value="inactive" name="status" wire:model="status">
                                                Inactive
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                        @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <label class="control-label">Description</label>
                
                                <textarea name="description" placeholder="Description" class="form-control input-md" rows="6" wire:model="description"></textarea>
                                 @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    </div>
                </div>
                <!-- category card -->
                <div class="card">
                    <div class="card-header">
                        <h4>Product Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                @livewire('category-level-select', ['selectedChildcategory' => $category_id])

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product image card -->
                <div class="card p-3">
                    <div class="card-header">
                        <h4>Product Images & Videos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="fileInput"><i class="tim-icons icon-image-02"></i>Product Image:</label>
                                        @if($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                        @else
                                            <img src="{{asset('storage/products')}}/{{$image}}" width="120" />
                                        @endif
                                        @error('newimage') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="file" class="form-control" id="fileInput" wire:model="newimage">   
                                    </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="fileInput"><i class="tim-icons icon-image-02"></i>Product Video: </label>
                                        <input type="file" class="form-control" id="fileInput" wire:model="newvideo">
                                       
                                    </div>
                                    <div class="form-group mt-5">
                                        @if($newvideo)
                                            <video controls preload="auto" width="200" height="100">
                                                <source src="{{$newvideo->temporaryUrl()}}" type='video/mp4'>
                                            </video>

                                        @else
                                            <video controls preload="auto" width="200" height="100">
                                                <source src="{{asset('storage/prod_videos')}}/{{$video}}" type='video/mp4'>
                                            </video>
                                          
                                        @endif
                                        @error('newvideo') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                            </div>
                        </div>
    
                    </div>
                </div>
                <!-- Add Button -->
                <div class="action-button">
                    <div class="form-group">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-default pull-right">Update Product</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
