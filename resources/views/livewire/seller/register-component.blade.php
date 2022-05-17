
<div style="max-width:700px!important;margin:0 auto;">
<div class="bg-image" id="seller-reg-bg">
    <img src="{{ asset('frontend/images/become-seller/signup-bg.jpg') }}">
</div>
    <form  wire:submit.prevent="shopRegister" id="seller-register-form" enctype="multipart/form-data" >
    @csrf
        @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{Session::get('message')}}
                                </div>
                            @endif
    @if($currentStep == 1)
    <!-- Step One -->
    <div class="step-one"style="margin:0 auto;">
        <div class="card">
            <!-- card header -->
            <div class="card-header mb-2" style="">
                <h2 class="text-center text-2xl pt-3" style="font-weight:600;margin-bottom:15px!important;">Start Selling On Proud of Myanmar</h2>
                <span class="text-center" style="display:block;"> ( STEP 1 of 3 )</span> 
                <h4 class="text-center" style="color:#d6b475;">
                Personal Details</h4>
            </div>
            <!-- card body -->
            <div class="card-body px-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="register_person">
                                Name*
                            </label>
                            <input type="text" name="register_person" placeholder="Your Name" class="form-control input-md" wire:model="register_person">
                            @error('register_person') <span class="text-danger error">{{ $message }}</span>@enderror                   
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                Email*
                            </label>
                            <input type="email" name="email" class="form-control" placeholder="{{ _('Email Address') }}" wire:model="email">
                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="password">
                             Password*
                            </label>
                            <input type="password" name="password" class="form-control" wire:model="password">    
                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="role">
                                Role*
                            </label>
                            <input type="text" name="role" placeholder="Your Role" class="form-control input-md" wire:model="role">
                            @error('role') <span class="text-danger error">{{ $message }}</span>@enderror                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="nrc">
                                NRC Number*
                            </label>
                            <input type="text" name="nrc_number" class="form-control" placeholder="{{ _('Your NRC Number') }}" wire:model="nrc_number">
                            @error('nrc_number') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 pb-2">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="nrc">
                                Attach NRC Front*
                            </label>
                            <input type="file" name="nrc_front" class="file"  wire:model="nrc_front">
                        </div>
                        @error('nrc_front') <span class="text-danger error pt-5">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-12 pb-2">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="nrc">
                                Attach NRC Back*
                            </label>
                            <input type="file" name="nrc_back" class="file" placeholder="{{ _('Back Image') }}" wire:model="nrc_back">
                        </div>
                        @error('nrc_back') <span class="text-danger error pt-5">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="mobile">
                                Mobile Number*
                            </label>
                            <input type="integer" name="mobile" class="form-control" placeholder="{{ _('Mobile') }}" wire:model="mobile">
                            @error('mobile') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="viber">
                                Viber Number(Optional)
                            </label>
                            <input type="integer" name="viber_no" class="form-control" placeholder="{{ _('Viber Number') }}" wire:model="viber_no">
                            @error('viber_no') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                @if($currentStep == 1)
                <div class="action-buttons text-center pb-2">
                    <button type="button" class="btn btn-signup btn-primary btn-round btn-lg" wire:click="increaseStep()">Next</button>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    @if($currentStep == 2)
    <!-- Step Two -->
    <div class="step-two" style="margin:0 auto;">
        <div class="card">
            <!-- card header -->
            <div class="card-header mb-4" style="">
                <h2 class="text-center text-2xl pt-3" style="font-weight:600;margin-bottom:15px!important;">Start Selling On Proud of Myanmar</h2>
                <span class="text-center" style="display:block;">( STEP 2 of 3 )</span> 
                <h4 class="text-center" style="color:#d6b475;">
                Business Information</h4>
            </div>
            <!-- card body -->
            <div class="card-body w-100 px-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="shop_name">
                               Business Name*
                            </label>
                            <input type="text" name="shop_name" placeholder="Shop Name" class="form-control input-md" wire:model="shop_name">                   
                            @error('shop_name') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label class="block font-medium text-sm text-gray-700" for="business_email">
                                    Business Email*
                                </label>
                                <input type="text" name="business_email" class="form-control input-md" wire:model="business_email">                
                                @error('business_email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label class="block font-medium text-sm text-gray-700" for="business_address">
                                Business Location*
                                </label>
                                <textarea  cols="30" rows="2" wire:model="business_location" class="d-block w-100" style="background:transparent!important;"></textarea>               
                                @error('business_address') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                    </div>
                </div>
                <!-- Main Category -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="category">What is the main categories for your business?</label>
                            <select name="maincategory" class="form-control categories-select" wire:model="main_categories">
                                @foreach($parent_categories as $pcategory)
                                    <option value="{{$pcategory->name}}">{{$pcategory->name}}</option>
                                @endforeach 
                            </select>                       
                        </div>  
                    </div>

                </div>
                <!-- Other Category -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="block font-medium text-sm text-gray-700" for="other_category">
                                What other category are you currently selling on?
                            </label>
                            <input type="text" name="other_category" placeholder="Other Category" class="form-control input-md" wire:model="other_category">                
                            @error('other_category') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div><!-- end card body -->     
            
        <div class="card-footer w-100">
            @if($currentStep == 2)
            <div class="action-buttons d-flex justify-content-between pb-2">
            <button type="button" class="btn btn-secondary btn-round btn-lg" wire:click="decreaseStep()">Back</button>
            <button type="button" class="btn btn-signup btn-primary btn-round btn-lg" wire:click="increaseStep()">Next</button>
            </div>
            @endif
        </div>
            
        </div><!-- end card -->    
    </div><!-- end step two --> 
    @endif

    @if($currentStep == 3)
        <div class="step-three">
            <div class="card">
                <!-- card header -->
                <div class="card-header mb-4" style="">
                    <h2 class="text-center text-2xl pt-3" style="font-weight:600;margin-bottom:15px!important;">Start Selling On Proud of Myanmar</h2>
                    <span class="text-center" style="display:block;">( STEP 3 of 3 )</span> 
                    <h4 class="text-center" style="color:#d6b475;">
                    Business Information</h4>
                </div>

                <div class="card-body w-100 px-5">                 
                        <!-- Account Type -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="type_options mb-3">
                                        <label style="font-size:15px;">Account Type*</label><br>
                                        <div class="form-check form-check-radio d-inline">
                                            <label class="form-check-label" style="font-size:15px;">
                                                <input class="form-check-input" type="radio" value="business" name="account_type" wire:model="account_type" checked>
                                                Business
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-radio d-inline">
                                            <label class="form-check-label" style="font-size:15px;">
                                                <input class="form-check-input"  type="radio" value="individual" name="account_type" wire:model="account_type">
                                                Individual
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                        @error('account_type') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>  
                                @if($account_type == "business")
                                <div class="hide-div" id="optional">
                                    <div class="form-group pb-2">
                                        <label class="block font-medium text-sm text-gray-700" for="company_name">
                                            Company Name*
                                        </label>
                                        <input type="text" name="company_name" placeholder="Name" class="form-control input-md" wire:model="company_name">                
                                        @error('company_name') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group pb-2" >
                                        <label class="block font-medium text-sm text-gray-700" for="business_register_no">
                                            Business Registration Number*
                                        </label>
                                        <input type="text" placeholder="Registration Number" class="form-control input-md" wire:model="business_register_no">                   
                                    @error('register_no') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group pb-2" >
                                        <label class="block font-medium text-sm text-gray-700" for="business_register_form">
                                        Attach Registration Form*
                                        </label>
                                        <input type="file" class="file" wire:model="business_register_form" >        
                                        @error('business_register_form') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Other Licence -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pb-2" >
                                    <label class="block font-medium text-sm text-gray-700" for="licence">
                                        Other Licence & Certificates*
                                    </label>
                                    <input type="file" class="file" wire:model="licence_certi_file" >        
                                    @error('licence_certi_file') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <!-- Pickup Address -->
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="block font-medium text-sm text-gray-700" for="pickup_address">
                                        Pickup Address*
                                        </label>
                                        <textarea cols="30" rows="2" wire:model="pickup_address" class="d-block w-100" style="background:transparent!important;"></textarea>         
                                        @error('pickup_address') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                        </div>
                       <!-- Business Logo -->
                       <div class="row">
                            <div class="col-md-12 pb-2">
                                <div class="form-group">
                                    <label class="block font-medium text-sm text-gray-700" for="logo_image">
                                    Business Logo*
                                    </label>
                                    <input type="file" name="logo_image" class="file" wire:model="logo_image" >      
                                    @error('logo_image') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <!-- Website Url -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="block font-medium text-sm text-gray-700" for="website_url">
                                        Website (Optional)
                                    </label>
                                    <input type="text" name="website_url" class="form-control input-md" wire:model="website_url">                
                                    @error('website_url') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <!-- Terms -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-check text-left">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="terms" id="terms" wire:model="terms" type="checkbox">
                                            <span class="form-check-sign"></span>
                                            {{ _('I agree to the') }}
                                            <a href="#">{{ _('terms and conditions') }}</a>.
                                            @error('terms') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="card-footer w-100">
                @if($currentStep == 3)
                <div class="action-buttons d-flex justify-content-between pb-2">
                    <button type="button" class="btn btn-secondary btn-round btn-lg" wire:click="decreaseStep()">Back</button>
                    <button type="submit" class="btn btn-signup btn-primary btn-round btn-lg" >Register</button>
                </div>
                @endif
            </div>
        </div>
    @endif

    
    </form>
</div>
@section('scripts')
    <script>

  
    </script>
@endsection