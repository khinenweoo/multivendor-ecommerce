<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the Coupon resource.
     *
     * @return view
     */
    public function index()
    {
        return view('coupon.index');
    }

    /**
     * Display Coupon create form
     *
     * @return Livewire Component view
     */
    public function store()
    {
        return view('coupon.create');
    }

    /**
     * Display Coupon edit form
     *
     * @return Livewire Component view
     */
    public function edit($coupon_id)
    {
        if($coupon_id){
            return view('coupon.edit')->with('id', $coupon_id);
        }

    }

}
