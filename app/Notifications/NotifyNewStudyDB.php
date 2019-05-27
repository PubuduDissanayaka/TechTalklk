<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class NotifyNewStudyDB extends Notification
{
    use Queueable;
    public $study;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($study)
    {
        $this->study = $study;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $user = User::find($this->study->user->id);
        // dd($user);
        return [
            'data' => $this->study,
            'url' => '/study/' . $this->study->id,
            'message' => $user->name . " has Publoshed New Study Plan on Study",
            'user' => $user,
            'title' => 'New study Plan',
            'time' => $this->study->created_at->diffForHumans()
        ];
    }

    public function toBroadcast($notifiable)
    {
        $user = User::find($this->study->user->id);

        return [
            'data' =>[
                'data' => $this->study,
                'url' => '/study/' . $this->study->id,
                'message' => $user->name . " has Publoshed New Study Plan on Study",
                'user' => $user,
                'title' => 'New study Plan',
                'time' => $this->study->created_at->diffForHumans()
            ]
        ];
    }
}
