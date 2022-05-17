<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coupon;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else {
                $this->calculateDiscount();
            }
        }
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout("layouts.base");
    }

    public function increaseQuantity($rowId)
    {
        $cart_item = Cart::get($rowId);
        $qty = $cart_item->qty + 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $cart_item = Cart::get($rowId);
        $qty = $cart_item->qty - 1;
        Cart::update($rowId, $qty); 
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('message', 'Cart item has been removed.');

    }

    public function destroyAll()
    {
        Cart::destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('message', 'All cart items has been removed.');
    }

    public function applyCouponCode()
    {        

        // $coupon = Coupon::where('code', $this->couponCode)->where('cart_value','<',Cart::subtotal())->first();
        $coupon = Coupon::where('code', $this->couponCode)->first();

        $coupon_cartvalue = $coupon->cart_value;

        if(!($coupon_cartvalue <= Cart::subtotal())){
            session()->flash('coupon_message', 'Coupon code is invalid');
            return;
        }
        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }


    public function calculateDiscount()
    {
        
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }else{
                //if discount is percent
                $this->discount = (Cart::subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount+$this->taxAfterDiscount;
        }
    }

    public function registerAccount()
    {
        return redirect()->route('user.regaccount');
    }

    public function checkout()
    {
        return redirect()->route('user.checkout.confirm');
    }

    public function setAmountForCheckout()
    {
        if(!Cart::count() > 0) {
            session()->forget('checkout');
            return;
        }
        if(session()->has('coupon'))
        {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' =>  $this->totalAfterDiscount
            ]);
        }else{
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::subtotal(),
                'tax' => Cart::tax(),
                'total' =>  Cart::total()
            ]);
        }
    }
}
