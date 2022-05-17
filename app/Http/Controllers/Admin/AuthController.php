<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
 
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:30',
        ]);
        if(!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return back()->with('error', 'Incorrect email or password');
        }
        return redirect()->intended(route('admin.home'));
    }


    function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30|same:password'
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
       ]);


        if( $admin ){
            return redirect()->route('admin.login')->with('success', 'You are now registered successfully');
        }else {
            return redirect()->route('admin.login')->with('error', 'Something went wrong, fail to register');
        }
    }
    public function destroy()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}