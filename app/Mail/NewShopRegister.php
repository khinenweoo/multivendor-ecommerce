<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewShopRegister extends Mailable
{
    use Queueable, SerializesModels;

    protected $shop_name, $shop_email, $register_person;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shop_name,$register_person,$shop_email)
    {
        $this->shop_name = $shop_name;
        $this->register_person = $register_person;
        $this->shop_email = $shop_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->shop_email)->subject('New shop account has been registered!')->view('emails.NewShopRegister')->with([
            'shopname' => $this->shop_name,
            'selleremail' => $this->shop_email,
            'sellername' => $this->register_person,
        ]);
    }
}
