<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Cart;

class CategoryComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $min_price;
    public $max_price;

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

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
        $this->min_price = 1000;
        $this->max_price = 90000;
    }
    public function render()
    {
        $category = Category::with('products')->where('slug', $this->category_slug)->first();
      
        $category_id = $category->id;
        $category_name = $category->name;

        if($category->parent_id !== null)
        {
            $parent_category = $category->parent;
        }else {
            $parent_category = null;
        }
 

        if($this->sorting == 'date')
        {
            $products = Product::where('category_id', $category_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->orderBy('created_at', 'DESC')
            ->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price'){
            $products = Product::where('category_id', $category_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->orderBy('price', 'ASC')
            ->paginate($this->pagesize);
        }
        elseif($this->sorting == "price-dsc")
        {
            $products = Product::where('category_id', $category_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->orderBy('price', 'DESC')
            ->paginate($this->pagesize);
        }else {
            $products = Product::where('category_id', $category_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->paginate($this->pagesize);
        }
   
        $brands = Brand::with('products')->get();
        return view('livewire.front.category-component', [
            'brands'=>$brands, 
            'category_products' => $category,
            'category_name' => $category_name,
            'parent_category' => $parent_category,
            'products' => $products, 
             ])->layout("layouts.base");
    }
 
}
