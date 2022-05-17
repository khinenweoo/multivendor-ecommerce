<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the Category resource.
     *
     * @return view
     */
    public function index()
    {
        return view('category.index');
    }

    public function showSub()
    {
        return view('category.index');
    }
}
