<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyStudyOwner extends Notification implements ShouldQueue
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
        $comuser = $this->comment->user->name;
        $studid = $this->comment->study_id;
        return (new MailMessage)
                    ->from('notify@techtalk.com', 'Notify')
                    ->subject('New Comment')
                    ->line($comuser .' has commented on your Study Programme on TechTalk.. ')
                    ->action('Read Study Programme', url('http://127.0.0.1:8000/study/'. $studid))
                    ->line('Thank you for using TechTalk!');
    }

// Mail::send('Html.view', $data, function ($message) {
//     $message->from('john@johndoe.com', 'John Doe');
//     $message->sender('john@johndoe.com', 'John Doe');
//     $message->to('john@johndoe.com', 'John Doe');
//     $message->cc('john@johndoe.com', 'John Doe');
//     $message->bcc('john@johndoe.com', 'John Doe');
//     $message->replyTo('john@johndoe.com', 'John Doe');
//     $message->subject('Subject');
//     $message->priority(3);
//     $message->attach('pathToFile');
// });
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'studycomment' => $this->comment
        ];
    }
}
