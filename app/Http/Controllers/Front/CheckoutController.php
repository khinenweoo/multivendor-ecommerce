<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Checkout Page view
     *
     *
     **/
    public function index(Type $var = null)
    {
        return view('checkout.index');
    }
}
