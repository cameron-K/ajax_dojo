<html>
<head>
	<title>Notes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <style type="text/css">
    body{
      width: 100%;
      height: 100%;
      /*background-color: #333;*/
    }
    /*  .postdiv{
        display: inline-block;
        vertical-align: top;
        border:1px solid #f9d14e;
        margin:10px;n
        padding: 15px;
        min-height: 100px;
        width: 1"00px;
        background-color: #ffeebc;
      }*/
      .btn-danger{
      	/*margin-left: 300px;*/
      }
      #notes,#container{
        width:450px;
        margin:10px auto;
      }
      #newForm{
      	margin:15px auto;
      }

      	#newForm input,form{
      		width:400px;
      	}
      .inline{
        display: inline-block;
      }
      h3{
      	/*color:#fff;*/
      }

      #container textarea{
      	width: 400px;
      	text-align: left;
        /*background: #ffeebc;*/
      }
      .note{
      	margin-bottom: 55px;
      }
      #new_title{
      	margin-bottom: 20px;
      }

    </style>
    <script type="text/javascript">
    	$(document).ready(function(){
    		console.log("hi");
    		$.get("/notes/get_all",function(res){
    			// console.log(res);
    			$('#notes').html(res);
    		});

    		// $('#new_form').submit(function(){
    		// 	$.post("/notes/create_note",$(this).serialize(),function(res){
    		// 		$('#notes').html(res);
    		// 	});
    		// 	return false;
    		// });

    		// $('.update_form').submit(function(){
    		// 	$.post("/notes/update_note",$(this).serialize(),function(res){
    		// 		$('#notes').html(res);
    		// 	});
    		// 	return false;
    		// });

    		// $('.delete_form').submit(function(){
    		// 	$.post("/notes/delete_note",$(this).serialize(),function(res){
    		// 		$('#notes').html(res);
    		// 	});
    		// 	return false;
    		// });
    		$('form').submit(function(){
	    			var action=$(this).attr('action');
	    			$.post(action,$(this).serialize(),function(res){
	    				$('#notes').html(res);
	    				$('#new_title').val("");
	    				$('#new_title').focus();
	    		});
	    		return false;
	    		});
    		
    		$('#container').click(function(){

    			$('.description').change(function(){
    				$('.update_form').submit();
    			})

          $(window).unload(function(){
            $('.update_form').submit();
          })

    			$('.update_form').submit(function(){
	    			var action=$(this).attr('action');
	    			$.post(action,$(this).serialize(),function(res){
	    				$('#notes').html(res);
	    		});
	    		return false;
	    		});

    			$('.delete_form').submit(function(){
	    			var action=$(this).attr('action');
	    			$.post(action,$(this).serialize(),function(res){
	    				$('#notes').html(res);
	    		});
	    		return false;
	    		});
    		});
    	});
    </script>
</head>
<body>
	<div id="container">
		<div id="notes"></div>
		<form id="new_form" action="notes/create_note" method="post">
			<input id="new_title" class="form-control" type="text" name="title" placeholder="enter title">
			<button class="btn btn-success" type="submit">Add note</button>
		</form>
	</div>

</body>
</html>