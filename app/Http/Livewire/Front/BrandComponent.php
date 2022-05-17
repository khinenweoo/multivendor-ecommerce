<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class BrandComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $brand_slug;
    public $min_price;
    public $max_price;

    public function mount($brand_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->brand_slug = $brand_slug;
        $this->min_price = 100;
        $this->max_price = 9000;
    }

    public function render()
    {
        $brand = Brand::with('products')->where('brand_slug', $this->brand_slug)->first();
      
        $brand_id = $brand->brand_id;
        $brand_name = $brand->brand_name;

        if($this->sorting == 'date')
        {
            $products = Product::where('brand_id', $brand_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->orderBy('created_at', 'DESC')
            ->paginate($this->pagesize);
        }elseif($this->sorting == 'price')
        {
            $products = Product::where('brand_id', $brand_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->orderBy('price', 'ASC')
            ->paginate($this->pagesize);
        }
        elseif($this->sorting == "price-dsc")
        {
            $products = Product::where('brand_id', $brand_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->orderBy('price', 'DESC')
            ->paginate($this->pagesize);
        }else {
            $products = Product::where('brand_id', $brand_id)
            ->whereBetween('price', [$this->min_price,$this->max_price])
            ->paginate($this->pagesize);
        }
        $all_brands = Brand::with('products')->get();
        return view('livewire.front.brand-component', ['all_brands'=>$all_brands, 'brand_products' => $brand ,'filtered_products' => $products, 'brand_name'=>$brand_name])->layout("layouts.base");
   
    }
}
