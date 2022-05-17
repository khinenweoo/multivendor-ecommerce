<ul class="products">
@if(Cart::count() > 0)

  @foreach(Cart::content() as $cartitem)
    <li class="product">
              <a href="#" class="product-link">
                <span class="product-image">
                <figure><img width="90" height="90" src="{{ asset('storage/products/'.$cartitem->model->product_image) }}" alt="Product photo"></figure>
                </span>
                <span class="product-details">
                  <h3>{{$cartitem->model->product_name}}</h3>
    
                  <h4 class="price"><strong>{{number_format($cartitem->model->price)}} Ks</strong></h4>
                  <span class="qty-price">
                    <span class="qty">
                    <button type="button" class="minus-button" id="minus-button-1" wire:click="decreaseQuantity('{{$cartitem->rowId}}')" >-</button>
                      <input type="number" id="qty-input" class="qty-input" data-max="120" name="qty-input" value="{{$cartitem->qty}}" pattern="[0-9]*" title="Quantity" >
                      <button type="button" class="plus-button" id="plus-button-1"  wire:click.prevent="increaseQuantity('{{$cartitem->rowId}}')">+</button>
                      
                    </span>

                    <span class="total-price">{{number_format($cartitem->subtotal)}} Ks</span>
                  </span>
                </span>
              </a>
              <form>
                    <a href="#" wire:click.prevent="destroy('{{$cartitem->rowId}}')" class="remove-button" title="remove item"><i class="tim-icons icon-simple-remove"></i></a>
               </form>
    </li>

  @endforeach
            <div class="totals">
                <div class="subtotal">
                    <span class="label">Subtotal:</span> <span class="amount"> {{Cart::subtotal()}}</span>
                </div>
            </div>

  @else
    <p class="my-5"><h5 style="color:#606975;text-align:center;">No item in your cart</h5></p>
    <div class="totals">
                <div class="subtotal">
                    <span class="label">Subtotal:</span> <span class="amount"> {{Cart::subtotal()}}</span>
                </div>
    </div>
@endif
</ul>


