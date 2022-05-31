<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Cart;


class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->min_price = 1000;
        $this->max_price = 90000;
    }

    /**
     * Add Product to Shopping Cart
     *
     * @param Type $prduct_id,$product_name,$product_price 
     * @return view
     * 
     **/
    public function addtocart($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('message', 'Successfully Added To Cart!');
        return redirect()->back();
    }

    public function render()
    {
        if($this->sorting == 'date')
        {
            $products = Product::whereBetween('price', [$this->min_price,$this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }elseif($this->sorting == 'price'){
            $products = Product::whereBetween('price', [$this->min_price,$this->max_price])->orderBy('price', 'ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == "price-dsc"){
            $products = Product::whereBetween('price', [$this->min_price,$this->max_price])->orderBy('price', 'DESC')->paginate($this->pagesize);
        }else {
            $products = Product::whereBetween('price', [$this->min_price,$this->max_price])->paginate($this->pagesize);
        }

        // $category_products = Category::with('products')->whereNull('parent_id')->get();
        $parent_categories = Category::whereNull('parent_id')->get();

        $brands = Brand::with('products')->get();
        // $product_brands = Product::with('brand')->get();

        return view('livewire.front.shop-component', ['brands'=>$brands, 'parent_categories' => $parent_categories ,'products' => $products])->layout("layouts.base");
    
    }
}