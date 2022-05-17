<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="" wire:submit.prevent="updateShop"  enctype="multipart/form-data">
                @csrf
                    <input type="hidden" wire:model="shop_id" >
                <!-- Card Start -->
                <div class="card px-3">
                    <div class="card-header">
                        <h3>Update {{$shop_name}}</h3>
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
                            <div class="col-md-12 mb-3">
                                <img src="" alt="">
                                <br>
                                <!-- Cover Photo Upload -->

                                @if(is_null($shop_cover))
                                <div class="form-group ">
                                    <label class="form-label" for="cover_photo">Cover Photo</label><br>
                                    <span><i class="fa fa-folder-open-o"></i> Browse </span>
                                </div>
                                <div class="form-group" style="height:45px;">
                                    <div class="upload-file-area d-flex">
                                    <input class="form-control " id="cover_photo" type="file" style="border: 1px solid rgba(29, 37, 59, 0.5)!important;padding:10px 18px 10px 18px!important;"  wire:model="new_shop_cover">
                                    </div>
                                </div>
                                @else
                                <div class="form-group ">
                                    <label class="form-label" for="cover_photo">Cover Photo</label><br>
                                    <span><i class="fa fa-folder-open-o"></i> Browse </span>
                                </div>
                                <div class="form-group" style="height:45px;">
                                    <div class="upload-file-area d-flex">
                                    <input class="form-control " id="cover_photo" type="file" style="border: 1px solid rgba(29, 37, 59, 0.5)!important;padding:10px 18px 10px 18px!important;"  wire:model="new_shop_cover">
                                    </div>
                                </div>
                                <div class="form-group required-field pb-3" >  
                                    @if(isset($new_shop_cover))
                                    <div class="image-wrap pt-4 pb-0">
                                        <img src="{{$new_shop_cover->temporaryUrl()}}" width="400" /><br>
                                    </div>
                                    @else 
                                    <img src="{{asset('storage/shop_banners')}}/{{$shop_cover}}" class="img-responsive img-fluid"style="max-width:100%;"alt="Cover">
                                    @endif
                                </div>
                              
                                @endif
                            </div>
                            <!-- columns -->
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group required-field focused">
                                    <label for="name">Shop Name</label>
                                    <input class="form-control" type="text" wire:model="shop_name">
                                </div>

                                <div class="form-group required-field focused">
                                    <label for="name">Slug</label>
                                    <input class="form-control" type="text" wire:model="shop_slug">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="account_type">Account Type : </label>

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
                                    <label for="name">Shop Email</label>
                                    <input class="form-control" type="text" wire:model="shop_email">
                                </div>
       
                                <div class="form-group required-field focused">
                                    <label for="name">Shop Address</label>
                                    <textarea class="form-control w-100 p-0" rows="2" wire:model="shop_address"></textarea>
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Pickup Address</label>
                                    <textarea class="form-control w-100 p-0" rows="2" wire:model="pickup_address"></textarea>
                                </div>

                                    <!-- Deal Expire Date -->
                                    <div class="form-group" >
                                       
                                        <label class="control-label">Deal Expire Date: </label>
                                        <input type="text" class="form-control bg-transparent border-0" disabled="" wire:model="format_date">
                                        
                                        <input type="date" id="expirydate" placeholder="Expiry Date" class="form-control" wire:model="deal_date">
                                

                                        @error('deal_date') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <!-- End Deal Expire Date -->
                     
                            </div>
                            <!-- Righ Column -->
                            <div class="col-md-6">   
                                @if(!is_null($shop_logo))
                                <div class="form-group required-field p-0">
                                    <label for="name">Business Logo</label>
                                   
                                    <img src="{{asset('storage/shop_logos')}}/{{$shop_logo}}" class="img-responsive img-fluid"style="max-width:140px;"alt="Thumbnail">
                                </div>
                                <div class="form-group" style="height:45px;">
                                <input class="form-control" type="file" style="border: 1px solid rgba(29, 37, 59, 0.5)!important;padding:10px 18px 10px 18px!important;" wire:model="new_shop_logo">
                                </div>
                                @else
                                <div class="form-group required-field pb-3" >
                                    <label for="name">Business Logo</label>
                                    <input type="file" class="file p-0" wire:model="new_shop_logo">  
                                    @if(isset($new_logo_image))
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
                                    <label for="name">Owner</label>
                                    <input class="form-control" type="text" wire:model="owner_name">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Role</label>
                                    <input class="form-control" type="text" wire:model="role">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Email</label>
                                    <input class="form-control" type="text" wire:model="email">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Mobile Number</label>
                                    <input class="form-control"  type="integer" wire:model="mobile">
                                </div>
                                <div class="form-group required-field focused">
                                    <label for="name">Viber Number</label>
                                    <input class="form-control " placeholder="" type="integer" wire:model="viber_no">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="action-button">
                            <button type="submit" class="btn btn-info">Update Changes</button>
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