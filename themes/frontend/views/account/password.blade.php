@extends('layouts.app')
@section('extra_css')
<style>
    .error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    font-size: 14px;
    }

    .form-control.error {
        border-color: red;
        padding: .375rem .75rem;
    }
</style>
@endsection

@section('content')

    <!-- Breadcrumbs -->
    <div class="breadcrumb-section">
        <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12 col-sm-12">
                     <nav class="breadcrumb">
                         <ul>
                             <li class="nav-item">
                                 <a href="" class="permal-link">Home</a>
                             </li>
                             <li class="nav-item">
                                 <a href="permal-link">Dashboard</a>
                             </li> 
                         </ul>
                     </nav>
                 </div>
             </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
        <!-- my account wrapper start -->
        <div class="my-account-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            
                            <div class="row">
                                 <!--User Sidebar Start -->
                                <div class="col-lg-3 col-md-4">
                                    @include('account.usersidebar')
                                </div>
                                <!--User Sidebar End -->

                                <!-- Column Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="main-column" id="myaccountContent">

                                        <!-- Content Start -->
                                        <div class="profile-container fade show active" id="profile">

                                            <div class="row myaccount-content">
                                                <div class="col-md-12">
                                                    <!-- Nav Items Link List -->
                                                    <ul class="nav nav-pills mt-2">
                                                        <li class="nav-item"><a href="#edit_profile" class="nav-link" data-toggle="tab" aria-expanded="false">
                                                                <i class="fa fa-pencil"></i> Edit Profile </a>
                                                        </li>
                                                        <li class="nav-item">
                                                                <a href="#profile_addresses" class="nav-link" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                                                Addresses</a>
                                                        </li>
                                                        <li class="nav-item">
                                                                <a href="#reset_password" class="nav-link active show" data-toggle="tab"><i class="fa fa-lock"></i>
                                                                Auth &amp; Password</a>
                                                        </li>    
                                                    </ul>
                                                    <!-- Nav Items Link List End-->

                                                    <!-- Nav tab Content List -->
                                                    <div class="tab-content py-5">
                                                        <!-- single tab pane -->
                                                        <div class="tab-pane" id="edit_profile">
                                                            <h3>Profile Details</h3>
                                                            <div class="account-details-form">

                                                                <form class="form-horizontal" action="{{route('user.updateprofile', Auth::user()->id)}}"  method="POST"  id="userprofileForm">
                                                                {{ csrf_field() }}
                                                                    <div class="row">
                                                                        <!-- 1st Column -->
                                                                        <div class="col-md-4">
                                                                            <!-- First Name -->
                                                                            <div class="single-input-item  py-3">
                                                                                <label for="first-name" class="required">First Name</label>
                                                                                <input class="form-control " id="name" name="name" type="text" value="{{Auth::user()->name}}">
                                                                                <span class="text-danger error-text name_error"></span>
                                                                            </div>
                                                                            <!-- Email -->
                                                                            <div class="single-input-item py-3">
                                                                                <label for="first-name" class="required">Email</label>
                                                                                <input class="form-control " name="email" id="email" type="text" value="{{Auth::user()->email}}">
                                                                                <span class="text-danger error-text email_error"></span>
                                                                            </div>
                                                                            <!-- About  -->
                                                                            <div class="single-input-item py-3">
                                                                                <label for="first-name" class="required">About</label>
                                                                                <textarea class="form-control limited-text"  id="about" maxlength="250" rows="6" name="about" cols="50">{{Auth::user()->about}}</textarea>
                                                                                <span class="text-danger error-text about_error"></span>
                                                                            </div>
                                                                        </div>
                                                                        <!-- 2nd Column -->
                                                                        <div class="col-md-4">
                                                                            <!-- Last Name -->
                                                                            <div class="single-input-item  py-3">
                                                                                <label for="last-name" class="required">Last Name</label>
                                                                                <input class="form-control" id="last_name" name="last_name" type="text" value="{{Auth::user()->last_name}}">
                                                                                <span class="text-danger error-text last_name_error"></span>
                                                                            </div>
                                                                            <!-- Phone -->
                                                                            <div class="single-input-item py-3">
                                                                                <label for="phone" class="required">Mobile Phone</label>
                                                                                <input class="form-control" id="phone" placeholder="Phone Number" name="phone" type="text"  value="{{Auth::user()->phone}}">
                                                                                <span class="text-danger error-text phone_error"></span>
                                                                            </div>
                                                                            <!-- Birthdate -->
                                                                            <div class="single-input-item py-3">
                                                                                <label for="birth_date" class="required">Birthdate (YYYY/MM/DD)</label>
                                                                                <input class="form-control" id="birth_date" placeholder="" name="birth_date" type="text"  value="{{Auth::user()->birth_date}}">   
                                                                                <span class="text-danger error-text birth_date_error"></span> 
                                                                            </div>
                                                                            <!-- Gender -->
                                                                            <div class="single-input-item py-3">
                                                                                <label class=" control-label"><strong>Gender</strong></label>
                                                                                <div class="form-check form-check-radio form-check-inline">
                                                                                    <label class="form-check-label">
                                                                                        <input class="form-check-input" type="radio" name="gender" value="male"> Male
                                                                                        <span class="form-check-sign"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check form-check-radio form-check-inline">
                                                                                    <label class="form-check-label">
                                                                                        <input class="form-check-input" type="radio" name="gender" value="female"> Female
                                                                                        <span class="form-check-sign"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <span class="text-danger error-text gender_error"></span> 
                                                                            </div>
                                                                        </div>
                                                                        <!-- Third Column, Profile photo -->
                                                                         <!-- Third Column, Profile photo -->
                                                                         <div class="col-md-4">
                                                                            <div class="text-center">
                                                                            <img id="image_source" class="profile-user-img img-responsive img-circle" style="width: 200px" src="{{asset('/users')}}/{{Auth::user()->profile_photo}}" alt="User profile picture">
                                                                            <input name="profile_photo" type="file" class="form-control">
                                                                            <small class="">Click on <b>Pic</b> to update it.</small>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="single-input-item">
                                                                        <button type="submit" class="btn btn-success btn-save"><i class="fa fa-save"></i> Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- single tab pane -->
                                                        <div class="tab-pane" id="profile_addresses">
                                                            <!-- Address Datat Table -->
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table color-table info-table table table-hover table-striped table-condensed">
                                                                        <thead>
                                                                            <tr>
                                                                            <th>Type</th>
                                                                            <th>Address 1</th>
                                                                            <th>Address 2</th>
                                                                            <th>City</th>
                                                                            <th>State</th>
                                                                            <th>Zip</th>
                                                                            <th>Country</th>
                                                                            <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                            <td colspan="8" class="text-center">No Addresses has been added</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- Address Data Table End -->

                                                            <div id="address_form" data-url="" data-method="">
                                                                <div class="row mt-3">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <div class="form-group required-field "><label for="address[address_1]">Address 1</label><input class="form-control " placeholder="Address 1" id="address[address_1]" name="address[address_1]" type="text" value=""></div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group"><label for="address[address_2]">Address 2</label><input class="form-control " placeholder="Address 2" id="address[address_2]" name="address[address_2]" type="text" value=""></div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group required-field "><label for="address[type]">Type</label><select class="form-control " id="address[type]" name="address[type]"><option selected="selected" value="">Select Type ...</option><option value="home">Home</option><option value="office">Office</option><option value="shipping">Shipping</option><option value="billing">Billing</option></select></div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group required-field "><label for="address[city]">City</label><input class="form-control " placeholder="City" id="address[city]" name="address[city]" type="text" value=""></div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group required-field "><label for="address[state]">State</label><input class="form-control " placeholder="State" id="address[state]" name="address[state]" type="text" value=""></div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group required-field "><label for="address[zip]">Zip</label><input class="form-control " placeholder="Zip" id="address[zip]" name="address[zip]" type="text" value=""></div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group required-field "><label for="address[type]">Country</label>
                                                                                <select class="form-control " id="address[type]" name="address[type]">
                                                                                <option selected="selected" value="">Select Country ...</option>
                                                                                <option value="AS">American Samoa</option>
                                                                                <option value="AT">Austria</option><option value="CZ">Czech Republic</option>
                                                                                <option value="DK">Denmark</option><option value="DJ">Djibouti</option
                                                                                ><option value="DM">Dominica</option><option value="DO">Dominican Republic</option>
                                                                                <option value="EC">Ecuador</option><option value="EG">Egypt</option>
                                                                                <option value="US">United States</option>
                                                                    
                                                                                </select>
                                                                                <span class="elect2-container" dir="ltr" style="width: 100px;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <button id="add_address_btn" class="btn btn-success btn-save" onclick="handleAddressAddBtn();" type="button"><i class="fa fa-plus"></i> Save Address</button>
                                                            </div>  
                                                        </div>

                                                        <!-- single tab pane -->
                                                        <div class="tab-pane active show" id="reset_password">

                                                        <div class="password-reset-form">
                                                                @if(Session::has('success'))
                                                                    <div class="alert alert-success">
                                                                    {{ Session::get('success') }}  
                                                                    </div><br />
                                                                @endif

                                                                @if(Session::has('error'))
                                                                    <div class="alert alert-danger">
                                                                    {{ Session::get('error') }}  
                                                                    </div><br />
                                                                @endif
                                                  
                                                                <form  action="{{route('user.updatepassword', Auth::user()->id)}}" method="POST">
                                                                    @csrf
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                    <h3>Change Password</h3>
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                                <label for="password">Current Password</label>
                                                                                <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" placeholder="Enter Current Password" id="currentPass" name="oldpassword">
                                                                                @error('oldpassword')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label for="password">New Password</label>
                                                                                <input type="password" class="form-control @error('newpassword') is-invalid @enderror" placeholder="Enter New Password" id="newPass" name="newpassword">
                                                                                @error('newpassword')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label for="password_confirmation">Confirm New Password</label>
                                                                                <input type="password" class="form-control @error('cnewpassword') is-invalid @enderror" placeholder="Reenter New Password" id="cnewPass" name="cnewpassword">
                                                                                @error('cnewpassword')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                        </div>
                                                                        <div class="single-input-item">
                                                                        <button type="submit" class="btn btn-success btn-save"><i class="fa fa-save"></i> Save Changes</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 text-center">
                                                                        <i class="fa fa-lock" style="color:#7777770f; font-size: 10em;"></i>
                                                                    </div>
                                                                    </div>      
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Nav tab Content List End -->
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <!-- Content End -->
                                    </div>
                                </div> <!-- Column End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->

@endsection
@section('extra_js')

@endsection
