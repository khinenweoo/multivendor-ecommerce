

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="viewItemModal" tabindex="-1" role="dialog" aria-labelledby="showItemDetail" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0 border-0" >
                <button type="button" class="close m-0 p-2" data-dismiss="modal" aria-label="Close" style="margin-left:auto!important;">
                     <i class="icon-close p-2"></i>
                </button>
            </div>
           <div class="modal-body pt-0">
                <div class="product product-detail">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-12 img-col">
                                <div class="product-image">
                                    <figure>
                                    <img class="product-cover img-fluid" src="{{ asset('storage/products/'.$product_image) }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="col-md-7 col-12 product-info-col">
                                <div class="product-name">
                                    <h1>{{$product_name}}</h1>
                                </div>
                                <p class="unit-of-measure">{{$weight}}</p>
                                <div class="product-reviews">
                                    <div class="rating_stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    </div>
                                    <span class="review_wrap">
                                        <span itemprop="reviewCount">5</span> 
                                    Reviews
                                    </span>
                                </div>
                                <p class="unit-price my-2">
                                    <span class="amount">{{$price}} Ks</span>
                                </p>
                                <hr>
                                <div class="short-description">
                                    <p>{{$short_description}}</p>
                                </div>
                                <p class="stock in-stock">
                                    <span class="status">Availability:</span>
                                    {{$stock_status == 'instock' ? 'In Stock' : 'Out of Stock'}}
                                </p>
                                <div class="prod_attributes_select">
                                    <div class="select-container">
                              
                                        @if($product_attributes)
                           
                                        @forelse($product_attributes as  $key => $attribute)
                                            <div class="wrapper mb-3">
                                            <label class="title-options" for="{{ $attribute->attr_name }}">
                                                    Select {{ $attribute->attr_name }}<span class="color-required">*</span>
                                                </label>
                                            <select wire:model="attributes.{{$key}}" name="attr_name[]" class="form-control select-inline"
                                                    id="{{ $attribute->attr_name }}" required>
                                                @forelse($attribute->attributeValues as $value)
                                                    <option value="{{$attribute->attr_name.':'.$value->value }}">{{ $value->value }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            </div>
                                        @empty
                                            <input type="hidden" name="select-inline">
                                        @endforelse

                                        @endif
                                    </div>

                                </div>
                                <form action="" method="post" enctype="multipart/form-data" class="d-flex">
                                    <div class="quantity-wrapper pr-3" style="display:inline-block;width: 40%;">
                                        
                                        <input wire:model="qty" min="1" class="form-control form-control-sm d-inline" placeholder="Quantity" id="quantity" name="quantity" type="number" value="1" style="padding: 0.25rem 0.6rem !important;">
                                        <a href="#" class="btn btn-increase" wire:click.prevent="increaseQuantity"></a>
                                        <a href="#" class="btn btn-decrease"  wire:click.prevent="decreaseQuantity"></a>
                                    </div> 
                                    <div class="add prod-add-to-cart m-0" style="display:inline-block;">
                                        <a href="#" wire:click.prevent="additemtocart({{$product_id}},'{{$product_name}}',{{$price}})" class="btn btn-primary add-cart-btn d-flex" style="align-items:center;"><i class="icon-basket-loaded"></i> Add to cart</a>
                                    </div>
                                </form>
                                <hr>
                                <div class="sku_wrapper m-2">
                                    <span class="title">SKU:</span>
                                    <span class="value sku">{{$sku}}</span>
                                </div>
                                <div class="categories_wrapper m-2">
                                    <span class="title">Category:</span>
                                    <span class="value category">{{$category_name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>