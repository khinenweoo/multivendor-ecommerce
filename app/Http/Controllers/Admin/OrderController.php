<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the Orders
     *
     * @return view
     */
    public function index()
    {
        return view('order.index');
    }

}
