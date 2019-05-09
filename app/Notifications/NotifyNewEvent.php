<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Event;

class NotifyNewEvent extends Notification implements ShouldQueue
{
    use Queueable;
    public $event;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
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
        $id = $this->event->id;
        $eventuser = $this->event->user->name;
        return (new MailMessage)
                    ->from('notify@techtalk.com', 'Notify')
                    ->subject('TechTalk New Event')
                    ->line($eventuser . ' has published a new Event on TechTalk.. ')
                    ->action('Read TechTalk Blog Post', url('http://127.0.0.1:8000/events/'. $id))
                    ->line('Thank you for using TechTalk!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'event' => $this->event,
        ];
    }
}
