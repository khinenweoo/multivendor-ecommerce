<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     *  List shop requests using livewire for admin panel
     *
     * @return view
     */
    public function listShopRequests()
    {
        return view('shop.request');
    }

    /**
     * Display approved shops list by admin
     *
     *
     * @return view
     **/
    public function listApprovedShops()
    {
        return view('shop.approved_shops');
    }


    /**
     * Display Shop request detail
     *
     * @param $shop_slug
     * @return Livewire Component view
     */
    public function viewShopRequest($shop_slug)
    {
        return view('shop.request_detail')->with('slug', $shop_slug);
    }

    /**
     * Shop Detail Edit Form
     *
     *
     * @param $shop_slug
     * @return Livewire Component View
     **/
    public function editShop($shop_slug)
    {
        return view('shop.shop_detail')->with('slug', $shop_slug);
    }

}
