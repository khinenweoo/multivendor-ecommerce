<div>
<div class="products-content">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
           @endif
            </div> <!--  End Filter top row -->
            <div class="row pt-2">
                <div class="col-md-6">
                <h3>Shop Banner</h3>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-md-8">
                    <div class="card">
                        <!-- Start Card body -->
                        <div class="card-body p-4">
                                @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                @else
                                    <img src="{{asset('storage/shop_banners')}}/{{$shop->banner}}" class="img-responsive img-fluid" style="max-width:100%;" />
                   
                                @endif
                        </div>
                        <div class="card-footer">
                            <button data-toggle="modal" data-target="#updateModal" wire:click="edit()" type="button" rel="tooltip" class="btn btn-default btn-sm">
                                <i class="tim-icons icon-settings"></i> Update
                            </button>
                            <button wire:click="confirmDelete()" data-toggle="modal" data-target="#deleteModal" type="button" rel="tooltip" class="btn btn-danger btn-sm">
                                <i class="tim-icons icon-simple-remove"></i> Delete
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card card-input-custom">
                        <!-- Start Card body -->
                        <div class="card-header">
                            <h4 >Upload Image</h4>
                        </div>
                        <div class="card-body p-3">

                            @if($updateMode)
                                <form wire:submit.prevent="submit" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" class="form-control" wire:model="banner_image">
                                    @error('fileName') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            @else
                   
                                <form wire:submit.prevent="submit" enctype="multipart/form-data">
                                @csrf
  
                                <div class="form-group w-100 d-flex justify-between">
                                    <label for="name" class="d-inline w-40" style="font-size:13px;font-weight:500;">Choose Image:</label>
                                    
                                    <input type="file" class="form-control p-0 d-inline w-60" wire:model="banner_image">
                                    @error('fileName') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                              
                                <button type="submit" class="btn btn-sm btn-default"><i class="tim-icons icon-upload"></i> Upload</button>
                                </form>

                            @endif

                        </div><!--  End Card body -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
