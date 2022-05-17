<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
                        //Get Featured Categories
                        $featured_categories = Category::where('is_featured',1)->limit(12)->orderBy('id','DESC')->get();

                        //Get Hot Deal Stores
                        $active_stores = Shop::where('is_active', 1)->inRandomOrder()->get()->take(10);
                
                        // Get Featured Stores which are active and not beyond expiry date
                        $current_time = Carbon::now();
                        $query = DB::table('shops');
                        $query->where('is_active', '=', 1);
                        $query->where('featured_expiry_date', '>', $current_time);
                        $featured_stores = $query->get();
                
                        //Get parent Categories
                        $categories = Category::whereNull('parent_id')->get();
                
                        //Get Latest Products
                        // $new_products = Product::orderBy('created_at','DESC')->get()->take(20);
                        $new_products = Product::where(['conditions' => 'new', 'status' => 'active'])->limit(20)->get();
                
                        //Trending Products
                        $trending_products = Product::where(['conditions' => 'popular', 'status'=> 'active'])->limit(20)->get();
                
                        //Recommended Products
                        $recommend_products = Product::where(['conditions' => 'recommend', 'status'=> 'active'])->limit(20)->get();
                
                        //Default Products for top ranked section
                        $default_products = Product::where('status', 'active')->limit(20)->get();


        return view('home')->with(compact('featured_categories','active_stores','featured_stores','categories','new_products', 'trending_products','recommend_products', 'default_products'));
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function FunctionName(Type $var = null)
    {
        # code...
    }
    
 
}
