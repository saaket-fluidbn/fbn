<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use App\Article;
use App\Mail\StoryAdded;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
protected $user;
//protected $article;
//protected $url;
//protected $allFollowers;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
       $this->user = $user;
      // $this->article = $article;
      // $this->url = $url;
     //  $this->allFollowers = $allFollowers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new StoryAdded());
    }
}
