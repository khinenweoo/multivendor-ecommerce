<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the Brand resource.
     *
     * @return view
     */
    public function index()
    {
        return view('brand.index');
    }

}
