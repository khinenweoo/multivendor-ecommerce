<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Attribute;

class ProductAttributeComponent extends Component
{
    protected $product;
    public $deleteId;

    public function mount($id)
    {
        $attr_product = Product::where('product_id', $id)->first();
        $this->product =$attr_product;
    }

    public function render()
    {
        return view('livewire.admin.product-attribute-component', ['product'=>$this->product]);
    }

    public function confirmDelete($attr_id)
    {
        $this->deleteId = $attr_id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            $attr = Attribute::find($this->deleteId);
            $attr->attributeValues()->delete();
            $attribute = $attr->delete();
            session()->flash('message', 'Attribute Deleted Successfully.');
        }
    }
}
