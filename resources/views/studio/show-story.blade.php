@extends('layouts.main')

@section('title')
{{ucfirst($StudioStories->title)}} -Studio | fluidbN
@endsection

  
    

@section('content')


<div class="container">

    <div class="row featurette">
   

        <div class="col-sm-6 ">
          
          <div class="box" id="mainView" data-articleid="{{$StudioStories->id}}" >
              @auth
              @php
              $likeFs = Auth::user()->likesFs()->wherePivot('user_id',Auth::user()->id)->wherePivot('story_id',$StudioStories->id)->first();
              @endphp
              @endauth
            
              <button class="btn btn-outline-success  btn-login" id="like"  style="margin-left:20px;margin-top:5px;" data-articleid="{{$StudioStories->id}}" type="submit">{{$likeFs ? "Thanks" : "Wow"}}</button>
          
               </div>
        
      </div>
      
     <div class="col-sm-4">
       
            <img class="featurette-image img-fluid mx-auto card" style="width:100%;" src="/storage/studio_images/{{$StudioStories->title_image}}" alt="">
          
     </div>
    </div>
</div>
     
     
      <div class="container">
      <div class="row">
      
      
      
      <div class="col-12">
           <div class="lower-margin box">
          <h2 class="featurette-heading" style="margin-top:20px; color:black;">{{ucfirst($StudioStories->title)}}</h2>
             </div>
                <img class="featurette-image img-fluid mx-auto card" style="width:90%;" src="/storage/studio_images/{{$StudioStories->content}}" alt="">
                 
         
          </div>
      
      </div>
  
   

      <footer>
    
  
        
        
        </footer>
    </div>
  







@endsection


