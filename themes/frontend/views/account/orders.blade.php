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
                                        <div class="orders-container fade show active" id="dashboard">
                                            <div class="order-content">
                                            <h3>Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Pending</td>
                                                                <td>$3000</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>July 22, 2018</td>
                                                                <td>Approved</td>
                                                                <td>$200</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>June 12, 2017</td>
                                                                <td>On Hold</td>
                                                                <td>$990</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
                                        
                                        