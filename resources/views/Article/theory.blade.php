@extends('layouts.main')

@section('title')
My theory | fluidbN
@endsection

@section('content')
<div class="box">

<h2 style="color:black;">{{'Come on '.ucfirst(Auth::user()->fname) }}... share a theory that you developed.</h2>
 
             
<div class="img-fluid">

 
       
        {!! Form::open(['action'=>'Article\ArticleController@storeTheory','method'=>'POST']) !!}  

        <div class="form-group">
               
                 {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title of your theory here...','id'=>'title'])}}
                </div>

          
      
               
        
             
                <div class="form-group">

        {{Form::textarea('content','',['id'=>'editor','class'=>'form-control','placeholder'=>'Share your own theory based on your observations and experiences...'])}}
        </div>
      
           {{Form::submit('Share',['class'=>'btn   btn-login'])}}
           
       
     {!! Form::close() !!}
          
          
</div>
 <script  src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js" integrity="sha256-ZGY6sbMixOTWniUU5YSkNrbq4bjx09K+fBFQXQINyh4=" crossorigin="anonymous"></script>
       <script  src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/adapters/jquery.js" integrity="sha256-O87Hw+C1FiZpA0Aavw6v7G9/AWyruB3m4rrEn1VWz0I=" crossorigin="anonymous"></script>
 

 <script>
                CKEDITOR.replace('editor',{
                    height:400,
                 
                });
               
                </script>
          
{{--
 
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="[ckeditor-build-path]/ckeditor.js"></script>
 <script>
               ClassicEditor
    .create( document.querySelector( '#editor' ))
		

	
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
               
               
                </script>

--}}
          
                
      <script>
        var token = "{{Session::token()}}";
       
       
</script>
@endsection

