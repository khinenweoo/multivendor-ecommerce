<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30',
        ]);

        $creds = $request->only('email', 'password');

        if(!Auth::attempt($creds)) {
            return back()->with('fail', 'Incorrect email or password');
        }else {
            return redirect()->route('home');
        }
       
    }

    function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30|same:password',
            'phone' => 'nullable'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'phone' =>  $request->phone,
       ]);
   

        if( $user ){
            return redirect()->route('user.login')->with('success', 'You are now registered successfully');
        }else {
            return redirect()->route('user.login')->with('error', 'Something went wrong, fail to register');
        }
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30|same:password',
            'phone' => 'nullable'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'phone' =>  $request->phone,
       ]);

       $creds = $request->only('email', 'password');

       if(Auth::attempt($creds)) {
        return redirect()->route('user.checkout.confirm');
       }else {
            return redirect()->back()->with('error', 'Something went wrong, fail to register');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function destroy()
    {
        Auth::guard('web')->logout();

        return redirect()->route('user.login');
    }
}
