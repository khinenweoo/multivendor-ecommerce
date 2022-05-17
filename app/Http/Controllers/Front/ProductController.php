<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function productcategory()
    {
        return view('product.catalog');
    }

    // unused function
    public function productDetail($product_slug)
    {
        // $products = Product::with('attributes')->whereHas('attributes', function ($query) {
        //     $query->where(['attr_name'=>'color']);
        // })->get();

        $product = Product::where('product_slug', $product_slug)->first();


        if($product){
            return view('product.show', compact('product'));
        }else {
            return 'Product not found';
        }
    }
}
