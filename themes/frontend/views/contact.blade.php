@extends('layouts.app')

@section('content')
<div id="main-content" class="contactus-page main-content">
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
                                 <a href="permal-link">Contact Us</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
</div>
<!-- End Breadcrumbs -->

<!-- page content -->
<div class="page-contain">
    <section class="contactSection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title">Contact</div>
                    <h2 class="sectionTitle">Drop Your Message</h2>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="contactFormWrapper">
                        <form action="" class="contactForm">
                            <ul class="contactList">
                                <div class="contactInputWrapper">
                                    <li class="input">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" id="phone" placeholder="e.g. +95 09 123456789">
                                    </li>
                                    <li class="input">
                                        <label for="email">E-mail <span>(required)</span></label>
                                        <input type="text" name="email" placeholder="e.g. john.doe@company.com">
                                    </li>
                                    <li class="textarea">
                                        <label for="message">Message <span>(required)</span></label>
                                        <textarea class="input" name="message" id="message" placeholder="Please type your message here..."></textarea>
                                    </li>
                                    <!-- <li class="checkbox radioInfo">
                                        <label for="" class="privacyLabel">
                                            <p>I accept the 
                                                <a href="">Privacy Policy</a>
                                            </p>
                                            <input type="checkobx" name="policy" id="">
                                        </label>
                                    </li> -->
                                </div>
                                <li class="formButton">
                                    <button type="submit" class="sendbutton">Send message</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="column2">
                        <div class="columnWrapper">
                            <div class="contactTitle">Feel free to Contact us</div>
                            <div class="contactContent">
                                Tell us about your interests and we will write you back answering how can we help to achieve your goals.
                                <div class="open-hours my-3">
                                    <strong>Opening Hours</strong><br>
                                    Mon - Sat : 9am - 11pm<br>
                                    Sunday: 11am - 5pm
                                </div>
                                <ul class="addressFooter">
                                    <li><p><i class="icon-location-pin"></i>55 Gallaxy Enque, 2568 steet, 23568 NY</p></li>
                                    <li class="phone"><p><i class="icon-phone"></i>(+95) 09 000 0000</p></li>
                                    <li class="email"><p><i class="icon-envelope-open"></i>sales@proudofmyanmar.com</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-content" class="main-content">
            <div class="wrap-map biolife-wrap-map" id="map-block">
                <iframe
                        width="1920"
                        height="591"
                        src="https://maps.google.com/maps?width=100%&amp;height=263&amp;hl=en&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland+(My%20Business%20Name)&amp;ie=UTF8&amp;t=p&amp;z=15&amp;iwloc=B&amp;output=embed"
                        frameborder="0"
                        scrolling="no"
                        marginheight="0"
                        marginwidth="0">
                </iframe>
            </div>
    </section>

</div>
</div>
@endsection