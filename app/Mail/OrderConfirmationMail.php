<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $maildata;
    protected $orderItems, $orderTotal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildata)
    {
        $this->maildata = $maildata;
        $this->orderItems = $maildata['orderItems'];
        $this->orderTotal = $maildata['orderTotal'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank You for Your Order')->markdown('Email.orderConfirmationMail')->with([
            'maildata', $this->maildata,
            'items' => $this->orderItems,
            'ordertotal' => $this->orderTotal,
        ]);
    }
}
