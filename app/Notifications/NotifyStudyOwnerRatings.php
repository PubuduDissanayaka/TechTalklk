<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyStudyOwnerRatings extends Notification implements ShouldQueue
{
    use Queueable;
    public $studyRating;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studyRating)
    {
        $this->studyRating = $studyRating;
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
        $ratinguser = $this->starratings->user->name;
        $studid = $this->starratings->study_id;
        return (new MailMessage)
                    ->from('notify@techtalk.com', 'Notify')
                    ->subject('New Comment')
                    ->line($ratinguser .' has rated on your Study Programme on TechTalk.. ')
                    ->action('Read Study Programme', url('http://127.0.0.1:8000/study/'. $studid))
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
