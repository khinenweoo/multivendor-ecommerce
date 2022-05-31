<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Cart;
use App\Models\Category;
use App\Models\Shop;


class ShowProductDetail extends Component
{
    protected $product;
    protected $product_slug;
    protected $parentcategory;
    protected $categoryId;

    public $attributes = [];

    public function mount($product_slug)
    {
        $this->product_slug =  $product_slug;
        $this->qty = 1;
        $this->product = Product::with('rel_products')->where('product_slug', $product_slug)->first();
        $this->categoryId = $this->product->category_id;
    }

    public function render()
    {
        // $product = Product::with('rel_products')->where('product_slug', $this->product_slug)->first();

        // Get Category of the product
        $this->product_category = Category::where('id', $this->categoryId)->first();
        
        $this->category_name = $this->product_category->name;

        $cat_parentId = $this->product_category->parent_id;
        if($cat_parentId ==! null){
            $this->parentcategory = $this->product_category->parent;
        }else{
            $this->parentcategory = null;
        }
    
        return view('livewire.show-product-detail', [
            'product' => $this->product,
            'parentcategory' => $this->parentcategory,
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

        session()->flash('message', 'Item added to cart Successfully.');

        if(!Auth::check()){
            // return redirect()->route('user.login');
            return redirect()->route('category.product', ['category_slug'=>$this->product_category->slug]);
        }else {
            return redirect()->route('user.checkout.confirm');
        }
    }

    public function registerAccount()
    {
        return redirect()->route('user.regaccount');
    }
}
