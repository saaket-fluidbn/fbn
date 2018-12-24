

  <header>

@auth
             
          
                  <div class="header">   
                     
                 
                <a class="" href="{{ url('/feed') }}">
                    <img class="featurette-image img-fluid mx-auto" src="/storage/logo/logo.png" style="">
                </a>
          
                  
                </div>
                
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent mb-0">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/feed">Home <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="{{route('curated-story')}}">Curated stories</a>
      </li> 
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('all-story-choices')}}">All story choices</a>
      </li> 
      
      
      {{-- notification--}}
       <li class="nav-item dropdown">
        <button class="btn-login nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="border:none;">
        @auth
        <span class="fa fa-bell" id="notifications" style="color:black;font-size:25px;"></span>@if(Auth::user()->unreadNotifications->count()>0)<span class="badge badge-danger"  id="noti_count">{{Auth::user()->unreadNotifications->count()}}</span>@endif
        @endauth
        </button>
        
    
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         @auth
            @if(Auth::user()->unreadNotifications->count()>0)
                             @foreach (Auth::user()->unreadNotifications->take(10) as $n )
                            
                            @if($n->type=="App\Notifications\UserFollowed")
                             @php
                             $u = $n->data['follower_id'];
                             $user = App\User::find($u);
                             $f = $n->data['follower_fname'];
                             $l = $n->data['follower_lname'];
                           
                             @endphp
         
    <div style="border:1px solid black;background-color:black;">
           <a href="{{route('profile',['user'=>$user,'slug'=>str_slug($f.' '.$l)])}}" class="dropdown-item notify" id={{$n->id}}> <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$user->hasProfile->profile_image}}" alt=""><p class=""style="color:white;font-weight:500px;">{{$n->data['message']}}</p></a>
           </div>
           <hr style="font-style:bold;">
                         
                            @elseif($n->type=="App\Notifications\UserWelcome")
                            <div style="border:1px solid black;background-color:black;">
                            <a href="" class="dropdown-item notify" id={{$n->id}}><p class=""style="color:white;font-weight:500px;">{{$n->data['message']}}</p></a>
                            </div>
                            <hr style="font-style:bold;">
                             
                              @elseif($n->type=="App\Notifications\UserFollowedTheory")
                              @php 
                              $id = $n->data['theory_id']; 
                             
                             
                              $art = App\Theory::find($id);
                              $title = $n->data['theory_title']; 
                              @endphp
                              <div style="border:1px solid black;background-color:black;">
                              <a href="{{route('show-theory',['theory'=>$art,'slug'=>str_slug($title)])}}" class="dropdown-item notify" id={{$n->id}}><p class=""style="color:white;font-weight:500px;">{{$n->data['message']}}</p></a>
                              </div>
                            <hr style="font-style:bold;">
                              
                              @else
                              @php 
                              $id = $n->data['article_id']; 
                             
                             
                              $art = App\Article::find($id);
                              $title = $n->data['article_title']; 
                              @endphp
                              <div style="border:1px solid black;background-color:black;">
                              <a href="{{route('show-article',['article'=>$art,'slug'=>str_slug($title)])}}" class="dropdown-item notify dropNot" id={{$n->id}}><p class=""style="color:white;font-weight:500px;">{{$n->data['message']}}</p></a>
                              </div>
                              <hr style="font-style:bold;">
                              @endif
                             @endforeach
                            
                           @if(Auth::user()->unreadNotifications->count()>10)
                             <a href="{{route('all-notifications')}}"><p style="color:black;text-align:center;font-weight:500;font-size:25px;"> See all </p></a>
                            @endif
                           
                             @else
                             <a href=""> No new notifications</a>
                             @endif 
                             @endauth
        </div>
      </li>
          {{-- notifications end--}}
          
          
        {{-- user --}}
        
       <li class="nav-item dropdown">
        <button class=" btn-login nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;">
           @auth 
         <img class="featurette-image img-fluid mx-auto propic-small" src="/storage/profile_images/thumbnails/{{Auth::user()->hasProfile->profile_image}}" alt="" >
         <small  style="color:black;font-weight:bold; font-size:15px;"> {{'   '.ucfirst(Auth::user()->fname)}}</small>
     
       @endauth
        </button>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a href="{{route('profile',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.' '.Auth::user()->lname)])}}" class="dropdown-item"  >Profile</a>
                                         <a href="{{route('write')}}" id="write"class="dropdown-item">Write a story</a>
                                            <a href="{{route('write-theory')}}" id="write-theory"class="dropdown-item">Share your theory</a>
                                         <a href="{{route('show-bookmark')}}" id="show-bookmark" class="dropdown-item"> My bookmarks</a>
                                        <a href="{{route('user-categories',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.".".Auth::user()->lname)])}}" id="mycategories" class="dropdown-item"> My story choices</a>

                                         <a href="{{route('settings')}}" id="settings" class="dropdown-item"> Settings</a>
                                         <a href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();" class="dropdown-item">
                                         Logout
                                     </a>
     
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         {{ csrf_field() }}
                                         @csrf
                                     </form> 
                                </div>
                            </li>    
      
    </ul>
    
    {{--search --}}
    <form class="form-inline my-2 my-lg-0 mx-auto" action="{{route('search')}}">
      <input class="form-control mr-sm-2" id ="search" type="search" placeholder="Search fluidbN..." aria-label="Search"name= "search" autocomplete="off"  style="border:none;border-bottom:3px solid black;box-shadow:5px 5px 5px #888888;background-color:white;">
      <button class="btn-login my-2 my-sm-0" type="submit" style="border:none;"><i class="fa fa-search " ></i></button>
  </form>
    
  
  </div>
 
 
  </div>
  
    
</nav>
 <nav class="navbar navbar-expand-md navbar-light bg-transparent mb-0" style="margin-top:0;">
 <div class="container">
      
          <table class="table table-bordered table-hover ">
                   
                    <tbody id="sy">
                    
                    </tbody>
                     
                    </table>
    
        
      </div>
</nav>                
                
             
    @endauth            

       </header>
     
   
         
       
  
  

  

                      
                
              
             
            
             
   
   
                
   
         
     
   
   
   
                