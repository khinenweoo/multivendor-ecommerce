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
    protected $product;
    protected $product_slug;
    protected $product_category;
    protected $category_name;
    protected $category_slug;
    protected $parentcategory;
    public $qty;
    public $attributes = [];
    protected $categoryId;

    public function mount($product_slug)
    {
        $this->product_slug =  $product_slug;
        $this->product = Product::with('rel_products')->where('product_slug', $product_slug)->first();
        $this->categoryId = $this->product->category_id;
        $this->qty = 1;
        
        //Get Product's Shop
        if($this->sellerId) {
            $this->product_shop = Shop::where('seller_id', $this->sellerId )->first();
        }
        // Get Category of the product
        $this->product_category = Category::where('id', $this->categoryId)->first();
        // 
        $this->category_name = $this->product_category->name;
        $this->category_slug = $this->product_category->slug;

        $cat_parentId = $this->product_category->parent_id;
        if($cat_parentId ==! null){
            $this->parentcategory = $this->product_category->parent;
        }else{
            $this->parentcategory = null;
        }
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
       

        // Get Product with Seller
        $prod_seller = Product::with('seller')->where('product_slug', $this->product_slug)->first();


        return view('livewire.product-detail-component',  [
            'product'=>$this->product,
            'parentcategory' => $this->parentcategory,
            'prod_category' => $this->product_category,
            'category_name' => $this->category_name,
            'category_slug' => $this->category_slug,
            'prod_seller' => $prod_seller,
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