<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Brand;
use Cart;

class ProductDetailComponent extends Component
{
    public $product_slug;
    public $qty;
    public $attributes = [];


    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
        $this->qty = 1;
    }

    /**
     * Display the specified product 
     *
     * @param int $id
     * @return Response
     */
    public function render()
    {
        // Get Product with related products
        $product = Product::with('rel_products')->where('product_slug', $this->product_slug)->first();
       
        // Get Category Name of the product
        $prod_category = Category::where('id', $product->category_id)->first();
        $category_name = $prod_category->name;

        if($prod_category->parent_id ==! null){
            $parentcategory = $prod_category->parent;
        }

        // Get Product with Seller
        $prod_seller = Product::with('seller')->where('product_slug', $this->product_slug)->first();


        return view('livewire.product-detail-component',  [
            'product'=>$product,
            'parentcategory' => $parentcategory,
            'prod_category' => $prod_category,
            'prod_seller' => $prod_seller,
            'category_name' => $category_name
            ])->layout("layouts.base");
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

        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('message', 'Successfully Added To Cart!');
        return redirect()->back();
    }


    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;   
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
       if($this->qty >1)
       {
           $this->qty--;
       }
    }
}
