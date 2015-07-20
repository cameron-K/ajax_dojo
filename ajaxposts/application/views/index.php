<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Postsy</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style type="text/css">
    body{
      width: 100%;
      height: 100%;
      background-color: #93b5bf;
    }
      .postdiv{
        display: inline-block;
        vertical-align: top;
        border:1px solid #f9d14e;
        margin:10px;
        padding: 15px;
        min-height: 100px;
        width: 100px;
        background-color: #ffeebc;
      }
      form{
        width:250px;
        margin:10px;
      }
      h1{
        margin-left: 15px;
      }
      textarea{
        background: #b7a15f;
      }
    </style>
    <script>
      $(document).ready(function(){
      $('textarea').focus();
        console.log('ready');
          $.get('/posts/get_posts',function(res){
            var poststr="";
          for(var i=0;i<res.length;i++){
            poststr+="<div class='postdiv'><p>"+res[i].description+"</p></div>";
          }

          $('#postdiv').html(poststr);
        },'json');


          $('form').submit(function(){
              $.post("/posts/create",$(this).serialize(),function(res){
                var poststr="";
                for(var i=0;i<res.length;i++){
                  poststr+="<div class='postdiv'><p>"+res[i].description+"</p></div>";
                }
                $('#postdiv').html(poststr);
                $('textarea').val("");
                $('textarea').focus();
              },'json');
              return false;
          });
      });
    </script>
  </head>
  <body>
    <h1>Postsy</h1>
    
    <div id="posts">
    </div>

     <div id="postdiv">

     </div>
    <form action="posts/create" method="post">

      <textarea class="form-control" name="description"></textarea>
      <br>
      <button id="post_button" class="btn btn-primary" type="submit">Post</button>
    </form>

  </body>
</html>