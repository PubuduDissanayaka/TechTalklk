<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\BlogPost;

class NotifyNewBlogPostDB extends Notification
{
    use Queueable;
    public $blogpost;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($blogpost)
    {
        $this->blogpost = $blogpost;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'dataid' => $this->blogpost->id,
            'datatitle' => $this->blogpost->title,
            'datacreatedat' => $this->blogpost->created_at,
            'datauser' => $this->blogpost->user->name,
            'data' => $this->blogpost,
        ];
    }
}
