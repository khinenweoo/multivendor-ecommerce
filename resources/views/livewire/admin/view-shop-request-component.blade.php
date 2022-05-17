<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="" wire:submit.prevent="update"  enctype="multipart/form-data">
                @csrf
                    <input type="hidden" wire:model="shop_id" >
                <!-- Card Start -->
                <div class="card px-3 card-input-custom">
                    <div class="card-header">
                        <h3>Shop Request Detail</h3>
                    </div>
                    <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{Session::get('message')}}
                                </div>
                            @endif
                        <div class="row">
                            <!-- cover -->
                            <div class="col-md-12">
                                <img src="" alt="">
                                <br>
                                <!-- Cover Photo Upload -->
                                <!-- <div class="form-group">
                                    <label for="cover_photo"></label>
                                    <div class="upload-file-area">
                                    <span class=""><i class="fa fa-folder-open-o"></i> Browse<input class="form-control " placeholder="Cover Photo" id="cover_photo" name="cover_photo" type="file"></span>
                                    </div>
                                </div> -->
                            </div>
                            <!-- columns -->
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group required-field focused">
                                    <label for="name">Business Name</label>
                                    <input class="form-control" type="text" wire:model="shop_name">
                                </div>
                                <div class="form-group required-field focused">
                                    <div class="form-check form-check-radio d-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="business"wire:model="account_type" checked>
                                            Business
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio d-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  type="radio" value="individual" wire:model="account_type">
                                            individual
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                </div>
                                    <div class="form-group required-field focused">
                                        <label for="name">Business Registration Number</label>
                                        <input class="form-control" type="text" wire:model="business_register_no">
                                    </div>
                                    <div class="form-group required-field focused">
                                        <label for="name">Company Name</label>
                                        <input class="form-control" type="text" wire:model="company_name">
                                    </div>
                                    @if($business_register_form)
                                    <div class="file-wrap pb-3">
                                         <label for="name">Business Register Form</label>
                                        <div class="business_register_file flex-shrink h-18 w-18">
                                            <i class="tim-icons icon-single-copy-04"></i>
                                            <input type="text" name="" wire:model="business_register_form" class="p-0" style="font-size:13px;border:0!important;width:90%;">
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group required-field focused pb-3">
                                        <label for="name">Business Register Form</label>
                                        <input type="file" wire:model="business_register_form">
                                    </div>
                                    @endif
                                    @if($licence_certi_file)
                                    <div class="file-wrap pb-3">
                                         <label for="name">Other Licence & Certificates</label>
                                        <div class="business_register_file flex-shrink h-18 w-18">
                                            <i class="tim-icons icon-single-copy-04"></i>
                                            <input type="text" name="" wire:model="licence_certi_file" class="p-0" style="font-size:13px;border:0!important;width:90%;">
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group required-field focused pb-3">
                                        <label for="name">Other Licence & Certificates</label>
                                        <input type="file" wire:model="licence_certi_file">
                                    </div> 
                                    @endif
                                    <div class="form-group required-field focused">
                                        <label for="name">Main Category</label>
                                        <input class="form-control" type="text" wire:model="selectd_category">
                                    </div>
                                    <div class="form-group required-field focused">
                                        <label for="name">Other Category</label>
                                        <input class="form-control" type="text" wire:model="other_category">
                                    </div>
                                    <div class="form-group required-field focused">
                                        <label for="name">Business Email</label>
                                        <input class="form-control" type="text" wire:model="business_email">
                                    </div>
                                    <div class="form-group required-field focused">
                                        <label for="name">Business Address</label>
                                        <textarea class="form-control w-100 p-0" rows="2" wire:model="business_address"></textarea>
                           
                                    </div>
                                    <div class="form-group required-field focused">
                                        <label for="name">Pickup Address</label>
                                        <textarea class="form-control w-100 p-0" rows="2" wire:model="pickup_address"></textarea>
                                    </div>
                
                                    <!-- Approve Checkbox -->
                                    <div class="form-check mt-5 mb-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" wire:model="is_approved">
                                            Approve this shop request
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                        <div class="form-check disabled d-none">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="0" disabled wire:model="is_approved">
                                                Not Approve yet
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                            </div>
                            <!-- Righ Column -->
                            <div class="col-md-6">   
                                @if(!is_null($logo_image))
                                <div class="form-group required-field p-0">
                                    <label for="name">Business Logo</label>
                                   
                                    <img src="{{asset('storage/shop_logos')}}/{{$logo_image}}" class="img-responsive img-fluid"style="max-width:140px;"alt="Thumbnail">
                                 
                                </div>
                                @else
                                <div class="form-group required-field pb-3" >
                                    <label for="name">Business Logo</label>
                                    <input type="file" class="file p-0" wire:model="new_logo_image">  
                                    @if($new_logo_image)
                                    <div class="image-wrap pt-4 pb-0">
                                        <img src="{{$new_logo_image->temporaryUrl()}}" width="140" /><br>
                                    </div>
                                    
                                    @endif
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Status :</label>
                                    <div class="form-check form-check-radio d-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" value="1"  wire:model="shop_status" disabled>
                                            Active
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio d-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  type="radio" value="0"  wire:model="shop_status">
                                            Inactive
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                    @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div> 
                                <div class="form-group required-field focused pt-3">
                                    <label for="name">Register Person (or) Owner</label>
                                    <input class="form-control " placeholder="" type="text" wire:model="register_person">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Role</label>
                                    <input class="form-control " placeholder="" type="text" wire:model="role">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Email</label>
                                    <input class="form-control " placeholder="" type="text" wire:model="email">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Mobile Number</label>
                                    <input class="form-control " placeholder="" type="integer" wire:model="mobile">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Viber Number</label>
                                    <input class="form-control " placeholder="" type="integer" wire:model="viber_no">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">NRC Number</label>
                                    <input class="form-control " placeholder="" type="text" wire:model="nrc_number">
                                </div>
                                <div class="form-group required-field focused" >
                                    <label for="name">NRC Front Photo</label>
                                    <img src="{{asset('storage/sellers_nrc_front')}}/{{$nrc_front}}" style="max-width:140px;" class="img-responsive img-fluid" alt="NRC">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">NRC Back Photo</label>
                                    <img src="{{asset('storage/sellers_nrc_back')}}/{{$nrc_back}}" style="max-width:140px;" class="img-responsive img-fluid" alt="NRC">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="action-button">
                            <button type="submit" class="btn btn-info">Save Change</button>
                        </div>
                    </div>
                </div><!-- Card End -->
                </form>
            </div>
        </div>
    </div>
</div>
@section('extra_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function () {
    $('#expirydate').datetimepicker();
    });


    </script>    
@endsection