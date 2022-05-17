
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
           <div class="modal-body">
                <form enctype="multipart/form-data"> 
                @csrf
                <input type="hidden" wire:model="category_id">
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Enter Name" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="slugInput">Url Slug (must be unique)</label>
                        <input type="text" class="form-control" id="slugInput" wire:model="slug" placeholder="Enter Slug">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>  
                    
                    <div class="form-group">
                        <label for="categoryInput">Select Category</label>
                        <select wire:model="parent_id" class="form-control">
                            <option value="null">-- Parent --</option>
                            @foreach($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }} </option>
                            @endforeach
                        </select>
                    </div>        
                    <div class="form-group">
                        <label for="fileInput">Category Image:</label>
                        @if($updatedImage)
                            <img src="{{$updatedImage->temporaryUrl()}}" width="120" />
                        @else
                            <img src="{{asset('storage/')}}/{{$category_image}}" width="120" />
                        @endif

                    
                        <input type="file" class="form-control" id="fileInput" wire:model="updatedImage">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descInput">Description</label>
                        <input type="text" class="form-control" id="descInput" wire:model="description" placeholder="Enter Description">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="featured">
                            <label>Is Featured:</label><br>
                            <div class="form-check form-check-radio d-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="1" name="is_featured" wire:model="is_featured" checked>
                                    yes
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        <div class="form-check form-check-radio d-inline">
                            <label class="form-check-label">
                                <input class="form-check-input"  type="radio" value="0" name="is_featured" wire:model="is_featured">
                                no
                                <span class="form-check-sign"></span>
                            </label>
                        </div>

                        @error('is_featured') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-success" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>