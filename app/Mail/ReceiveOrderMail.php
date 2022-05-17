<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiveOrderMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $orderNumber, $orderDate, $orderTotal, $deliveryAddress;
    protected $orderItems, $buyerName, $buyerMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderData)
    {
        $this->orderNumber = $orderData['orderNo'];
        $this->orderDate = $orderData['orderDate'];
        $this->orderTotal = $orderData['orderTotal'];
        $this->orderItems = $orderData['orderItems'];
        $this->deliveryAddress = $orderData['orderAddress'];
        $this->buyerName = $orderData['buyer'];
        $this->buyerMail = $orderData['buyerMail'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New order has received')->markdown('emails.receiveOrderMail')->with([
            'buyerName' => $this->buyerName,
            'buyerMail' => $this->buyerMail,
            'orderNo' => $this->orderNumber,
            'orderDate' => $this->orderDate,
            'total' => $this->orderTotal,
            'items' => $this->orderItems,
            'address' => $this->deliveryAddress,
        ]);

    }
}
