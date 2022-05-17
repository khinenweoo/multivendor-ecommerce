<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
class ShopHomepageComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $shop;
    public $shop_slug;
    public $shop_seller_id;
    public $shop_name;
    public $categories= [];

    public function mount($shop_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->shop_slug = $shop_slug;
        $this->shop = Shop::where('shop_slug', $this->shop_slug)->first();
        $this->shop_seller_id = $this->shop->seller_id;
        $this->shop_name = $this->shop->shop_name;
    }

    public function render()
    {
        //Get products for this seller
        $products = Product::with('category')->where('seller_id', $this->shop_seller_id)->get();
        //Get products with unique category for this seller
        $prod_categories = $products->unique('category_id');
  
      

        return view('livewire.front.shop-homepage-component', [
            'shop' => $this->shop,
            'shop_name' => $this->shop_name,
            'products' => $products,
            'prod_categories' => $prod_categories,
        ])->layout("layouts.base");

 

    }
}
