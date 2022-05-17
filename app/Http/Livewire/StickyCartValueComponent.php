<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StickyCartValueComponent extends Component
{
    protected $listeners = ['cartvalue-refresh' => '$refresh'];
    public function render()
    {
        return view('livewire.sticky-cart-value-component');
    }
}
