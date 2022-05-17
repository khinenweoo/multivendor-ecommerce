<div>
<div id="main-content" class="category-page main-content">

<!-- Breadcrumbs -->
<div class="breadcrumb-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <nav class="breadcrumb">
                    <ul>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="permal-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="permal-link">{{$brand_name}}</a>
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
           <aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
               <div class="mobile-panels" style="display: none;">
                   <span class="current-panel-title">Sidebar</span>
                   <a class="close-btn" href="#" data-object="open-mobile-filter">&times;</a>
               </div>

               <div class="sidebar-contain">

                    <!-- Brands Filter -->
                    <div class="widget filter-widget mb-30" id="filter-selectors">
                        <h4 class="widget-title">     
                           <span class="filter-title">Filter By Brands</span>
                        </h4>
                        <div class="widget-content">
                        <ul class="check-list multiple">
                               @forelse ($all_brands as $brand)
                               <li class="check-list-item">
                                   <span class="custom-checkbox">
                                       <input type="checkbox" class="input_brand">
                                   </span>
                                   <a href="{{route('brand.products', ['brand_slug'=>$brand->brand_slug])}}" class="check-link">{{$brand->brand_name}}</a>
                               </li>

                               @empty
                               <li class="check-list-item">
                                   <span class="custom-checkbox">
                                       <input type="checkbox" class="input_brand">
                                   </span>
                                   <a href="#" class="check-link"></a>
                               </li>
                               @endforelse

                           </ul>
                        </div>   
                    </div>

                   <!-- Price Filter -->
                   <div class="widget filter-widget price-filter mb-20">
                        <h4 class="widget-title">     
                           <span class="filter-title">Filter By Price</span>
                           <div class="range">{{ number_format($min_price) }} - {{ number_format($max_price) }}</div>
                        </h4>
                   
                   </div>

               </div>
               <div class="content">
                    <div id="range-slider" wire:ignore></div>
                </div>
           </aside>
           <!-- End Left Sidebar -->
           <!-- main content -->
            <div class="main-column col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="category-name-wrapper py-3">
                    <h3 style="font-size:20px;color:#434343;">{{$brand_name}}</h3>
                </div>
                <div class="product-category grid-style">
                    <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode mr-70 mr-sm-0">
                                                <a class="view-link grid active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                                <a class="view-link list" href="#" data-target="list"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                    <div class="top-bar-right">
                                            <div class="product-sort">
                                                <p>Sort By : </p>
                                                <select class="sorting-select" name="sortby" wire:model="sorting">
                                                    <option value="default" >Select Sort Option</option>
                                                    <option value="date">Sort by newest</option>
                                                    <option value="price">Price (Low &gt; High)</option>
                                                    <option value="price-dsc">Price (High &gt; Low)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->
                    
    
                    
                   <div class="prducts-grid" id="cat-grid-style">
                       <div class="row">
                        
                       @foreach ($filtered_products as $product)
                           <div class="col-6 col-md-4 col-sm-4 col-xs-6 item">
                               <!-- Single Product Start -->
                               <div class="single-product product-card">
                                   <div class="product-image">
                                       <a href="{{route('product.detail', $product->product_slug)}}" class="prod-img text-center">
                                           <img src="{{ asset('storage/products/'.$product->product_image) }}" alt="">
                                       </a>
                                       <div class="prod-action">
                                           <a href="" class="wishlist"><i class="fa fa-heart"></i></a>
                                           <a href="" class="add-to-cart"><i class="fa fa-shopping-bag"></i></a>
                                           <a href="" class="quick-view"><i class="fa fa-eye"></i></a>
                                       </div>
                                   </div>
                                   <div class="product-content">
                                       <h3 class="product-name">
                                           <a href="{{route('product.detail', $product->product_slug)}}">{{ $product->product_name }}</a>
                                       </h3>
                                       <div class="prodct-price">
                                           <span class="price">{{ $product->price }} MMK</span>
                                       </div>
                                       <div class="product-seller">
                                       <i class="fa fa-home"></i> Store: <span>Minimalist </span>
                                       </div>                
                                       <div class="reviewStarsWrapper text-left">
                                           <div class="rating_stars">
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star filled"></i>
                                               <i class="icon-star"></i>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- End Single Product -->
                           </div>
                           @endforeach
                     
                         
                       </div>
                    </div>
                    <!-- Pagination -->
                    <div class="panigations-block">
                       <ul class="panigation-contain">
                           {{ $filtered_products->links() }}
                           
                       </ul>
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</div>

</div>
@section('extra_js')
    <script>
        var limitSlider = document.getElementById('range-slider');

        noUiSlider.create(limitSlider, {
            start: [ 100, 9000 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min': 100,
                'max': 9000
            },
            // Show a scale with the slider
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });
        limitSlider.noUiSlider.on('update', function(value){
            @this.set('min_price', value[0]);//fetch 0 index
            @this.set('max_price', value[1]);
        });
    </script>
@endsection