<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopProfileController extends Controller
{
    /**
     * Display banner form upload
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner.index');
    }

    /**
     * Seller Profile Edit
     *
     * @return \Illuminate\Http\Response
     */
    public function editUserProfile()
    {
        return view('profile.edit');
    }

}
