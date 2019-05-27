<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class NotifyBlogPostOwnerDB extends Notification
{
    use Queueable;

    public $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
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
        $user = User::find($this->comment->user_id);
        return [
            'data' => $this->comment,
            'url' => '/blog-posts/' . $this->comment->post_id,
            'message' => "New comment on your Blog Post",
            'user' => $user,
            'title' => 'New Comment',
            'time' => $this->comment->created_at->diffForHumans()
        ];
    }

    public function toBroadcast($notifiable)
    {
        $user = User::find($this->comment->user_id);

        return [
            'data' =>[
                'data' => $this->comment,
                'url' => '/blog-posts/' . $this->comment->post_id,
                'message' => "New comment on your Blog Post",
                'user' => $user,
                'title' => 'New Comment',
                'time' => $this->comment->created_at->diffForHumans()
            ]
        ];
    }
}
