<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\NotesClass;


class NewNote extends Notification
{
    use Queueable;

    //public $user;
    public $notes;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    //public function __construct($user)
    public function __construct($notes)
    {
        $this->notes = $notes;
        //$this->user = $user;
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
            'note_id' => $this->notes->id,
            'note_text' => $this->notes->text,
            'student_id' => $this->notes->student_id,
            //'user_id' => $this->user->id,
            //'user_name' => $this->user->name,

        ];
    }
}
