@extends('layouts.app')

@section('content')
<div id="main-content" class="blog-page main-content">

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
                                 <a href="permal-link">Blogs</a>
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
         <div class="container">
             <div class="row">
                <!-- Left Sidebar -->
                <aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-xs-6">
                    <div class="mobile-panels" style="display: none;">
                        <span class="current-panel-title">Sidebar</span>
                        <a class="close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                    </div>
                    <div class="sidebar-contain">
                        <!--Search Widget-->
                        <div class="search-widget">
                            <div class="widget-content">
                                <form action="#" name="frm-search" method="get" class="frm-search">
                                    <input type="text" name="s" value="" placeholder="SEARCH..." class="input-text">
                                    <button type="submit" name="ok"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <!-- Recent Blog Posts Widget-->
                        <div class="widget filter">
                            <h4 class="widget-title">Recent Posts</h4>
                            <div class="wgt-content">
                                <div class="recent-posts">
                                
                                    <ul class="posts">
                                        <li>
                                            <div class="wgt-post-item">
                                                <div class="thumb"><a href="#"><img src="{{ asset('frontend/images/our-blog/post-thumb02.jpg') }}"  alt=""></a></div>
                                                <div class="detail">
                                                    <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                                    <div class="post-archive">
                                                    <span class="p-date">Jan 05, 2019</span>
                                                    
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="wgt-post-item">
                                                <div class="thumb"><a href="#"><img src="{{ asset('frontend/images/our-blog/post-thumb03.jpg') }}" alt=""></a></div>
                                                <div class="detail">
                                                    <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                                    <div class="post-archive">
                                                    <span class="p-date">Jan 05, 2019</span>                  
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="wgt-post-item">
                                                <div class="thumb"><a href="#"><img src="{{ asset('frontend/images/our-blog/post-thumb04.jpg') }}" alt=""></a></div>
                                                <div class="detail">
                                                    <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                                    <div class="post-archive">
                                                    <span class="p-date">Jan 05, 2019</span>                  
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="wgt-post-item">
                                                <div class="thumb"><a href="#"><img src="{{ asset('frontend/images/our-blog/post-thumb07.jpg') }}" alt=""></a></div>
                                                <div class="detail">
                                                    <h4 class="post-name"><a href="#">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                                    <div class="post-archive">
                                                    <span class="p-date">Jan 05, 2019</span>                  
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                     
                    </div>

                </aside>
                <!-- End Left Sidebar -->
                <!-- main content -->

                 <div class="main-column col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="posts-list main-post-list">
                        <div class="row">
                            <div class="col-6 col-md-6 col-sm-6 col-xs-12 post-elem">
                                <div class="blog-post-image">
                                        <a href="">
                                            <img height="270" src="{{ asset('frontend/images/our-blog/post-thumb01.jpg') }}" alt="blog post image">
                                        </a>
                                </div>
                                <div class="blog-post-content">
                                        <h2 class="blog-title">
                                            <a href="">Sed neque velit lobortis..</a>
                                        </h2>
                                        <div class="post-meta">
                                            <div class="post-author">Posted By<span>Admin</span></div>
                                            <div class="post-date"><span>May 24, 2021</span></div>
                                        </div>
                                        <p class="blog-desc">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis inventore laborum soluta ipsam sed accusantium. Fugiat velit molestias mollitia. Eius laboriosam eos commodi rem magnam molestiae! Excepturi ipsum eaque sequi?
                                        </p>
                                        <a href="#" class="btn readmore">read more</a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6 col-xs-12 post-elem">
                                <div class="blog-post-image">
                                        <a href="">
                                            <img height="270" src="{{asset('frontend/images/our-blog/post-thumb06.jpg')}}" alt="blog post image">
                                        </a>
                                </div>
                                <div class="blog-post-content">
                                        <h2 class="blog-title">
                                            <a href="">Sed neque velit lobortis..</a>
                                        </h2>
                                        <div class="post-meta">
                                            <div class="post-author">Posted By<span>Maggie</span></div>
                                            <div class="post-date"><span>May 24, 2021</span></div>
                                        </div>
                                        <p class="blog-desc">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis inventore laborum soluta ipsam sed accusantium. Fugiat velit molestias mollitia. Eius laboriosam eos commodi rem magnam molestiae! Excepturi ipsum eaque sequi?
                                        </p>
                                        <a href="#" class="btn readmore">read more</a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6 col-xs-12 post-elem">
                                <div class="blog-post-image">
                                        <a href="">
                                            <img height="270" src="{{ asset('frontend/images/our-blog/post-thumb03.jpg') }}" alt="blog post image">
                                        </a>
                                </div>
                                <div class="blog-post-content">
                                        <h2 class="blog-title">
                                            <a href="">Sed neque velit lobortis..</a>
                                        </h2>
                                        <div class="post-meta">
                                            <div class="post-author">Posted By<span>Jackson</span></div>
                                            <div class="post-date"><span>May 24, 2021</span></div>
                                        </div>
                                        <p class="blog-desc">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis inventore laborum soluta ipsam sed accusantium. Fugiat velit molestias mollitia. Eius laboriosam eos commodi rem magnam molestiae! Excepturi ipsum eaque sequi?
                                        </p>
                                        <a href="#" class="btn readmore">read more</a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-sm-6 col-xs-12 post-elem">
                                <div class="blog-post-image">
                                        <a href="">
                                            <img height="270" src="{{ asset('frontend/images/our-blog/post-thumb04.jpg') }}" alt="blog post image">
                                        </a>
                                </div>
                                <div class="blog-post-content">
                                        <h2 class="blog-title">
                                            <a href="">Sed neque velit lobortis..</a>
                                        </h2>
                                        <div class="post-meta">
                                            <div class="post-author">Posted By<span>Jackson</span></div>
                                            <div class="post-date"><span>May 24, 2021</span></div>
                                        </div>
                                        <p class="blog-desc">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis inventore laborum soluta ipsam sed accusantium. Fugiat velit molestias mollitia. Eius laboriosam eos commodi rem magnam molestiae! Excepturi ipsum eaque sequi?
                                        </p>
                                        <a href="#" class="btn readmore">read more</a>
                                </div>
                            </div>
                        </div>

                    </div>
                 </div>
             </div>
         </div>
     </div>
</div>
@endsection