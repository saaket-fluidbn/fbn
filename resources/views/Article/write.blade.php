@extends('layouts.main')

@section('title')
Write article | fluidbN
@endsection

@section('content')
<div class="container box">

       
<h2 style="color:black;">{{'Come on '.ucfirst(Auth::user()->fname) }}... write a story here and show your creativity !</h2>
 <div class="form-group">
               <button class="btn   btn-login"  onclick="window.open('https://www.canva.com')">Design title image using Canva</button>
        
               </div>
<div class="img-fluid">

 
       
        {!! Form::open(['action'=>'Article\ArticleController@store','method'=>'POST','files'=>true,'class'=>'','enctype'=>'multipart/form-data']) !!}  

        <div class="form-group">
               
                 {{Form::text('title','',['id'=>'title','class'=>'form-control','placeholder'=>'Title of your story here...','id'=>'title'])}}
               
                </div>
<div class="form-group">
  
            {{Form::label('title_image','Upload title image',['class'=>'btn   btn-login'])}}     {{Form::file('title_image')}} 
            
           </div> 
             
          
      
                <div class="form-group">
                                
                                {{Form::select('genre',$selectGenre , null, ['placeholder' => 'Pick a category...','id'=>'genre'])}}                              
                                
                                    </div>
        
             
                <div class="form-group">


        
      
           {{Form::textarea('content','',['id'=>'editor','class'=>'form-control','placeholder'=>'Write and show your creativity...'])}}
           
        </div>
       
        {{--
                <div class="form-group">

        {{Form::hidden('content','',['id'=>'content','class'=>'form-control','role'=>'uploadcare-uploader','data-public-key'=>'fa64a2e817928b847741','data-images-only','data-crop'])}}
      
        </div>--}}
        
         
           <button class="btn   btn-login" id="save">Save</button> 
           
           {{Form::submit('Post',['class'=>'btn   btn-login'])}}
           
     
             
               {!! Form::close() !!}
          

</div>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js" integrity="sha256-ZGY6sbMixOTWniUU5YSkNrbq4bjx09K+fBFQXQINyh4=" crossorigin="anonymous"></script>
       <script  src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/adapters/jquery.js" integrity="sha256-O87Hw+C1FiZpA0Aavw6v7G9/AWyruB3m4rrEn1VWz0I=" crossorigin="anonymous"></script>
 

 <script>
                CKEDITOR.replace('editor');
                    
               
                </script>
          
{{--
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="[ckeditor-build-path]/ckeditor.js"></script>
 <script>


function MyUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = function( loader ) {
        // ...
    };
}

               ClassicEditor
    .create( document.querySelector( '#editor' ),{
      extraPlugins: [ MyUploadAdapterPlugin ],  
        
    })
		

	
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
        var urlSave = "{{route('save')}}";

</script>
@endsection

