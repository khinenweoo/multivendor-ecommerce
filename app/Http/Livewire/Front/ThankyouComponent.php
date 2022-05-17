<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class ThankyouComponent extends Component
{
    public function render()
    {
        return view('livewire.front.thankyou-component')->layout("layouts.base");
    }
}
