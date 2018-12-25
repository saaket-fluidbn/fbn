<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Article;
class StoryAdded extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $article;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,Article $article,$url)
    {
       $this->user = $user;
       $this->article = $article;
       $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        
        ->subject('Story Time')
        ->markdown('emails.StoryAdded',compact('user'));
    }
}
