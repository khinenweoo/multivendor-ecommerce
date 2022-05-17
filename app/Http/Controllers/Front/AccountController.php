<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AccountController extends Controller
{
    protected $user;
    public $user_profile;

    /**
     *  show profile page.
     *
     * @return view
     */
    public function dashboard()
    {
        return view('account.dashboard');
    }

    /**
     *  show profile page.
     *
     * @return view
     */
    public function profile()
    {
        // $address = $user->address;
        
        if(Auth::user()->birth_date){
            $user_birth_date = Carbon::createFromFormat('Y-m-d', Auth::user()->birth_date)->format('d-m-Y');

            return view('account.profile')->with(compact('user_birth_date'));
        }else{
            return view('account.profile');
        }

    }

    /**
     *  show profile page.
     *
     * @return view
     */
    public function passwordForm()
    {
        // $address = $user->address;
        return view('account.password');
    }

    /**
     *
     * Update User Profile information
     *
     * @param int $id
     * @return message
     * @throws 
     **/
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $this->user_profile = $user->profile_photo;
        // image save
        if($request->profile_photo){

            $profileImage = date('YmdHis') . "." . $request->profile_photo->getClientOriginalExtension();

            $request->profile_photo->move(public_path('users'), $profileImage);
        }else {
            $profileImage = $this->user_profile;
        }
        // change date format to save in sql
        $user_birthdate = Carbon::createFromFormat('d-m-Y', $request->birth_date)->format('Y-m-d');

        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile_photo' => $profileImage,
            'birth_date' => $user_birthdate,
            'gender' => $request->gender,
            'about' => $request->about
        ]);


        if(!$user){
            return back()->with('error', 'Something went wrong');
        }else {
            return back()->with('success','Your profile is successfully updated.');
        }
   
    }

    /**
     * Profile Image Upload
     *
     * @return string
     **/
    public function imageUpload($image)
    {
        $image_name = Str::random(15);
        $extension = strtolower($image->getClientOriginalExtension());
        $imageFullName = $image_name.'.'.$extension;

        return $imageFullName;
    }

    /**
     *
     * Update User Password
     *
     * @param int $id
     * @return message
     * @throws 
     **/
    public function updatePassword(Request $request, $id)
    {
        $hashpassword = Auth::user()->password;
        
        if(\Hash::check($request->oldpassword, $hashpassword)) {
            if(!\Hash::check($request->newpassword, $hashpassword)) {

                User::where('id', $id)->update(['password' => \Hash::make($request->newpassword)]);
                return  redirect()->route('user.password')->with('success', 'Password successfully updated.');
            }else{
                return  redirect()->route('user.password')->with('error','New password can not be same with old password');
            }
        }else{
            return redirect()->route('user.password')->with('error', 'Old password does not match');
        }

    }
    
    /**
     *  show orders of user.
     *
     * @return view
     */
    public function myOrders()
    {
        // $user = $this->user->findOrFail(auth()->id());
        // $orders = $user->orders;
        // return view('account.orders', compact('orders'));
        return view('account.orders');
    }

    /**
     *  show Address of user.
     *
     * @return view
     */
    public function userAddress()
    {
        // $user = $this->user->findOrFail(auth()->id());
        // $orders = $user->orders;
        // return view('account.orders', compact('orders'));
        return view('account.address');
    }
}
