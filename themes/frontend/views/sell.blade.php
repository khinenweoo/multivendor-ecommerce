@extends('layouts.app')

@section('content')
<div id="main-content" class="main-content become-seller-page">
    <section class="feature_intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="row">
                        <div class="header_content pb-5">
                            <p class="small-text">
                                EXPAND YOUR REACH WITH PROD OF MYANMAR
                            </p>
                            <h1 class="text-white custom-header">
                                Become an PROD Of MM Seller
                            </h1>
                            <br>
                            <p class="introduction">
                                A powerful platform where you can reach thousands of buyers to boost sales and grow your business.
                            </p>
                            <div class="signup-as-seller">
                                <a class="btn signup-seller">Signup</a>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset('frontend/images/become-seller/feature_selling.png') }}" alt="" class="seller-bg img-responsive">
                </div>
            </div>
        </div>
    </section>
    <section class="whychooseus">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="whychoose_title"><h2>Why Choose Prod Of Myanmar Partner?</h2></div>
                </div>
            </div>
            <div class="row whychooseus_wrap">

                <div class="col-lg-5 col-md-5">
                    <div class="whychoose-image_wrap">
                        <img class="partner-img" src="{{ asset('frontend/images/become-seller/partnerwithus.jpg') }}" alt="partner image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="title_wrapper">
                        <img src="{{ asset('frontend/images/become-seller/partner.png') }}" alt="">
                    </div>
                    <div class="whychoose_content">
                        <p>
                            We’ve built Myanmar Marketplace so you can easily integrate your catalog, manage orders, arrange shipment and provide customer care. Millions of our customers can’t wait to see what you have in store.
                        </p>
                    </div>
                </div>

            </div>
            <div class="row whychooseus_wrap">
                <div class="col-lg-7 col-md-7">
                    <div class="title_wrapper">
                        <img src="{{ asset('frontend/images/become-seller/embrace.png') }}" alt="">
                    </div>
                    <div class="whychoose_content">
                        <p>
                            Enjoy the unique advantage of partnering with Myanmar's largest innovative retailer and step boldly with us into what comes next as we challenge and change the eCommerce world. Reimagine customer experience and innovative programs that better suit today’s lifestyles.                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="whychoose-image_wrap">
                        <img class="partner-img" src="{{ asset('frontend/images/become-seller/partnerwith.jpg') }}" alt="partner image">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="partner-plan-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title -->
                    <div class="section-title">
                        <h2>
                            <span>Choose Your Partner Plan</span>
                        </h2>
                    </div>
                    <!-- end section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="single-plan-wrap">
                        <div class="title">Business</div>
                        <div class="text">
                            If you have leads resources of export clients and willing to supply leads resources to Prodofmm.com, please join us as a Lead Seller.
                        </div>
                        <div class="joinus-btn-wrap"><a href="" class="joinus-btn">Join Us</a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="single-plan-wrap">
                        <div class="title">Individual</div>
                        <div class="text">
                            If you have strong sales background on internet, and you are willing to build a dedicated team, please join us as a Sales Reseller.
                        </div>
                        <div class="joinus-btn-wrap"><a href="" class="joinus-btn">Join Us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection