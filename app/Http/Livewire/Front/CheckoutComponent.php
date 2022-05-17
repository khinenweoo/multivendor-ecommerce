<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use Cart;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;


class CheckoutComponent extends Component
{
    public $ship_to_different;
    public $set_primary_address;
    public $user_id;
    public $name, $phone, $lastname, $email, $city, $state, $country, $postcode, $address;
    public $s_name;
    public $s_lastname;
    public $s_phone;
    public $s_email;
    public $s_city;
    public $s_state;
    public $s_country;
    public $s_postcode;
    public $s_address;
    public $cash;
    // public $paymentmode;
    public $thankyou;

    public $totalSteps = 2;
    public $currentStep = 1;

    public $payment_type = "";


    public function mount()
    {
        $this->currentStep = 1;
        $this->user_id = Auth::user()->id;
        $user = User::where('id', $this->user_id)->first();
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->city = $user->city;
        $this->state = $user->state;
        $this->postcode = $user->postcode;
        $this->country = $user->country;
        $this->address = $user->address;
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.front.checkout-component')->layout("layouts.base");
    }

    public function saveAddress()
    {
       
        $this->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'postcode' => 'required|string',
            'address' => 'required|string',
        ]);       
        $updatedata = [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'postcode' => $this->postcode,
            'address1' => $this->address,
        ];

        
        if($this->set_primary_address){
            $updateuser = User::updateOrCreate(['id' => $this->user_id], $updatedata);
            session()->flash('message', 'This billing address is successfully saved as your primary address.');
        }else{
            session()->flash('message', 'The billing address saved successfully.');
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'city' => 'required|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'postcode' => 'nullable|string',
            'address' => 'required|string',
            'payment_type' => 'required'
        ]);   

        $order = new Order();
        $order->order_number = $this->generateOrderNumber();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->grand_total = session()->get('checkout')['total'];
        $order->name = $this->name;
        $order->last_name = 'null';
        $order->email = $this->email;
        $order->phone = $this->phone;
        $order->country = $this->country;
        $order->state = $this->state;
        $order->city = $this->city;
        $order->postcode = $this->postcode;
        $order->address1 = $this->address;
        $order->address2 = 'null';
        $order->order_status = 'pending';
        if($this->ship_to_different == null){
            $order->is_shipping_different = false;
        }else{
            $order->is_shipping_different = true;
        }
        $order->save();
  
        foreach(Cart::content() as $item){
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->order_id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
     
        if($this->ship_to_different)
        {
            $this->validate([
                's_name' => 'required|string',
                's_lastname' => 'required|string',
                's_email' => 'required|email',
                's_phone' => 'required|numeric',
                's_country' => 'required|string',
                's_state' => 'required|string',
                's_city' => 'required|string',
                's_postcode' => 'required|string',
                's_address' => 'required|string',
            ]); 
            
            $shipping = new Shipping();
            $shipping->order_id = $order->order_id;
            $shipping->name = $this->s_name;
            $shipping->lastname = $this->s_lastname;
            $shipping->email = $this->s_email;
            $shipping->phone = $this->s_phone;
            $shipping->country = $this->s_country;
            $shipping->state = $this->s_state;
            $shipping->city = $this->s_city;
            $shipping->postcode = $this->s_postcode;
            $shipping->address1 = $this->s_address;
            $shipping->save();
        }

        if($this->payment_type == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->order_id;
            $transaction->payment_method = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        $this->thankyou = 1;
        Cart::destroy();
        session()->forget('checkout');
    }

    public function generateOrderNumber()
    {
        $latestorders = Order::orderBy('created_at', 'DESC')->first();
        if($latestorders){
            return 'ORD-' . str_pad($latestorders->order_id + 1 , 6, "0", STR_PAD_LEFT);
        }else {
            return 'ORD-' . str_pad( 1 , 6, "0", STR_PAD_LEFT);
        }
    }

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        } elseif($this->thankyou) {
            return redirect()->route('user.thankyou');
        }elseif(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }
    public function validateData()
    {
        if($this->currentStep == 1){
            $this->validate([
                'name' => 'required|string',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'city' => 'required|string',
                'state' => 'required|string',
                'country' => 'required|string',
                'postcode' => 'required|string',
                'address' => 'required|string',
            ]);         
        }
    }

    public function increaseStep()
    {
        $this->resetErrorBag();// This method clear the error bag.
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }


}
