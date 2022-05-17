<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form enctype="multipart/form-data"> 
                @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Enter Brand Name" wire:model="brand_name"  wire:keyup="generateslug">
                        @error('brand_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="slugInput">Url Slug (must be unique)</label>
                        <input type="text" class="form-control" id="slugInput" placeholder="Enter Slug" wire:model="brand_slug">
                        @error('brand_slug') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>  
       
                    <div class="form-group mb-3">
                        <label for="fileInput">Brand Logo:</label>
                        <input type="file" class="form-control" id="fileInput" wire:model="brand_image">

                        @error('brand_image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group pt-3">
                        <label for="descInput">Description</label>
                        <textarea name="description" placeholder="Enter Description" class="form-control input-md" rows="6" wire:model="brand_description"></textarea>
                        @error('brand_description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                
                    <div class="featured">
                                <label><strong>Status:</strong></label><br>
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

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-success close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>