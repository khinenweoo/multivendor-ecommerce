<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     *  show user resources using livewire for admin panel
     *
     * @return view
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     *  show user edit component for admin panel
     *
     * @return view
     */
    public function edit($user_id)
    {
        if($user_id){

            return view('user.edit')->with('id', $user_id);
        }

    }
}
