<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;

class ShowProductDetail extends Component
{
    protected $product;
    protected $product_slug;

    public $attributes = [];

    public function mount($product_slug)
    {
        $this->product_slug =  $product_slug;
        $this->qty = 1;
    }

    public function render()
    {
        $product = Product::with('rel_products')->where('product_slug', $this->product_slug)->first();
    
        return view('livewire.show-product-detail', [
            'product' => $product
        ])->layout("layouts.base");
    }

    /**
     * Add Product to Shopping Cart
     *
     * @param Type $prduct_id,$product_name,$product_price 
     * @return view
     **/
    public function addToCart($product_id, $product_name, $product_price)
    {
        $attributes= ' ';
        $attr_values = array_values($this->attributes);
        // $attributes = implode(', ', $attr_values);

        Cart::add(['id' => $product_id, 'name' => '$product_name', 'qty' => $this->qty, 'price' => $product_price, 
            'options' => [
                'attr' => $attr_values
            ]
        ])->associate('App\Models\Product');

        if(!Auth::check()){
            return redirect()->route('user.login');
        }else {
            return redirect()->route('user.checkout.confirm');
        }
    }

    public function registerAccount()
    {
        return redirect()->route('user.regaccount');
    }
}
