<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                            <h3 class="card-title"><strong>User Details</strong></h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.users')}}" class="link success pull-right"><i class="tim-icons icon-double-left"></i>Back to users</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <form class="" wire:submit.prevent="update"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" wire:model="user_id" >
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>First Name</strong></label>
                                        <div class="">
                                            <input type="text" placeholder="First Name" class="form-control input-md" wire:model="name">
                                            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Last Name</strong></label>
                                        <div class="">
                                            <input type="text" placeholder="Last Name" class="form-control input-md" wire:model="last_name">
                                            @error('last_name') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Email</strong></label>
                                        <div class="">
                                            <input type="email" placeholder="Email" class="form-control input-md" wire:model="email" >
                                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class=" control-label"><strong>Phone</strong></label>
                                        <div class="">
                                            <input type="text" placeholder="phone" class="form-control input-md" wire:model="phone"> 
                                            @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><strong>Birthdate</strong></label>
                                        <div class="">
                                        <input type="text" name="birth_date" placeholder="eg- 31/01/1990" class="form-control input-md" wire:model="birth_date">    
                                          @error('birth_date') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="classifications">Select Classifications</label>
                                    <select wire:model="classifications" class="form-control">
                                        <option value="">-- Classifications ---</option>
                                            <option value="standard"{{ old('classifications')== 'standard' ? 'selected' : ''}} >Standard</option>
                                            <option value="gold"{{ old('classifications')== 'gold' ? 'selected' : ''}} >Gold</option>
                                            <option value="silver" {{ old('classifications')== 'silver' ? 'selected' : ''}}>Silver</option>
                                    </select>
                                    @error('classifications') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class=" control-label"><strong>Gender</strong></label>
                                        <div class="">
                                            <div class="form-check form-check-radio form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="male" id="gender" value="male" wire:model="gender"> Male
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-radio form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="female" id="gender" value="female" wire:model="gender"> Female
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                            @error('gender') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label"><strong>About</strong></label>
                                    <textarea name="short_description"  class="form-control input-md" rows="6" wire:model="about"></textarea>
                                    @error('about') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
         
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fileInput"><i class="tim-icons icon-image-02"></i> <strong>Profile Image: </strong> </label>
                                     
                                        <img src="{{asset('/users')}}/{{$profile_photo}}" width="120" />           
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                            
                                <div class="col-md-12 ">
                                    <button  type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Update User</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
