<header id="header" class="header-area">
    <div class="header-top-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="header-top">
                <div class="topbar-left">
                  <ul class="horizontal-menu">
                      <li><a href="#">
                          <p class="phone"><span class="phone-number">Call Us:(+95) 940464212</span></p>                       
                      </li>
                      <li><a href="#">proudofmyanmar@aeg.com</a></li>
                  </ul>
                </div>
                <div class="topbar-right">
                  <ul class="social-list">
                    <!-- <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> -->
                    
                    <li><a href="#">FAQ</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                  </ul>
                  <div class="menu-item lang pr-5">
                      <div class="language-picker">
                        <span class="selected-lang">English</span>
                            <ul id="languages">                           
                                <li data-currency="mm" class="option">Myanmar</li>
                                <li data-currency="eng" class="option selected">English</li>
                            </ul>
                      </div>
                  </div>
                  <div class="menu-item currency">
                    <div class="currency-picker">
                        <span class="selected-currency">USD</span>
                        <ul id="currencies">                              
                            <li data-currency="USD" class="option">USD</li>
                            <li data-currency="MMK" class="option">MMK</li>
                        </ul>
                    </div>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Primary Navbar -->
    <div class="header-middle header-sticky">
          <div class="header-main-area">
              <div class="container">
                <div class="row">
                  <div class="col-12">
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
                                        <a class="link-title active" href="{{route('home')}}">
                                            <span>Home</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="" class="link-title">
                                            <span>Promotions</span>
                                            
                                        </a>
                            
                                    </li>
                                    <li class="menu-item">
                                        <a href="" class="link-title">
                                            <span>Associations</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">                    
                                          <li><a href="{{ route('vendor-shop.list') }}" class="site-nav">Local Market</a></li>
                                          <li><a href="{{ route('farmermarket') }}" class="site-nav">Farmer Market</a></li>
                                        
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="" class="link-title">
                                            <span>Social Enterprise</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="link-title" href="{{ route('vendor-shop.list') }}">
                                            <span>Official Stores</span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown">                    
                                          <li><a href="{{ route('vendor-shop.list') }}" class="site-nav">Local Stores</a></li>
                                          <li><a href="#" class="site-nav">Global Stores</a></li>
                                        </ul>
                                    </li>
                   
                                    <li class="menu-item">
                                        <a class="link-title" href="{{ route('becomeseller') }}">
                                            <span>Sell</span>
                                        </a>
                                        <ul class="dropdown">                    
                                          <li><a href="{{ route('seller.register') }}" class="site-nav">Local Seller</a></li>
                                          <li><a href="#" class="site-nav">Global Seller</a></li>
                                        </ul>
                                    </li>
              
                                    <li class="menu-item">
                                        <a class="link-title" href="{{ route('blogs') }}">
                                            <span>Blog</span>
                                        </a>
                                      
                                    </li>
              
                                </ul>
                            </nav>
                        </div>
                        <div class="right-block header-block">
                            <ul class="shop-element">

                                <li class="user-wrap d-none d-sm-block">
                                  @if (Route::has('user.login')) 
                                    <div class="user d-flex" style="width:100%;">

                                    @auth
                                        
                                          <i class="icon-user"></i>
                                            <h6 class="auth-username mx-2">Hi, {{Auth::user()->name}}</h6>
                                            <i class="fa fa-angle-down py-1"></i>
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
                                      <a href="{{route('user.dashboard')}}" class="site-nav">
                                        <div class="avatar-wrap">
                                          @if(Auth::user()->profile_photo)
                                          <img src="{{ asset('/users/'.Auth::user()->profile_photo) }}" style="max-width: 60px;max-height: 60px;" class="user-avatar-icon" alt="">
                                          @else
                                          <img src="{{ asset('frontend/images/customer/no-user-avatar.svg') }}" class="user-avatar-icon" alt="">
                                          @endif
                                        </div>
                                        <div class="submenu-text">
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
                                      <a class="site-nav" href="{{ route('user.logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="icon-logout"></i>
                                          {{ __('Logout') }}
                                      </a>
                                      <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
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
                                  @livewire('cart-count-component')
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
          </div>
    </div>

    <!-- Header Bottom -->
    <div class="header-bottom navigation d-none d-md-block d-lg-block d-xl-block">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="navigation-container">
              <div class="navigation__left">
                <div class="product-categories">
                  <div class="menu__toggle">
                    <span>Browse Categories</span>
                  </div>
                  <div class="menu__content">
                    <ul class="menu-dropdown">
                    @php
                    $categories = App\Models\Category::whereNull('parent_id')->get();
                    @endphp
                    @foreach($categories as $category)
                        @php
                          $children = App\Models\Category::where('parent_id', $category->id)->get();
                        @endphp
                      <li class="{{ $children->isNotEmpty() ? 'has-mega-menu' : '' }} ">
                        <a href="{{route('category.product', ['category_slug'=>$category->slug])}}">
                        {{$category->name}}
                        </a>
                      
                        @if($children->isNotEmpty())
                        <div class="mega-menu">
                          <div class="mega-menu__column">
                            <ul class="mega-menu__list level-one-list">
                            @foreach ($children as $child)
                                @php
                                $grandChild = App\Models\Category::where('parent_id', $child->id)->get();
                                @endphp
                              <div class="level-one">
                                <a class="sub-category-link" href="{{route('category.product', ['category_slug'=>$child->slug])}}">{{$child->name}}</a>
                            
                                @if($grandChild->isNotEmpty()) 
                                      <ul class="mega-menu__list grand-child-list">
                                        @foreach ($grandChild as $c)
                                          <li>
                                            <a href="{{route('category.product', ['category_slug'=>$c->slug])}}">{{$c->name}}</a>
                                          </li>
                                        @endforeach
                                      </ul>
                                @endif
                            </div>
                            @endforeach
                            </ul>
                          </div>
                          
                        </div>
                        @endif
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="navigation__right">
                <ul class="menu-search">
                  <li class="search">
                    <div class="header-search-bar">
                        <form action="#" class="form-search" name="desktop-seacrh" method="get">
                            <input type="text" name="s" class="input-text form-control" value="" placeholder="I'm looking for...">
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                  </li>
                  <li class="search-wrap search-wrap-mobile d-none d-sm-block d-xs-block d-md-none">
                    <button type="button" class="search-mobile-btn" data-toggle="modal" data-target="#searchmodal"><i class="fa fa-search"></i></button>
                  </li>
                </ul>
                <ul class="menu-extra">
                  <li class="pr-3">
                    <a href="" class="help-link">
                      <span>About</span>
                      <i class="icon-home" style="color:#ba8b33;"></i>
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
            <li class="lvl1 parent megamenu">
              <a href="index.html">Home <i class="anm anm-plus-l"></i></a>
            </li>
            <li class="lvl1 parent megamenu">
              <a href="#">Promotion</a>
              <ul>
                <li><a href="#" class="site-nav">Product Category<i class="fa fa-angle-down"></i></a>
                  <ul>
                    <li><a href="" class="site-nav">Category</a></li>
                    <li><a href="" class="site-nav">Category</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="lvl1 parent megamenu">
              <a href="">Become Seller<i class="fa fa-angle-down"></i></a>
            </li>
            <li class="lvl1 parent megamenu">
              <a href="about-us.html">Official Stores <i class="fa fa-angle-down"></i></a>
            </li>
            <li class="lvl1 parent megamenu"><a href="">Contact Us <i class="fa fa-angle-down"></i></a>
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