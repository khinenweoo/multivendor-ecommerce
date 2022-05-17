<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Order;
use App\Models\User;
use App\Models\Coupon;

class DashboardController extends Controller
{
    /**
     *  show dashboard page.
     *
     * @return view
     */
    public function index()
    {
        // Get Products Count
        $products = Product::where('status','active')->get();
        $products_count = $products->count();

        // Get Orders Count
        $orders = Order::where('order_status','pending')->get();
        $orders_count = $orders->count();

        // Get Shops Count
        $shops = Shop::where('is_active', 0)->get();
        $shops_count = $shops->count();

        // Get Categories Count
        $categories = Category::where('status','active')->get();
        $categories_count = $categories->count();

        // Get User Count
        $users = User::where('approved', 1)->get();
        $users_count = $users->count();

        // Get Brands Count
        $brands = Brand::where('status','active')->get();
        $brands_count = $brands->count();

        // Get Coupons Count
        $coupons = Coupon::all();
        $coupons_count = $coupons->count();

        return view('home')->with(compact('products_count','orders_count','shops_count','users_count','categories_count', 'brands_count','coupons_count'));
    }
}
