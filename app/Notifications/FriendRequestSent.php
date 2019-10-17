<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class FriendRequestSent extends Notification
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
        // return ['mail', 'database'];
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
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
        $link = '<a href="' . url('users/' . Auth::id()) . '">' . Auth::user()->name . '</a>';

        /*if (Auth::user()->sex === 'm') {
            $message =  'Masz zaproszenie do znajomych od użytkownika ';
        } elseif (Auth::user()->sex === 'f') {
            $message = 'Masz zaproszenie do znajomych od użytkowniczki ';
        }*/

        $message = "Masz zaproszenie do znajomych od użytkownika";

        return [
            'message' => $message . $link,
        ];
    }
}
