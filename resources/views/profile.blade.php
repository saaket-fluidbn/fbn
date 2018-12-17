@extends('layouts.main')
@section('title')
{{ucfirst($user->fname)."'s Profile"}} | fluidbN

@endsection

@section('content')

      
<div class="container box">
            
        <div class="row featurette">
           

               @auth 
               @php
               $follow = Auth::user()->follows()->wherePivot('follower_id',Auth::user()->id)->wherePivot('following_id',$user->id)->first();
                
               @endphp
               @endauth
                @php
               
                if($followers>1)
                $f= 'followers';
                
                else
                $f = 'follower';
                @endphp
                 <div class="col-md-5">
                 <div class="container1">
                
                 
               
                       
                 <img class="featurette-image img-fluid" style="box-shadow:5px 5px 5px #888888;" src="/storage/profile_images/{{$user->hasProfile->profile_image}}" alt="">
                
                
                 
                  <div class="middle box">
                   @if(Auth::user()->id==$user->id)
        <button class="btn btn-login" onclick="location.href='{{route('settings')}}'">Update pic</button>
                  @endif
                  </div>
                  
                  </div>
                  </div>
                  <div class="col-md-5">
                  <div class="container">
                    <h5 class="homewriter" style="color:black;">{{ucfirst($user->fname)}}
                      {{ucfirst($user->lname)}}
                  </h5>
                  <p class="margin writer">{{$user->hasProfile->about }}</p>
              
        <p class="writer"> @if($user->hasProfile->education != null && $user->hasProfile->yos != null && $user->hasProfile->college != null){{$user->hasProfile->education." ".$user->hasProfile->yos.' student @ '. $user->hasProfile->college}}@endif</p>
         <p class="writer"> @if($user->hasProfile->startup != null){{'Student startup : '.ucfirst($user->hasProfile->startup)}}@endif</p>
         <p class="writer"> @if($user->hasProfile->designation != null){{$user->hasProfile->designation .' @ '. $user->hasProfile->company}}@endif</p>
         
          @if($followers!=0)<button  class="btn btn-login" style="margin-top:7px;padding-top:6px;padding-bottom:6px;" data-toggle="modal" data-target="#follow"><small class="pro_info" id="followers">{{$followers.' '.$f.'  '}} </small></button>
                                 @endif <br/>
       
               
                </div>  
                </div>
                 <!-- The Modal -->
           <div class="modal fade" id="follow">
             <div class="modal-dialog modal-md">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                       <div class="imgcontainer">
                                       @if(Auth::user()->id==$user->id)
                                       <h3 style="font-weight:40%;">See who follows you</h3>
                                       @else
                                       <h3 style="font-weight:40%;">See who follows {{ucfirst($user->fname)}}</h3>
                                    @endif
                                   </div>
               
                
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 
                 <!-- Modal body -->
                 <div class="modal-body">
                  
                  @if(count($follows)>0)
                  <div class="row">
                     
                     @foreach($follows as $f)
                     
                     <div class="col-sm-4">
                     <a href="{{route('profile',['user'=>$f,'slug'=>str_slug($f->fname." ".$f->lname)])}}">
                     <img class="featurette-image img-fluid mx-auto propic-small" src="/storage/profile_images/thumbnails/{{$f->hasProfile->profile_image}}" alt="">
                     <small class="writer"> {{ucfirst($f->fname).' '.ucfirst($f->lname) }}</small>
                     </a>
                     </div>
                     @endforeach
                     
                     </div> 
                       @endif
                                 </div>
                                  @if(count($follows)>21)
                                   <div class="modal-footer">
                       <div class="imgcontainer">
                                       
                                       <a href="">
                                             @if(Auth::user()->id==$user->id)
                                       <h3 style="font-weight:40%;">See all of your followers</h3>
                                       @else
                                       <h3 style="font-weight:40%;">See all followers of {{ucfirst($user()->fname)}}</h3>
                                       @endif
                                       </a>
                                      
                                   </div>
                                  </div>
                                   @endif
                               </div>     
                             </div>
                            </div>     
                 
                     
    </div>

 

              
                     
              </div> 
              
              {{-- follow & story choice button--}}
              <div class="container">
              <div class="row">
                  
                        @if(Auth::user()->id!=$user->id)<button class="btn btn-login box fol" id="" data-userid="{{$user->id}}"
                        
                        style="margin-left:5px;">{{$follow?"Following":"Follow"}}</button> 
                        
                           <button class="btn  btn-login box " onclick="location.href='{{route('user-categories',['user'=>$user,'slug'=>str_slug($user->fname.".".$user->lname)])}}'"  style="margin-left:5px;">
{{ucfirst($user->fname)."' story choices"}}</button>

@endif

                     
                  </div>
                
                   
                   
                    
             
                  
                 
                
                      
                    
                          <table class="table table-bordered table-hover">
                
                    <tbody id="fol_sugg">
                    
                    </tbody>
                     
                    </table>
                    </div>
                  <hr class="">
                  <div class="container">
                   <div class="lower-margin" style="text-align:center;">
                                 <h1 class="featurette-heading">@if(Auth::user()->id==$user->id) {{"Your stories"}}
                                 @else 
                                {{"All stories by ".ucfirst($user->fname)}}@endif</h1>
                                   </div>
                             
                                 
                                @if(count($article)>0)
                                
                               <div class="infinite-story">
                                <div class="row" style="">
                                        @foreach ( $article as $a )
                                           
                                                  
   <div class="col-md-6">
                    <a href="{{route('stories-genre',['genre'=>$a->ofGenre])}}" <small class="genre-feed">{{ucfirst($a->ofGenre->name)}}</small></a>
                    <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin featured-article">
                        
                      <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
                    
                      <div class="container-related featured-article">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                         @php
                          $wows = $a->likedBy()->wherePivot('article_id',$a->id)->count();
                          if($wows==0)
                          $w = '';
                          else if($wows==1)
                          $w = '  '.$wows.' wow';
                          else
                          $w = '  '.$wows.' wows';
                          

                       @endphp
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                     
                        <small class="views">{{$w}}</small>

                     
                      </div>
                    </div>
                    
                  </a>
                    </div>    
                                                  
                                            
                                        @endforeach
                                      
                                     </div>
                                     {{$article->links()}}
                                     </div>
                                     
                                     
                   @elseif(Auth::user()->id == $user->id)
                
                        <h2 class="featurette-heading-feed" style="color:black;">{{ucfirst($user->fname).' looks like you haven\'t created any story...'}} <a href="{{route('write')}}">Create one !</a></h2>
                   @else        
                   <h2 class="featurette-heading-feed" style="color:black;">{{'Sorry currently no stories from '.ucfirst($user->fname).' but sure to come till then...'}}<a href="{{route('feed')}}">Explore fluidbN !</a></h2>
                      
                 
                     @endif
                     
                     {{--theories of user--}}
                     
                       <div class="lower-margin" style="text-align:center;">
                                 <h1 class="featurette-heading">@if(Auth::user()->id==$user->id) {{"Your theories"}}
                                 @else 
                                {{"All theories by ".ucfirst($user->fname)}}@endif</h1>
                                   </div>
                             
                                 
                                @if(count($theory)>0)
                                
                               <div class="infinite-theory">
                                <div class="row" style="">
                                        @foreach ( $theory as $a )
                                           
                                                  
                                                    <div class="col-md-6">
                                                          <a href="{{route('show-theory',['theory'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin featured-article">
                        
                     
                      <div class="container-related featured-article">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                        
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                       
                        
                      </div>
                    </div>
                    
                  </a>
                                                   
                                                     </div>  
                                                  
                                            
                                        @endforeach
                                      
                                     </div>
                                    {{$theory->links()}}
                                     </div>
                                     
                                   
                   @elseif(Auth::user()->id == $user->id)
                
                        <h2 class="featurette-heading-feed" style="color:black;">{{ucfirst($user->fname).' looks like you haven\'t shared any theory...'}} <a href="{{route('write-theory')}}">Share !</a></h2>
                   @else        
                   <h2 class="featurette-heading-feed" style="color:black;">{{'Sorry currently no theories from '.ucfirst($user->fname).' but sure to come till then...'}}<a href="{{route('feed')}}">Explore fluidbN !</a></h2>
                      
                 
                     @endif
                     
                     {{--end theories--}}
                     
                      @if(count($liked_articles)>0)
                                 <div class="lower-margin" style="text-align:center;">
                               <h1 class="featurette-heading">@if(Auth::user()->id==$user->id) {{"Stories you liked"}}
                                 @else 
                                {{"Stories liked by ".ucfirst($user->fname)}}@endif</h1>
                                </div>
                                
                                
                                <div class="infinite-liked">
                                <div class="row" style="">
                                        @foreach ( $liked_articles as $a )
                                           
                                                  
                                                      <div class="col-md-6">
                    <a href="{{route('stories-genre',['genre'=>$a->ofGenre])}}" <small class="genre-feed">{{ucfirst($a->ofGenre->name)}}</small></a>
                    <a href="{{route('show-article',['article'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin featured-article">
                        
                      <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/article_images/{{$a->title_image}}" alt="">
                    
                      <div class="container-related featured-article">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                         @php
                          $wows = $a->likedBy()->wherePivot('article_id',$a->id)->count();
                          if($wows==0)
                          $w = '';
                          else if($wows==1)
                          $w = '  '.$wows.' wow';
                          else
                          $w = '  '.$wows.' wows';
                          
                         
                       @endphp
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                        <div class="" style="margin-botton:5px;">
                       <img class="featurette-image img-fluid   propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</a></small><div class="">{{--<small class="margin writer-small">{{$a->writtenBy->hasProfile->about }}</small>--}}</div>
                 
                      </div>
                       
                        
                        
                        <small class="views">{{$w}}</small>

                     
                      </div>
                    </div>
                    
                  </a>
                    </div>   
                                                  
                                            
                                        @endforeach
                                      
                                     </div>
                                      {{$liked_articles->links()}}
                                     </div>
                                   
                                     
                                     
                                     
                                     @endif
                      
       
    
    </div>
  
<script>


       $('ul.pagination').hide();
      $(function() {
          $('.infinite-story').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-story',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
       
      
      $(function() {
          $('.infinite-theory').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-theory',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
      
       
      $(function() {
          $('.infinite-liked').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-liked',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
 @include('includes.buttons')        
</script>
@endsection



  
             
               
            
              
                 
                 
                