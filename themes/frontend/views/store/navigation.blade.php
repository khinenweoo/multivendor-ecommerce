<div class="seller_header" id="seller_header">
    

   <div class="store_top">
       <div class="container-fluid">
           <div class="row">
               <div class="col-12">
                   <div class="store_wrap">
                       <div class="store-logo">
                           <img src="{{ asset('frontend/images/store/BB-New-Logo.png') }}" alt="store logo">
                       </div>
                       <div class="top-info-main">
                           <div class="seller-name">
                               <h2>Best Buy</h2>
                           </div>
                      
                           <div class="seller-chatbutton">
                               <a href="" class="chat-link">
                               <i class="icon-speech" aria-hidden="true"></i>
                                  Chat
                               </a>
                           </div>
                       </div>
                       <div class="seller-overview">
                           
                                <div class="seller-overview__item">
                                    <i class="icon-basket-loaded"></i>
                                    Products: <span class="text-value">234</span>
                                </div>
                                <div class="seller-overview__item">
                                    <i class="icon-bubble"></i>
                                    Chat Response Rate: <span class="text-value">83% (Within Hours)</span> 
                                </div>                            
                        
                           
                                <div class="seller-overview__item">
                                    <i class="icon-star"></i>
                                    General Store Evaluation:<span class="text-value"> 97.3% Positive Rating</span>
                                </div>
                                <div class="seller-overview__item">
                                    <i class="icon-user-following"></i>
                                    Store From: <span class="text-value">8 months Ago</span> 
                                </div>                            
                            
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- End Store Top -->
   <!-- Start Store Navbar -->
    <div class="shop-page-menu">
        <div class="navbar-with-menu">
            <div class="container menu_wrapper">
                <div class="menu__items">
                    <a href="{{ route('store.home') }}" class="menu__item menu__item--active"><span>Manin Page</span></a>
                    <a href="{{ route('store.products') }}" class="menu__item"><span> All products</span></a>
                    <a href="{{ route('store.profile') }}" class="menu__item"><span>Profile</span></a>
                </div>
            </div>
        </div>
    </div>

   <!-- End Store Navbar -->

</div>