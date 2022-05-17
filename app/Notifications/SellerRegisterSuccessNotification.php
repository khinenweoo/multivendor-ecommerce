<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Seller;

class SellerRegisterSuccessNotification extends Notification
{
    use Queueable;
    private $sellerData;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sellerData)
    {
        $this->sellerData = $sellerData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Registration success at Proud of Myanmar')
        ->from('admin@aeg.com', 'Proud of Myanmar')
        ->greeting('Hi '.$this->sellerData['name'].',')
        ->line('Thanks for signing up. Welcome to our platform. We are delighted to have you with us.')
        ->line('Check back later after we send you account approval email.')
        ->action('Login to your account', route('seller.login'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
