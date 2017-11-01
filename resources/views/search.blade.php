<!DOCTYPE html>
<html>
<head>
	<title>live Search</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="row">
       <div class="panel panel-default">
       <div class="panel heading">
          <h3>Customer</h3>
       </div>
       <div class="panel-body">
       <div class="form-group">
       <input type="text" class="form-control" id="search" name="search"></input>
       </div>
       <table class="table table-bordered table-hover">
        <thead>
       	<tr>
       		<th>ID</th>
       		<th>Name</th>
       		<th>Address</th>
       		<th>Tel</th>
       	</tr>
       	</thead>
       	<tbody>
       		
       	</tbody>  
       </table>
       </div>
       </div>
    </div>
    </div>
    <script type="text/javascript">
    	$('#search').on('keyup',function(){
    		$value=$(this).val();
    		$.ajax({
    			type : 'get',
    			url : '{{URL::to('search')}}',
    			data : {'search':$value},
    			success:function(data){
    				$('tbody').html(data);
    			}
    		})
    	})
    </script>

</body>
</html>