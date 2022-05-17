<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;


class ProductComponent extends Component
{
    protected $products;
    protected $seller_products;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'product_id';
    public $orderAsc = 'asc';
    public $deleteId;
    
    public function render()
    {
        
        $this->seller_products = Product::where(['added_by' => 'seller', 'seller_id' => auth('seller')->user()->id])->get();
        
        $this->fetchProducts();
        return view('livewire.seller.product-component', [
            'products' => $this->seller_products
        ]);
    }

    public function fetchProducts() 
    {
        $products = Product::searchData($this->search)
        ->orderBy($this->orderBy, $this->orderAsc)
        ->simplePaginate($this->perPage);
        $this->products = $products;
    }

    public function confirmDelete($product_id)
    {
        $this->deleteId = $product_id;
    }

    public function deleteProduct()
    {
        if ($this->deleteId) {
            Product::find($this->deleteId)->delete();
            session()->flash('message', 'Product Deleted Successfully.');
        }
    }
}
