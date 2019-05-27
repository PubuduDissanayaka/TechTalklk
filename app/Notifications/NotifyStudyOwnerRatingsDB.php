<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class NotifyStudyOwnerRatingsDB extends Notification
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

    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        // dd($this->studyRating->user_id);
        $user = User::find($this->studyRating->user_id);
        return [
            'data' => $this->studyRating,
            'url' => '/study/' . $this->studyRating->post_id,
            'message' => "New Rating on your Study Plan",
            'user' => $user,
            'title' => 'New Rating',
            'time' => $this->studyRating->created_at->diffForHumans()
        ];
    }

    public function toBroadcast($notifiable)
    {
        $user = User::find($this->studyRating->user_id);

        return [
            'data' =>[
                'data' => $this->studyRating,
                'url' => '/study/' . $this->studyRating->post_id,
                'message' => "New Rating on your Study Plan",
                'user' => $user,
                'title' => 'New Rating',
                'time' => $this->studyRating->created_at->diffForHumans()
            ]
        ];
    }
}
