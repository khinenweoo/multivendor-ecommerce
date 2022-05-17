<header id="header" class="header-area">
    <div class="header-top-wrapper d-none d-lg-block d-xl-block">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="header-top">
                <div class="topbar-left">
                  <ul class="horizontal-menu">
                      <li><a href="#">
                          <p class="phone"><span class="phone-number">Call Us:(+95) 123 456 7890</span></p>                       
                      </li>
                      <li><a href="#">prodofmm@aeg.com</a></li>
                  </ul>
                </div>
                <div class="topbar-right">
                  <ul class="social-list">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  </ul>
                  <div class="menu-item lang">
                    <div class="language">
                        <span class="selected-lang">English</span>
                        <i class="fa fa-angle-down"></i>
                            <ul id="language">                              
                                <li data-currency="mm" class="selected">Myanmar</li>
                                <li data-currency="eng" class="selected">English</li>
                            </ul>
                    </div>
                  </div>
                  <div class="menu-item currency">
                    <div class="currency-picker">
                        <span class="selected-currency">MMK</span>
                        <i class="fa fa-angle-down"></i>
                        <ul id="currencies">                              
                            <li data-currency="USD" class="selected">USD</li>
                            <li data-currency="MMK" class="selected">MMK</li>
                        </ul>
                    </div>
                  </div>
                  {{-- <div class="menu-item lang">
                      <div class="language">
                          <span class="selected-lang">English</span>
                          <i class="fa fa-angle-down"></i>
                              <ul id="language">                              
                                  <li data-currency="mm" class="selected">Myanmar</li>
                                  <li data-currency="eng" class="selected">English</li>
                              </ul>
                      </div>
                  </div>
                  <li class="menu-item currency">
                    <div class="currency-picker">
                        <span class="selected-currency">MMK</span>
                        <i class="fa fa-angle-down"></i>
                        <ul id="currencies">                              
                            <li data-currency="USD" class="selected">USD</li>
                            <li data-currency="MMK" class="selected">MMK</li>
                        </ul>
                    </div>
                  </li> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Primary Navbar -->
    <div class="header-middle header-sticky">
        <div class="header-main-area">
            <div class="container-fluid">
                <div class="header-main">
                    <div class="logo header-block">
                        <a href="">
                            <img class="app-logo" src="{{ asset('frontend/images/home/logo.png') }}" alt="site-logo">
                        </a>
                    </div>
                    <div class="primary-menu header-block">
                        <nav class="main-navbar navbar-expand-xl">
                            <ul class="primary-menu">
                                <li class="menu-item">
                                    <a class="link-title" href="/">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="link-title">
                                        <span>Shop</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown">
                            
                                      <li><a href="" class="site-nav">All Products<i class="anm anm-angle-right-l"></i></a>
                                      </li>
                                      <li><a href="" class="site-nav">Products of Category</a></li>
                                      <li><a href="" class="site-nav">Single Product </a></li>
                                      
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="link-title">
                                        <span>Promotions</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="link-title" href="">
                                        <span>Vendors</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="link-title" href="/sell">
                                        <span>Become a seller</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="link-title" href="#">
                                        <span>Blog</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="link-title" href="">
                                        <span>Contact Us</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="right-block header-block">
                        <ul class="shop-element">

                            <li class="user-wrap">
                              @if (Route::has('user.login')) 
                                <div class="user d-flex" style="width:100%;">

                                   
                                      @auth
                                       <i class="icon-user"></i>
                                        <span>Account</span>
                                        <i class="fa fa-angle-down"></i>
                                       @else
                                       <div class="icon-wrap">
                                       <i class="icon-user"></i>
                                       </div>
                                       <div class="auth-links" >

                                          <a href="{{ route('user.login') }}" class="text-left">Login</a>
                                          <a href="{{ route('user.register') }}" >Register</a>
                                         
                                          

                                       </div>
                                      @endauth 
                                </div>
                              @endif 
                              @auth
                              <ul class="dropdown">
                      
                                <li class="user-profile-link">
                                  <a href="" class="site-nav">
                                    <div class="avatar-wrap">
                                      <img src="{{ asset('frontend/images/customer/no-user-avatar.svg') }}" class="user-avatar-icon" alt="">
                                    </div>
                                    <div class="submenu-text">
                                      <h4 class="user-name">{{Auth::user()->name}}</h4>
                                      <p>View your profile</p>
                                    </div>
                                  </a>
                                </li>
                                <li>
                                  <a href="" class="site-nav">
                                    <i class="icon-notebook"></i>
                                    Purchases 
                                  </a>
                                </li>
                                <li>
                                  <a href="" class="site-nav"> 
                                    <i class="icon-settings"></i>
                                    Account settings
                                  </a>
                                </li>
                                <li>
                                  <a href="" class="site-nav">
                                    <i class="icon-heart"></i>
                                    Your wish list
                                  </a>
                                </li>
                               
                                <li class="logout-container">
                                  <a class="site-nav" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i>
                                      {{ __('Logout') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                                </li>
                                                     
                              </ul>
                              @endauth
                            </li>
                            <li class="wishlist-wrap">
                                <a href="" class="wishlist-btn">
                                    <i class="icon-heart"></i>
                                    <span class="wishlist-counter">0</span>
                                </a>
                            </li>
                            <li class="cart-wrap">
                                <div class="shopping-cart">
                                    <a href="" class="cart-link">
                                        <i class="icon-handbag"></i>
                                        <span class="cart-counter">0</span>
                                    </a>
                                </div>
                            </li>
                            <li class="toggler-wrap">
                              <button class="site-header__menu navbar-toggler mobile-nav--open" type="button" data-toggle="collapse" data-target="#navbarContent">
                                <span class="line"></span>
                              </button>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom -->
    <div class="header-bottom navigation">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="navigation-container">
              <div class="navigation__left">
                <div class="product-categories">
                  <div class="menu__toggle">
                    <span>All Categories</span>
                  </div>
                  <div class="menu__content">
                    <ul class="menu-dropdown">
                      <li>
                        <a href="">Furniture</a>
                      </li>
                      <li>
                        <a href="">Wall Decor</a>
                      </li>
                      <li>
                        <a href="">Handicraft</a>
                      </li>
                      <li class="has-mega-menu">
                        <a href="">
                          Clothing & Shoes
                        </a>
                        <div class="mega-menu">
                          <div class="mega-menu__column">
                            <h6>Men</h6>
                            <ul class="mega-menu__list">
                              <li>
                                <a href="">T-Shirt</a>
                              </li>
                              <li>
                                <a href="">Pant</a>
                              </li>
                              <li>
                                <a href="">Jacket</a>
                              </li>
                            </ul>
                          </div>
                          <div class="mega-menu__column">
                            <h6>Women</h6>
                            <ul class="mega-menu__list">
                              <li>
                                <a href="">Dress</a>
                              </li>
                              <li>
                                <a href="">Top</a>
                              </li>
                              <li>
                                <a href="">Blouse</a>
                              </li>
                              <li>
                                <a href="">Skirt</a>
                              </li>
                              <li>
                                <a href="">Pant</a>
                              </li>
                            </ul>
                          </div>
                          <div class="mega-menu__column">
                            <h6>Baby & Kids</h6>
                            <ul class="mega-menu__list">
                              <li>
                                <a href="">Shirt</a>
                              </li>
                              <li>
                                <a href="">Dress</a>
                              </li>
                              <li>
                                <a href="">Pant</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li>
                        <a href="">Art & Collectibles</a>
                      </li>
                      <li>
                        <a href="">Home Appliances</a>
                      </li>
                      <li>
                        <a href="">Kitchcenware</a>
                      </li>
                      <li class="has-mega-menu">
                        <a href="">Jewelry & watch</a>
                      </li>
                      <li>
                        <a href="">Handmad Accessories</a>
                      </li>
                      <li>
                        <a href="">Health & Beauty</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="navigation__right">
                <ul class="menu-search">
                  <li class="search">
                    <div class="header-search-bar">
                        <form action="#" class="form-search" name="desktop-seacrh" method="get">
                            <input type="text" name="s" class="input-text" value="" placeholder="Search products...">
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                  </li>
                  <li class="search-wrap search-wrap-mobile d-none d-sm-block d-xs-block d-md-none">
                    <button type="button" class="search-mobile-btn" data-toggle="modal" data-target="#searchmodal"><i class="fa fa-search"></i></button>
                  </li>
                </ul>
                <ul class="menu-extra">
                  <li>
                    <a href="" class="help-link">
                      <span>About</span>
                    </a>
                  </li>
                  <li>
                    <a href="" class="help-link">
                      <span>Help</span>
                      <img src="{{ asset('frontend/images/home/headset.png') }}" alt="">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile Menu -->
    <div class="mobile-nav-wrapper" role="navigation">
        <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
            <li class="lvl1 parent megamenu"><a href="index.html">Home <i class="anm anm-plus-l"></i></a>
          </li>
            <li class="lvl1 parent megamenu">
              <a href="#">Shop <i class="fa fa-angle-down"></i></a>
            <ul>
              <li><a href="#" class="site-nav">Product Category<i class="fa fa-angle-down"></i></a>
                <ul>
                  <li><a href="" class="site-nav">Category</a></li>
                  <li><a href="" class="site-nav">Category</a></li>
                </ul>
              </li>
              <li><a href="#" class="site-nav">Shop Features<i class="fa fa-angle-down"></i></a>
                <ul>
                  <li><a href="shop-left-sidebar.html" class="site-nav">Product Category </a></li>
                  <li><a href="shop-right-sidebar.html" class="site-nav">Product Category</a></li>
                </ul>
              </li>
            </ul>
            </li>
            <li class="lvl1 parent megamenu">
              <a href="">Become Seller<i class="fa fa-angle-down"></i></a>
            </li>
            <li class="lvl1 parent megamenu">
              <a href="about-us.html">Vendors <i class="fa fa-angle-down"></i></a>
            </li>
            <li class="lvl1 parent megamenu"><a href="">Blog <i class="fa fa-angle-down"></i></a>
            <ul>
              <li><a href="" class="site-nav">Article</a></li>
            </ul>
            </li>
 
        </ul>
    </div>
    <!--End Mobile Menu-->

    <!-- Search Modal Mobile -->
    {{-- <div class="modal fade searchmodal show" id="searchmodal" style="display: block;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="container main-search-active">
                <div class="sidebar-search-input">
                  <form action="/search" method="get" class="search-bar" role="search">
                    <div class="form-search">
                      <input type="search" name="q" value="" placeholder="Search products" required="" id="search" class="input-text">
                      <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="search-close">
                      <button type="button" class="close" data-dismiss="modal"><i class="ion-close-round"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> --}}
</header>