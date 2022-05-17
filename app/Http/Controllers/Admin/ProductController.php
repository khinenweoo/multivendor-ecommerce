<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the Product resource.
     *
     * @return Livewire Component view
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Display product create form
     *
     * @return Livewire Component view
     */
    public function add()
    {
        return view('product.add');
    }

    /**
     * Display product edit form
     *
     * @param $product_slug
     * @return Livewire Component view
     */
    public function edit($product_slug)
    {
        if($product_slug){

            return view('product.edit')->with('slug', $product_slug);
        }
    }
}
