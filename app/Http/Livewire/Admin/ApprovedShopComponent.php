<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Shop;
use Livewire\WithPagination;

class ApprovedShopComponent extends Component
{
    protected $shops;
    protected $approved_shops;
    public $search = '';
    public $perPage = 15;
    public $orderBy = 'shop_id';
    public $orderAsc = 'asc';


    public function render()
    {
        // $this->approved_shops = Shop::where(['is_active' => true])->get();
        $this->fetchShops();
        return view('livewire.admin.approved-shop-component', [
            'approved_shops' => $this->approved_shops
        ]);
    }

    public function fetchShops() 
    {
        $shops = Shop::searchShops($this->search)
        ->where('is_active', true)
        ->orderBy($this->orderBy, $this->orderAsc)
        ->simplePaginate($this->perPage);
        $this->approved_shops = $shops;
    }
}
