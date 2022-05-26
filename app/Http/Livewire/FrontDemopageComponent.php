<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Cart;

class FrontDemopageComponent extends Component
{
   
    public $product_id;
    public $product_image;
    public $weight; 
    public $product_name, $price, $sale_price, $discount;
    public $short_description;
    public $stock_status;
    public $quantity;
    public $sku;
    public $category_id;
    public $brand_id;
    public $category_name;
    public $product_attributes;
    public $attributes = [];

    public $qty;

    public function mount()
    {

        $this->qty = 1;
    }

    public function render()
    {
        //Trending Products
        $trending_products = Product::where(['status'=> 'active'])->limit(20)->get();
        return view('livewire.front-demopage-component', [
            'trending_products' => $trending_products
        ])->layout("layouts.demobase");
    }

    /**
     * Show the modal of product detail resource.
     *
     * @param int $id
     * @return Response
     */
    public function showDetail($pid){
        $item = Product::where('product_id', $pid)->first();
        $this->product_id = $pid;
        $this->product_image = $item->product_image;
        $this->weight = $item->weight;
        $this->product_name = $item->product_name;
        $this->price = $item->price;
        $this->sale_price = $item->sale_price;
        $this->short_description =$item->short_description;
        $this->stock_status = $item->stock_status;
        $this->quantity = $item->quantity;
        $this->sku = $item->sku;
        $this->category_id = $item->category_id;
        $this->product_attributes = $item->product_attributes;
        $product_category = Category::where('id', $this->category_id)->first();
        $this->category_name = $product_category->name;
        
    }

     /**
     * Add Product to Shopping Cart
     *
     * @param Type $prduct_id,$product_name,$product_price 
     * @return view
     **/
    public function addtocart($product_id, $product_name, $product_price)
    {
        $attributes= ' ';
        $attr_values = array_values($this->attributes);
        // $attributes = implode(', ', $attr_values);

        Cart::add(['id' => $product_id, 'name' => '$product_name', 'qty' => $this->qty, 'price' => $product_price, 
            'options' => [
                'attr' => $attr_values
            ]
        ])->associate('App\Models\Product');

        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
        $this->emitTo('cart-count-component', 'refreshComponent');
        // session()->flash('message', 'Successfully Added To Cart!');
    }

    public function additemtocart($product_id, $product_name, $product_price)
    {
        $attributes= ' ';
        $attr_values = array_values($this->attributes);
        // $attributes = implode(', ', $attr_values);

        Cart::add(['id' => $product_id, 'name' => '$product_name', 'qty' => $this->qty, 'price' => $product_price, 
            'options' => [
                'attr' => $attr_values
            ]
        ])->associate('App\Models\Product');


        $this->emit('ItemDetailModal'); // Close modal to using to jquery
        $this->emitTo( 'sticky-cart-value-component','cartvalue-refresh');
        $this->emitTo('cart-count-component', 'refreshComponent');
        // session()->flash('message', 'Successfully Added To Cart!');
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
