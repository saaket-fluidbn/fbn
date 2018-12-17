<?php

namespace App\Studio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Balping\HashSlug\HasHashSlug;
class StudioStories extends Model
{
    
   use Notifiable;
   use HasHashSlug;
   
   protected static $minSlugLength = 10;
   
   public function storyOfGenre(){
       return $this->belongsTo('App\Genre','genre_id');
   }
   public function likedByFs(){
    return $this->belongsToMany('App\User','likeFs','story_id','user_id')->withTimestamps();
}
   
}
