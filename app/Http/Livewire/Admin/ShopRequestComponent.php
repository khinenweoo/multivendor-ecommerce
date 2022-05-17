<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Shop;
use Livewire\WithPagination;

class ShopRequestComponent extends Component
{
    protected $shop_requests;
    public $deleteId;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'shop_id';
    public $orderAsc = 'asc';

    public function render()
    {
        $this->fetchShopRequests();
        return view('livewire.admin.shop-request-component', [
            'shop_requests' => $this->shop_requests
        ]);

    }

    public function fetchShopRequests() 
    {
        $shop_requests = Shop::searchRequests($this->search)
        ->where('is_active', false)
        ->orderBy($this->orderBy, $this->orderAsc)
        ->simplePaginate($this->perPage);
        $this->shop_requests = $shop_requests;
    }
}
