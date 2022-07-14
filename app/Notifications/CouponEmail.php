<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CouponEmail extends Notification implements ShouldQueue
{
    use Queueable;



    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->from('mckaymaclab@byui.edu', 'Hogwarts')
                    ->subject('Welcome to house ' . $notifiable->team->name. '!')
                    ->greeting('Hello ' . $notifiable->first_name . '!')
                    ->line('Show your house spirit by purchasing Harry Potter gear from the bookstore.')
                    ->action('Redeem 25% Off Coupon', route('coupon'))
                    ->line('(Valid on any Harry Potter items October 1st - 12th)');
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
