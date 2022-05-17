<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Seller;

class SellerApprovedNotification extends Notification
{
    use Queueable;
    private $shopData;
    private $seller_name;
    private $seller;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($shopData)
    {
        $this->shopData = $shopData;
        $this->seller =Seller::where('id', $shopData['seller_id'])->first();
        $this->seller_name = $this->seller->name;
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
                    ->subject('Account approved at Proud of Myanmar')
                    ->from('admin@aeg.com', 'Proud of Myanmar')
                    ->greeting('Hi '.$this->seller_name.',')
                    ->line('Your shop account has been approved.')
                    ->action('Please, check it out', route('seller.login'))
                    ->line('Thank you for using our application!');
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
