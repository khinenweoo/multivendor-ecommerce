<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
class StoreController extends Controller
{
    /**
     * Show the Vendor List
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        return view('store.list');
    }

    /**
     * Show the Shop Home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($shop_slug)
    {
        $shop = Shop::where('shop_slug', $shop_slug)->first();

        if($shop){
            return view('shop.home', compact('shop'));
        }else {
            return 'Shop not found!';
        }
    }

    /**
     * Show the Shop Profile page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('store.profile');
    }

    /**
     * Show the Shop Products page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    {
        return view('store.products');
    }

    /**
     * Show Local Market Vendor List 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function listShops()
    {
        //Get Hot Deal Stores
        $active_shops = Shop::where('is_active', 1)->get();
        return view('market.local-shops', compact('active_shops'));
    }
}
