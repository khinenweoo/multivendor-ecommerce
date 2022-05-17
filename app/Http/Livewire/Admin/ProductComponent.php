<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductComponent extends Component
{
    protected $products;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'product_id';
    public $orderAsc = 'asc';

    public $updateMode = false;
    public $deleteId;

    public function render()
    {
        $this->fetchProducts();
        return view('livewire.admin.product-component', [
            'products' => $this->products
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

            // toastr()->success('Product Deleted Successfully!');
            session()->flash('message', 'Product Deleted Successfully.');
        }
    }
}
