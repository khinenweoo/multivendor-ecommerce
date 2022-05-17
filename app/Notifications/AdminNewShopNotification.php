<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Seller;

class AdminNewShopNotification extends Notification
{
    use Queueable;
    private $shoprequestData;
    private $seller;
    private $seller_email;

    /**
     * Create a new notification instance.
     *@param Shop $shop
     * @return void
     */
    public function __construct($shoprequestData)
    {
        $this->shoprequestData = $shoprequestData;
        $this->seller = Seller::where('id', $this->shoprequestData['seller_id'])->first();
        $this->seller_email = $this->seller->email;

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
                    ->subject('New Seller Status')
                    ->from('admin@aeg.com', 'Admin')
                    ->greeting('Hello Admin')
                    ->line('New Seller has been registered at your platform: '. $this->shoprequestData['shop_name']. ' ('.$this->seller_email.')')
                    ->line('Login to your Admin Panel to approve.')
                    ->action('Approve', route('admin.showrequest', $this->shoprequestData['shop_id']));
                    
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
