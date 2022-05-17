
<div class="cart-link">
                    <i class="icon-basket"></i>
                    @if(Cart::count() > 0)
                    <span class="cart-counter">{{Cart::count()}}</span>
                    @else
                    <span class="cart-counter">0</span>
                    @endif
</div>

