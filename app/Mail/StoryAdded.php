<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class StoryAdded extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $message;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$message,$url)
    {
       $this->user = $user;
       $this->message = $message;
       $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.StoryAdded',compact('user'));
    }
}
