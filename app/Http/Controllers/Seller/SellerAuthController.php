<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;

class SellerAuthController extends Controller
{
    /**
     * Display Seller Register Form
     *
     * @return view
     */
    public function createForm()
    {
        return view('auth.register');
    }

    /**
     * Display Register Success Page
     *
     * @return view
     */
    public function successPage()
    {
        return view('register-success');
    }



    public function check(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:30',
        ]);
        $creds = $request->only('email', 'password');
        if(!Auth::guard('seller')->attempt($creds, $request->filled('remember'))) {
            return redirect()->route('seller.login')->with('error', 'Incorrect email or password');
   
        }else {
            return redirect()->route('seller.home');
        }
    }
    function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:sellers,email',
            'password' => 'required|min:8|max:30',
            'cpassword' => 'required|min:8|max:30|same:password'
        ]);

        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        if( $seller ){
            return redirect()->route('seller.login')->with('success', 'You are now registered successfully');
        }else {
            return redirect()->route('seller.login')->with('error', 'Something went wrong, fail to register');
        }
    }
    public function destroy(){
        Auth::guard('seller')->logout();

        return redirect()->route('seller.login');
    }
}