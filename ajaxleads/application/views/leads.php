<html>
<head>
	<title>Leads</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style type="text/css">
    	body{
    		background-color: #333;
    		width: 100%;
    		height: 100%
    	}
    	#container{
    		width: 80%;
    		height: 100%;
    		margin:25px auto;
    	}
    	#controls{
    		width:65%;
    		margin:0px auto;
    	}
    	#pages{
    		width:50%;
    		margin:10px auto;
    	}
    	.page{
    		margin:9px;
            cursor: pointer;
    	}
    	#table table{
    		width: 100%;
    		color:#fff;
    	}
    	td{
    		padding:10px;
    	}
    	.table-striped>tbody>tr:nth-of-type(even){
    		background-color: #777;
    	}
    	.table-striped>tbody>tr:nth-of-type(odd){
    		background-color: #333;
    	}
    	
    	label{
    		margin-left: 15px;
    		color:#fff;
    	}

    </style>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$.post("/leads/show_table",{page:"0"},function(res){
    			// console.log(res);
    			$('#table').html(res);
                $('.page').click(function(){
                    var value=$(this).attr('id');
                    $('#page_num').val(value);
                    $('form').submit();
                })
    		})

            $('input').change(function(){
                $('#page_num').val(0);
                $('form').submit();
            })

    		$('form').submit(function(){
    			$.post("/leads/update_table",$(this).serialize(),function(res){
    				$('#table').html(res);
                    $('.page').click(function(){
                    var value=$(this).attr('id');
                    $('#page_num').val(value);
                    $('form').submit();
                })
    			})
    			return false;
    		})

    	})
    </script>
</head>
<body>
	<div id="container">
		<div id="controls">
			<form action="/leads/update_table" method="post" class="form-inline">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" value="" class="form-control">
				</div>

				<div class="form-group">
					<label>From:</label>
					<input type="date" name="from-date" value="" class="form-control">
				</div>

				<div class="form-group">
					<label>To:</label>
					<input type="date" name="to-date" value="" class="form-control">
				</div>

				<input id="page_num" type="hidden" name="page" value="0">
			</form>

			
		</div>
		<div id="table">
		</div>

	</div>

</body>
</html>