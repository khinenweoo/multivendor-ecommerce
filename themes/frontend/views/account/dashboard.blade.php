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
                                        <div class="dashboard-container fade show active" id="dashboard">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <div class="welcome">
                                                    <p>welcome, <strong>{{Auth::user()->name}}</strong> </p>
                                                </div>
                                                <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
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