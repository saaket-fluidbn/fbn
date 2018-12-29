
// infinite scrolling
 
        




$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  
  
  
  $(document).ready(function(){
  
  $('#like').on('click',function(event){
    var articleId = 0;   
    var userId = 0;   
    //articleId =  $(this).parents('div.box').attr('data-articleid');
                   articleId = $(this).attr('data-articleid');
                   userId = $('button.fol').attr('data-userid');
          if($('#like').text()=="Wow"){
            $('#like').text('Thanks');  
            $.post(urlLike,{
                  articleId:articleId,
                  userId:userId,
                  _token :token
              },
              function(data){
                 $('#like').text('Thanks');
                 $('#wow').text(data.wows);
                              }
                   ); 
            }
        else  if($('#like').text()=="Thanks"){
            $('#like').text('Wow');
            $.post(urlUnlike,{
              articleId:articleId,
              userId:userId,
              _token :token
          },
          function(data){
                  $('#like').text('Wow');
                  $('#wow').text(data.wows);
                      }
                  );    
              }
           });
         });
  
         $(document).ready(function(){
            $('button.fol').on('click',function(){
            var userId = 0;
            userId = $(this).attr('data-userid');
            if($('button.fol').text()=="Follow"){
                $('button.fol').text('Following');
                $.post(urlFollow,{
                 userId:userId,
                 _token :token
                },
                function(){
                    $('button.fol').text('Following');
                }
              );
            }
            else if($('button.fol').text()=="Following"){
                $('button.fol').text('Follow');
                $.post(urlUnfollow,{
                 userId:userId,
                 _token :token
                },
                function(){
                    $('button.fol').text('Follow');
                }
              );
     
            }
           
        });
     });
     

      
  
  
  
  $(document).ready(function(){
  
      $('button.bookmark').on('click',function(event){
        event.preventDefault();
          var articleId = 0;      
        articleId =  $(this).attr('data-articleId');
             
              if($('button.bookmark').text()=="Bookmark"){
                $('button.bookmark').text('Bookmarked'); 
                $.post(urlBookmark,{
                      articleId:articleId,
                      _token :token
                  },
                  function(){
                          $('button.bookmark').text('Bookmarked');
                          
                              }
               ); 
              }
            else  if($('button.bookmark').text()=="Bookmarked"){
                $('button.bookmark').text('Bookmark');
                $.post(urlUnmark,{
                  articleId:articleId,
                  _token :token
              },
              function(){
                      $('button.bookmark').text('Bookmark');
                    
              }
           );    
            }
        });
      });
   
