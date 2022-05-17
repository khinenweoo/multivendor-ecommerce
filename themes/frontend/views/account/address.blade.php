@extends('layouts.app')


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
                                 <a href="permal-link">Address</a>
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
                                        <div class="address-container fade show active" id="address">
                                            <div class="myaccount-content">
                                            
                                            <h3 class="border-0 mb-4" style="color: #606975;font-size: 16px;font-weight:500;letter-spacing: 0.07em;text-transform: uppercase;"><i class="fa fa-map-marker"></i> Addresses</h3>
                                                <div class="address-table table-responsive text-center" style="overflow-x:initial!important;">
                                                            <!-- Address Data Table -->
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
                                        
                                        