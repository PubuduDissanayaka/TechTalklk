<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\user;

class NotifyNewVacancyDB extends Notification
{
    use Queueable;

    public $vac;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vac)
    {
        $this->vac = $vac;
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
        $user = User::find($this->vac->user->id);
        // dd($user);
        return [
            'data' => $this->vac,
            'url' => '/vacancy/' . $this->vac->id,
            'message' => $user->name . " has Publoshed New Job Vacancy on Job Market",
            'user' => $user,
            'title' => 'New Job vacancy',
            'time' => $this->vac->created_at->diffForHumans()
        ];
    }

    public function toBroadcast($notifiable)
    {
        $user = User::find($this->vac->user->id);
        return [
            'data' =>[
                'data' => $this->vac,
                'url' => '/vacancy/' . $this->vac->id,
                'message' => $user->name . " has Publoshed New Job Vacancy on Job Market",
                'user' => $user,
                'title' => 'New Job vacancy',
                'time' => $this->vac->created_at->diffForHumans()
            ]
        ];
    }
}
