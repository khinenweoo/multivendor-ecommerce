<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;


class AddProductAttributeComponent extends Component
{
    protected $product;


    public function render()
    {
        return view('livewire.admin.add-product-attribute-component');
    }

}
