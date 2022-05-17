<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     /**
     * Display a listing of the Blog resource.
     *
     * @return view
     */
    public function index()
    {
        return view('blog.index');
    }
}
