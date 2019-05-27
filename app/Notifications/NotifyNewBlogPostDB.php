<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\BlogPost;
use App\User;

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
        $user = User::find($this->blogpost->user->id);
        // dd($user);
        return [
            'data' => $this->blogpost,
            'url' => '/blog-posts/' . $this->blogpost->id,
            'message' => $user->name . " has Publoshed New blogpost on Blog Posts",
            'user' => $user,
            'title' => 'New Blog Post',
            'time' => $this->blogpost->created_at->diffForHumans()
        ];
    }

    public function toBroadcast($notifiable)
    {
        $user = User::find($this->blogpost->user->id);

        return [
            'data' =>[
                'data' => $this->blogpost,
                'url' => '/blog-posts/' . $this->blogpost->id,
                'message' => $user->name . " has Publoshed New blogpost on Blog Posts",
                'user' => $user,
                'title' => 'New Blog Post',
                'time' => $this->blogpost->created_at->diffForHumans()
            ]
        ];
    }
}
