
        <!DOCTYPE html>
        <html lang="{{ app()->getLocale() }}">
        <head>
         {{--
         <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122327691-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-122327691-1');
</script>
--}}
 <link rel="icon" href="/storage/logo/favicon2.png" sizes="48x48">
   
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="description" content="">
    <meta name="author" content="">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
             <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

            <!-- Styles -->
            
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- Custom styles -->

<link href="{{asset('css/custom.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           
         
         
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
         
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


            <title>fluidbN | Read Write Learn with fun</title>
       
        

                       <style>
                       
  /* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 12px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}



/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
  
    position: relative;
}

img.avatar {
    width: 100%;
    height:auto;
    }

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}


/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
                
             </style>
            
           
 
        </head>
    <body>
    @include('includes.nav_not_auth')
    
    <div class="container">
        <div class="row featurette">
     <div class="col-md-4 box">
     @include('includes.flashmsg')
     </div>
     </div>
    </div>
    <div class="main">
      
     
           
            <div class="container box">
{{-- main image--}}
<div class="row">
  <div class="col-md-12">  
<div style="box-shadow:10px 10px 10px #888888;">

          <img class="featurette-image img-fluid mx-auto" src="/storage/general/main.png" alt="">
    

</div>
</div>
</div>
<div class="row box lower-margin">
  <div class="col-md-12">  
<div style="box-shadow:10px 10px 10px #888888;">
        <a href="#gen">
          <img class="featurette-image img-fluid mx-auto" src="/storage/general/front.png" alt="">
</a>

</div>
</div>
</div>

 
  <div class="row box" id="gen">
    
@foreach ($genre as $g)

    <div class="col-md-3" >
        <a href="" data-toggle="modal" data-target="#login-alert">


          <div class="lower-margin">
          <img class="featurette-image img-fluid mx-auto" style="box-shadow:5px 5px 5px #888888;" src="/storage/genere/{{$g->image}}" alt="">
      
        </div>
     
        </a>
       
       
    </div>
@endforeach

  </div>
</div>




           <!-- The Modal -->
           <div class="modal fade" id="login-alert">
             <div class="modal-dialog modal-md">
               <div class="modal-content">
               
                 <!-- Modal Header -->
                 <div class="modal-header">
                       <div class="imgcontainer">
                                       <img src="/storage/general/alert-login2.png" alt="Avatar" class="avatar">
                                   </div>
               
                
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 
                 <!-- Modal body -->
                 <div class="modal-body">
                  
                  {!! Form::open(['action'=>'Auth\LoginController@login','method'=>'POST']) !!}
                                 
                                 
                              
                                    
                                      <div class="form-group">
                                              {{Form::label(' email ','',['class'=>'fa fa-user'])}}
                                              {{Form::email('email','',['class'=>'form-control'])}}
                                              </div>
                                              <div class="form-group">
                                              {{Form::label(' password ','',['class'=>'fa fa-lock'])}}
                                              {{Form::password('password',['class'=>'form-control'])}}
                                               </div>
                                             
                                              <div class="form-group">
                                              {{Form::submit(' Login', ['class'=>'btn btn-login  btn-block '])}}
                                              </div>
                                            @csrf
                                          {!! Form::close() !!}
                                          <p>Not a member ? <a href="{{route('register')}}" style="color:black;">Signup Now</a></p>
   
                                  
                               
                                   
                                             
                               </div>
                 
           
                 
               </div>
             </div>
           
           </div>
            {{--login modal end--}}
            
         
        {{--footer--}} 
         <footer class="footer container">
            
              <p style="font-weight:bold;">&copy; @php echo date('Y');@endphp fluidbN Media Technologies &middot; All rights reserved &middot; <a href="{{route('privacy')}}">Privacy</a> &middot; <a href="{{route('terms')}}">Terms</a></p>
           
            </footer>
           
           

       
      
      
         
         
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{{ asset('js/functions.js') }}" defer></script>
          <script async src="{{asset('js/app.js')}}"></script>
        
         <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
            
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
            
            
            
             /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function myFunction2() {
                document.getElementById("myDropdown-2").classList.toggle("show");
            }
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
            
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
            
            
            
            </script>
        
       
      
       <script>
                // Get the modal
                var modal = document.getElementById('id01');
                
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                </script>  
       <script>
        @include('includes.buttons')
       </script>
    
        
       
    </body>
</html>
