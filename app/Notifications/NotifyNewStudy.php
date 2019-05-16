<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyNewStudy extends Notification implements ShouldQueue
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
        $id = $this->study->id;
        $studyuser = $this->study->user->name;
        return (new MailMessage)
                    ->from('notify@techtalk.com', 'Notify')
                    ->subject('TechTalk New Study Programme')
                    ->line($studyuser .' has published a new Study Programme on TechTalk.. ')
                    ->action('Read TechTalk Study Program', url('http://127.0.0.1:8000/study/'. $id))
                    ->line('Thank you for using TechTalk!');
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
