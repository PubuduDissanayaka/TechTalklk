<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyNewVacancy extends Notification implements ShouldQueue
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
        $id = $this->vac->id;
        $vacuser = $this->vac->user->name;
        return (new MailMessage)
                    ->from('notify@techtalk.com', 'Notify')
                    ->subject('TechTalk New Job Vacancy')
                    ->line($vacuser .' has published a new job vacancy on TechTalk.. ')
                    ->action('Read TechTalk Vacancy', url('http://127.0.0.1:8000/vacancy/'. $id))
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
            'vacancy' => $this->vac
        ];
    }
}
