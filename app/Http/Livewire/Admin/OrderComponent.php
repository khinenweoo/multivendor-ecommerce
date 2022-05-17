<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Livewire\WithPagination;


class OrderComponent extends Component
{
    protected $orders, $order;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'order_id';
    public $orderAsc = 'asc';

    public $editModal = false;
    public $deleteId;

    public $order_id, $order_number, $order_date, $order_status;
    public $customer_name, $email, $phone, $address1, $address2, $city, $state, $postcode, $country;
    public $is_shipping_different, $is_paid;
    public $subtotal, $tax, $discount, $grand_total;


    public function render()
    {
        $orders =  Order::orderBy('created_at', 'DESC')->paginate(12);
        $transactions = Transaction::orderBy('created_at', 'DESC')->get();
    
        return view('livewire.admin.order-component', [
            'orders' => $orders,
            'transactions' => $transactions
        ]);
    }
    /**
     *
     * Show the modal form for editing the Order Resource
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function show($id)
    {
        $order = Order::where('order_id', $id)->first();
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
        $this->editModal = true;

        // Get ordered products of this order
        $order_items = OrderItem::where('order_id', $this->order_id)->first();
      
    }

    

    
}
