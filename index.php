<?php require "function.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Task.Tracker</title>

	<!-- Bootstrap -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <!--  fontawsome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style> .btn-class{width: 30px; } </style>


</head>

<body>
 
    <div class="container-fluid">

    	<header class="row">

    		<div class="col-sm-6">

    			<a data-mode="restore" id="btn-mode" href="#">Enter <span id="label"> Restore </span> Mode</a>

    		</div>

    		<div class="col-sm-6 text-right">

    		  Total Time:<span id="tally"></span>

    		</div>

    	</header>

    	    <form id="form-new">

    	         <div class="row">

    	             <div class="col-sm-10">

    			        <input id="name" name="name" class="form-control" placeholder="Enter new task name...">

    		         </div>

    		         <div class="col-sm-2">

    		             <button type="submit" class="btn btn-block btn-success"><?php echo i(); ?></button>

    		         </div>

    		    </div>

    		</form>
    	

    	

    		<hr>

    	<table class="table table-bordered">
    		
    		<thead>

    		   <tr>
    		   	
    		   	<th>Task</th>
    		   	<th>Start</th>
    		   	<th>End</th>
    		   	<th>Time</th>
    		   	<th colspan="2">Controls</th>

    		   </tr>
    			
    		</thead>

    		<tbody id="log">

    		
    		</tbody>

    	</table>	

    </div>

     
     <!-- Jquery -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
     
     <!-- App JavaScipt -->
 
     <script  src="tracker.js"></script>
     

     <!-- Jquery link copied from bootstrap -->
     <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

     <!-- Popper Js link copied from bootstrap -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

     




</body>
</html>