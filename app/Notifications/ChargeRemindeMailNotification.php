<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChargeRemindeMailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $wallet;
    public $user;
    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->user = $wallet->user;
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
                    ->from(env('NO_REPLY'),env('APP_NAME'))
                    ->subject('یادآوری شارژ کیف پول')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Dear '.$this->user->name)
                    ->line('Your wallet charge is '.$this->wallet->charge)
                    ->line('Please Charge Your Wallet Asep!');
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
