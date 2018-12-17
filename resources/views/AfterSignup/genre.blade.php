@extends('layouts.main2')

@section('title')
@if($slug!=NULL)
Add story categories | fluidbN
@else
Signup - choose-category | fluidbN
@endif
@endsection
 
@section('content')
 
<div class="container">
<div class="box lower-margin" style="text-align:center;color:mediumvioletred;">
   <h1 class="">{{'Hi '.ucfirst(Auth::user()->fname)}} </h1>
    <img class="featurette-image img-fluid mx-auto img-card" src="/storage/general/category.png" alt="choose category">
   </div>
 
  <div class="row">
   
@foreach ($genre as $g)
@php

if(Auth::user())
$exists = Auth::user()->hasGenre()->wherePivot('user_id',Auth::user()->id)->wherePivot('genre_id',$g->id)->first();
if($exists!=NULL){
  $c="card-genre lower-margin genre-selected";
  $v = "newval".$g->id;
}

else{
  $c="card-genre lower-margin";
  $v = "someval";
}

@endphp
    <div class="col-md-3"  data-genreId="{{$g->id}}">
        <a href="/{{$g->name}}" class="chooseGenre" data-genreId="{{$g->id}}" data-name="{{$g->id}}">

          <div class="{{$c}}"  style="width:70%;" id="{{$g->id}}" data-val="{{$v}}">
          <img class="featurette-image img-fluid mx-auto img-card" src="/storage/genere/{{$g->image}}" alt="">
      
        </div>
     
        </a>
    </div>
@endforeach

  </div>
<div>
   @if($slug!=NULL)
  <button class="btn btn-outline-success btn-login" onclick="location.href='{{route('user-categories',['user'=>Auth::user(),'slug'=>str_slug(Auth::user()->fname.".".Auth::user()->lname)])}}'">Save</button>
  @else
  <button class="btn btn-outline-success btn-login"onclick="location.href='{{route('create-profile')}}'" id="">Save and continue</button>
@endif
</div>
</div>
<script>
    var token = "{{Session::token()}}";
   
    var urlGenre = "{{route('store-genre')}}";
    var urlCreateProfile = "{{route('NewProfile')}}";
    var urlGenreRem = "{{route('rem-genre')}}";
</script>
@endsection