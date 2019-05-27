<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class NotifyNewEventDB extends Notification
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
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $user = User::find($this->event->user->id);
        // dd($user);
        return [
            'data' => $this->event,
            'url' => '/events/' . $this->event->id,
            'message' => $user->name . " has Publoshed New event on events",
            'user' => $user,
            'title' => 'New event',
            'time' => $this->event->created_at->diffForHumans()
        ];
    }

    public function toBroadcast($notifiable)
    {
        $user = User::find($this->event->user->id);

        return [
            'data' =>[
                'data' => $this->event,
                'url' => '/events/' . $this->event->id,
                'message' => $user->name . " has Publoshed New event on events",
                'user' => $user,
                'title' => 'New event',
                'time' => $this->event->created_at->diffForHumans()
            ]
        ];
    }
}
