@extends('layouts.main')
@section('title')
{{ucfirst(Auth::user()->fname)." 's feed | fluidbN"}}
@endsection


@section('content')


<main role="main">
 {{--

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="/storage/general/c1.png" alt="">
           
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="/storage/general/c2.png" alt="">
            
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="/storage/general/c3.png" alt="">
           
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  
--}}
{{--story categories --}}

<div class="container">

<div style="margin-bottom:50px;">
  @if($heading!='')
 <h1 class="featurette-heading-title" style="font-size:40px;">{{$heading}} <i class="fa fa-heart" style="font-size:40px;color:red;"></i></h1>
@else
<h1 class="featurette-heading-title">Curated with <i class="fa fa-heart" style="font-size:40px;color:red;"></i> for you</h1>
 @endif
</div>

            {{-- Button to write --}}
  <div class="lower-margin box">
    <button  class=" btn-login btn-feed"  onclick="location.href='{{route('write')}}'">
      Create a story
    </button>
     <button  class="btn-login btn-feed" onclick="location.href='{{route('write-theory')}}'">
    Share your theory
    </button>
  </div>
 


  
        


{{--
   <table class="table table-bordered table-hover">
                 @auth
                  <tbody id="ur">
                  
                  </tbody>
                   @endauth
                  </table>
                  <table class="table table-bordered table-hover">
                   
                    <tbody id="sy">
                    
                    </tbody>
                     
                    </table>
              --}}      
                    
{{-- theories--}}


       @if(count($theory)>0)
        <div class="box lower-margin">
          <h2 class="featurette-heading-title">Featured theories</h2>  
         </div>
      
      
                    
            <div class="infinite-theo">
              <div class="row featurette">
               @foreach($theory as $a)

           
                
                  <div class="col-md-6">
                   
                  
                    <a href="{{route('show-theory',['theory'=>$a,'slug'=>str_slug($a->title)])}}">
                     
                    <div class="card-related lower-margin featured-article">
                        
                     
                      <div class="container-related featured-article">
                        <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
                        
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                       
                         <div class="" style="margin-botton:5px;">
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</a></small>
                     
                      </div>
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
{{$theory->links()}}
</div>

@endif

{{--theories end--}}
                    
                    
                    

    
    
       {{--fluidbn exclusive--}}
      
  <h1 class="featurette-heading-title">fluidbN studio stories</h1>    
<div class="row featurette box">
  
  @foreach($story as $a)

   
     <div class="col-md-6">
       <a href="{{route('stories-genre',['genre'=>$a->storyOfGenre])}}" <small class="genre-feed">{{ucfirst($a->storyOfGenre->name)}}</small></a>
       <a href="{{route('studio-story',['StudioStories'=>$a,'slug'=>str_slug($a->title)])}}">
        
       <div class="card-related lower-margin featured-article">
           
         <img class="featurette-image img-fluid mx-auto" style="border-radius:10px;" src="/storage/studio_images/{{$a->title_image}}" alt="">
       
         <div class="container-related featured-article">
           <h2 class="featurette-heading-feed">{{ucfirst($a->title)}}</h2>
           
          
           <div class="" style="margin-botton:5px;">
         
         
         </div>
       
         </div>
       </div>
       
     </a>
       </div>       


@endforeach
      
          
</div>

      {{--end fluidbn exclusive--}}
      
      
    
    
    

       @if(count($tailored)>0)
        <div class="box lower-margin">
          <h2 class="featurette-heading-title">Stories tailored for you</h2>  
         </div>
      
      
                    
            <div class="infinite-tailored">
              <div class="row featurette">
               @foreach($tailored as $a)

               @php
               if($a->views==1)
               $v = '  '.$a->views.' view';
               else if($a->views>1)
               $v = '  '.$a->views.' views';
                else if($a->views==0)
                $v = '';
           @endphp
                
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
                          
                          $bookmark = Auth::user()->bookmarks()->wherePivot('user_id',Auth::user()->id)->wherePivot('article_id', $a->id)->first();
                       @endphp
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                        <div class="" style="margin-botton:5px;">
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</a></small><div class="">{{--<small class="margin writer-small">{{$a->writtenBy->hasProfile->about }}</small>--}}</div>
                     {{--
                       <button class="   btn-login feed" id="{{$a->id}}" style="margin-top:5px;padding:8px;" data-articleId="{{$a->id}}">{{$bookmark ? "Bookmarked !" : "Bookmark"}}</button>
                       --}}
                      </div>
                       
                        
                        
                        @if($a->views>0)<small class="views right"> {{$v}}</small>@endif  <small class="views right-wow">{{$w}}</small>

                     {{--  @php  $like = $user->likes()->wherePivot('user_id', $user->id)->wherePivot('article_id',$a->id)->first();
                       @endphp
                       <button class="   margin like"  data-articleid="{{$a->id}}" type="submit">{{$like ? "Thanks for appreciating !" : "Wow !"}}</button>
                       --}}
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
  {{$tailored->links()}}

</div>
@endif




    <!-- START THE FEATURETTES -->

  

       @if(count($article)>0)
        <div class="box lower-margin">
          <h2 class="featurette-heading-title">Featured stories</h2>  
         </div>
      
      
                    
            <div class="infinite-scroll">
              <div class="row featurette">
               @foreach($article as $a)

               @php
               if($a->views==1)
               $v = '  '.$a->views.' view';
               else if($a->views>1)
               $v = '  '.$a->views.' views';
                else if($a->views==0)
                $v = '';
           @endphp
                
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
                          
                          $bookmark = Auth::user()->bookmarks()->wherePivot('user_id',Auth::user()->id)->wherePivot('article_id', $a->id)->first();
                       @endphp
                        <p class="lead">{!!wordwrap(str_limit($a->content,100),50,"<br>\n",TRUE)!!}</p>
                        <div class="" style="margin-botton:5px;">
                       <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$a->writtenBy->hasProfile->profile_image}}" alt=""> <small class="writer-small"><a href="{{route('profile',['user'=>$a->writtenBy,'slug'=>str_slug($a->writtenBy->fname." ".$a->writtenBy->lname)])}}">{{ucfirst($a->writtenBy->fname).' '. ucfirst($a->writtenBy->lname)}}</a></small><div class="">{{--<small class="margin writer-small">{{$a->writtenBy->hasProfile->about }}</small>--}}</div>
                     {{--
                       <button class="   btn-login feed" id="{{$a->id}}" style="margin-top:5px;padding:8px;" data-articleId="{{$a->id}}">{{$bookmark ? "Bookmarked !" : "Bookmark"}}</button>
                       --}}
                      </div>
                       
                        
                        
                        @if($a->views>0)<small class="views right"> {{$v}}</small>@endif  <small class="views right-wow">{{$w}}</small>

                     {{--  @php  $like = $user->likes()->wherePivot('user_id', $user->id)->wherePivot('article_id',$a->id)->first();
                       @endphp
                       <button class="   margin like"  data-articleid="{{$a->id}}" type="submit">{{$like ? "Thanks for appreciating !" : "Wow !"}}</button>
                       --}}
                      </div>
                    </div>
                    
                  </a>
                    </div>       
         
  @endforeach
                   
                       
</div>
  {{$article->links()}}

</div>
@endif



</div>





{{--<hr class="featurette-divider">--}}


<!-- /END THE FEATURETTES -->







       <!-- Feed from authors user follow-->


            



               <!--End of followed author feed-->


             

      </main>
      <script>
          function openSearch() {
              document.getElementById("myOverlay").style.display = "block";
          }
          
          function closeSearch() {
              document.getElementById("myOverlay").style.display = "none";
          }
          </script>
           
  <script>
      $('ul.pagination').hide();
     
      $(function() {
          $('.infinite-theo').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-theo',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
      
      
      
      $(function() {
          $('.infinite-scroll').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-scroll',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
    $(function() {
          $('.infinite-tailored').jscroll({
              autoTrigger: true,
              loadingHtml: '<img class="center-block" src="/loader_images/image_1212462.gif" alt="Loading..." />',
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-tailored',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });
       
      var token = "{{Session::token()}}";
      var urlBookmark = "{{route('bookmark')}}";
      var urlUnmark = "{{route('unmark')}}";
      var urlNotification = "{{route('notifications')}}";
  </script> 

@endsection
