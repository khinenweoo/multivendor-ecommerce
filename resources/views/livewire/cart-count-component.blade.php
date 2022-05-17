
                <a href="{{route('product.cart')}}" class="cart-link">
                    <i class="icon-handbag"></i>
                    @if(Cart::count() > 0)
                    <span class="cart-counter">{{Cart::count()}}</span>
                    @else
                    <span class="cart-counter">0</span>
                    @endif
                </a>


