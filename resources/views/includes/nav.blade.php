<!-- Navbar (sit on top) -->
@auth
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="{{ url('/feed') }}" class="w3-bar-item  w3-wide"><img class="featurette-image img-fluid mx-auto" src="/storage/logo/logow.png" style=""></a>
 
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
 
    <!-- Right-sided navbar links -->
    <div class="w3-display-middle w3-hide-small w3-hide-medium">
      {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
      <button onclick="location.href='/feed'" class="w3-bar-item ">Feed</button>
  <button onclick="location.href='{{route('curated-story')}}'"  class="w3-bar-item w3-button">Curated stories</button>
  <button onclick="location.href='{{route('all-story-choices')}}'"  class="w3-bar-item w3-button">All story choices</button>
  {{--notis--}}
  <div class="w3-dropdown-hover">
      <button onclick="myFunction1()" class="w3-button"> @auth
        <span class="fa fa-bell" id="notifications" style="color:black;font-size:25px;"></span>@if(Auth::user()->unreadNotifications->count()>0)<span class="badge badge-danger"  id="noti_count">{{Auth::user()->unreadNotifications->count()}}</span>@endif
        @endauth</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
      
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
     
<div style="border:1px solid black;background-color:white;">
       <a href="{{route('profile',['user'=>$user,'slug'=>str_slug($f.' '.$l)])}}" class="dropdown-item notify" id={{$n->id}}> <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$user->hasProfile->profile_image}}" alt=""><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
       </div>
   
                     
                        @elseif($n->type=="App\Notifications\UserWelcome")
                        <div style="border:1px solid black;background-color:white;">
                        <a href="" class="dropdown-item notify" id={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                        </div>
                   
                         
                          @elseif($n->type=="App\Notifications\UserFollowedTheory")
                          @php 
                          $id = $n->data['theory_id']; 
                         
                         
                          $art = App\Theory::find($id);
                          $title = $n->data['theory_title']; 
                          @endphp
                          <div style="border:1px solid black;background-color:white;">
                          <a href="{{route('show-theory',['theory'=>$art,'slug'=>str_slug($title)])}}" class="dropdown-item notify" id={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                          </div>
                    
                          @else
                          @php 
                          $id = $n->data['article_id']; 
                         
                         
                          $art = App\Article::find($id);
                          $title = $n->data['article_title']; 
                          @endphp
                          <div style="border:1px solid black;background-color:white;">
                          <a href="{{route('show-article',['article'=>$art,'slug'=>str_slug($title)])}}" class="dropdown-item notify dropNot" id={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                          </div>
                     
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

      </div>
      {{--user--}}
<div class="w3-dropdown-hover">
    <button onclick="myFunction2()" class="w3-button"> 
  @auth 
    <img class="img-fluid mx-auto propic-small" style="width:30px;height:30px;"src="/storage/profile_images/thumbnails/{{Auth::user()->hasProfile->profile_image}}" alt="" >
    <small  style="color:black; font-size:15px;"> {{'   '.ucfirst(Auth::user()->fname)}}</small>
  @endauth
    </button>
  <div id="" class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
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
</div>
{{--end user--}}
   
{{--search--}}
<form class="form-inline my-2 my-lg-0 mx-auto" action="{{route('search')}}">
    <input class="form-control mr-sm-2 search" id ="search" type="search" placeholder="Search fluidbN..." aria-label="Search"name= "search" autocomplete="off"  style="">
    <button class="btn-login my-2 my-sm-0" type="submit" style="border:none;"><i class="fa fa-search " ></i></button>
</form>

{{--end search--}}
   


</div>
    

    </div>
 
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
{{--
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
    --}}
  </div>
 
</div>

    <div class="w3-container w3-hide-small w3-hide-medium">
         
             <table class="table table-bordered table-hover ">
                      
                       <tbody id="sys" style="color:black;">
                       
                       </tbody>
                        
                       </table>
       
           
         </div>
    
<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left  w3-hide-large" style="display:none;width:100%;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close &times;</a>
  {{--<a href="#about" class="w3-bar-item w3-button">About</a>--}}
  <button onclick="location.href='/feed'" class="w3-bar-item w3-button">Feed</button>
  <button onclick="location.href='{{route('curated-story')}}'"  class="w3-bar-item w3-button">Curated stories</button>
  <button onclick="location.href='{{route('all-story-choices')}}'"  class="w3-bar-item w3-button">All story choices</button>
  <div class="w3-dropdown-click">
      <button onclick="notiFunc()" class="w3-bar-item w3-button"> @auth
        <span class="fa fa-bell" id="notifications" style="color:white;font-size:25px;"></span>@if(Auth::user()->unreadNotifications->count()>0)<span class="badge badge-danger"  id="noti_count">{{Auth::user()->unreadNotifications->count()}}</span>@endif
        @endauth</button>
      <div id="nts"class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
      
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
     
<div style="border:1px solid black;background-color:white;">
       <a href="{{route('profile',['user'=>$user,'slug'=>str_slug($f.' '.$l)])}}" class="w3-bar-item notify" id={{$n->id}}> <img class="featurette-image img-fluid mx-auto  propic-small" src="/storage/profile_images/thumbnails/{{$user->hasProfile->profile_image}}" alt=""><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
       </div>
   
                     
                        @elseif($n->type=="App\Notifications\UserWelcome")
                        <div style="border:1px solid black;background-color:white;">
                        <a href="" class="w3-bar-item notify" id={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                        </div>
                   
                         
                          @elseif($n->type=="App\Notifications\UserFollowedTheory")
                          @php 
                          $id = $n->data['theory_id']; 
                         
                         
                          $art = App\Theory::find($id);
                          $title = $n->data['theory_title']; 
                          @endphp
                          <div style="border:1px solid black;background-color:white;">
                          <a href="{{route('show-theory',['theory'=>$art,'slug'=>str_slug($title)])}}" class="w3-bar-item notify" id={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                          </div>
                    
                          @else
                          @php 
                          $id = $n->data['article_id']; 
                         
                         
                          $art = App\Article::find($id);
                          $title = $n->data['article_title']; 
                          @endphp
                          <div style="border:1px solid black;background-color:white;">
                          <a href="{{route('show-article',['article'=>$art,'slug'=>str_slug($title)])}}" class="w3-bar-item notify dropNot" id={{$n->id}}><p class=""style="color:black;font-weight:500px;">{{$n->data['message']}}</p></a>
                          </div>
                     
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
  {{--user--}}
  <div class="w3-dropdown-click">
      <button onclick="uspFunc()" class="w3-bar-item w3-button"> 
    @auth 
      <img class="img-fluid mx-auto propic-small" style="width:30px;height:30px;"src="/storage/profile_images/thumbnails/{{Auth::user()->hasProfile->profile_image}}" alt="" >
      <small  style="color:white; font-size:15px;"> {{'   '.ucfirst(Auth::user()->fname)}}</small>
    @endauth
      </button>
    <div id="uspr" class="w3-dropdown-content w3-bar-block w3-card-4 w3-animate-zoom">
        <a href="{{route('profile',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.' '.Auth::user()->lname)])}}" class="w3-bar-item"  >Profile</a>
        <a href="{{route('write')}}" id="write"class="w3-bar-item">Write a story</a>
           <a href="{{route('write-theory')}}" id="write-theory"class="w3-bar-item">Share your theory</a>
        <a href="{{route('show-bookmark')}}" id="show-bookmark" class="w3-bar-item"> My bookmarks</a>
       <a href="{{route('user-categories',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.".".Auth::user()->lname)])}}" id="mycategories" class="w3-bar-item"> My story choices</a>
  
        <a href="{{route('settings')}}" id="settings" class="w3-bar-item"> Settings</a>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" class="w3-bar-item">
        Logout
    </a>
  
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        @csrf
    </form> 
    </div>
  </div>   
    
  {{--end user--}}
    
{{--search--}}

<form class="form-inline my-2 my-lg-0 mx-auto w3-bar-item" action="{{route('search')}}">
    <input class="form-control mr-sm-2 search" id ="" type="search" placeholder="Search fluidbN..." aria-label="Search"name= "search" autocomplete="off"  style="">
    <button class="btn-login my-2 my-sm-0" type="submit" style="border:none;"><i class="fa fa-search " ></i></button>
</form>

{{--end search--}}
</div>
    </div>
    
        <div class="w3-container w3-hide-large">
             
                 <table class="table table-bordered table-hover">
                          
                           <tbody id="sy" style="color:white;">
                           
                           </tbody>
                            
                           </table>
           
               
             </div>
        
</nav>

@endauth