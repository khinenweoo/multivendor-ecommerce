<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class SidebarCartComponent extends Component
{

    public function render()
    {
        return view('livewire.sidebar-cart-component')->layout("layouts.base");
    }

    public function increaseQuantity($rowId)
    {
        $cart_item = Cart::get($rowId);
        $qty = $cart_item->qty + 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
    }

    public function decreaseQuantity($rowId)
    {
        $cart_item = Cart::get($rowId);
        $qty = $cart_item->qty - 1;
        Cart::update($rowId, $qty); 
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
        session()->flash('message', 'Cart item has been removed.');
    }

}
