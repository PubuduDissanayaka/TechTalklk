<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\BlogPost;

class NotifyNewBlogPost extends Notification implements ShouldQueue
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
        $this->blogpost=$blogpost;
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
        $id = $this->blogpost->id;
        $bloguser = $this->blogpost->user->name;
        return (new MailMessage)
                    ->from('notify@techtalk.com', 'Notify')
                    ->subject('TechTalk New Blog Post')
                    ->line($bloguser .' has published a new blog post on TechTalk.. ')
                    ->action('Read TechTalk Blog Post', url('http://127.0.0.1:8000/blog-posts/'. $id))
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
            'dataid' => $this->blogpost->id,
            'datatitle' => $this->blogpost->title,
            'datacreatedat' => $this->blogpost->created_at,
            'datauser' => $this->blogpost->user->name,
            'data' => $this->blogpost,
        ];
    }
}
