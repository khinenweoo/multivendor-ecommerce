<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;

class UpdateOrderComponent extends Component
{
    public $order_id;
    public $order_number, $order_date, $order_status;
    public $customer_name, $email, $phone, $address1, $address2, $city, $state, $postcode, $country;
    public $is_shipping_different, $is_paid;
    public $subtotal, $tax, $discount, $grand_total;


    public function mount($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        $this->order_id = $order->order_id;
        $this->order_id = $order->order_id;
        $this->order_number = $order->order_number;
        $this->order_date = $order->created_at;
        $this->order_status = $order->order_status;
        $this->customer_name = $order->name;
        $this->email = $order->email;
        $this->phone = $order->phone;
        $this->address1 = $order->address1;
        $this->address2 = $order->address2;
        $this->city = $order->city;
        $this->state = $order->state;
        $this->postcode = $order->postcode;
        $this->country = $order->country;
        $this->is_shipping_different = $order->is_shipping_different;
        $this->subtotal = $order->subtotal;
        $this->tax = $order->tax;
        $this->discount = $order->discount;
        $this->grand_total = $order->grand_total; 
    }

    public function render()
    {
        $ordered_items = OrderItem::where('order_id', $this->order_id)->get();
        $shipping = Shipping::where('order_id', $this->order_id)->first();
        return view('livewire.admin.update-order-component', [
            'ordered_items' => $ordered_items,
            'shipping' => $shipping
        ])->layout("layouts.baselayout");
    }

    public function updateOrder()
    {
        
    }
}
