<?php
require('../function.php');
?>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Race Pack</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


		<link rel="stylesheet" href="../lib/bt336/css/bootstrap.min.css">
		<link rel="stylesheet" href="../lib/bt336/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../lib/validetta/validetta.css" type="text/css" media="screen" >
		<link rel="stylesheet" href="../lib/jquery-ui/jquery-ui.css">

		<script type="text/javascript" src="../lib/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="../lib/bt336/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../lib/validetta/validetta.js"></script>
		<script type="text/javascript" src="../lib/jquery-ui/jquery-ui.js"></script>
		
		<script type="text/javascript" src="../js/register.js"></script>

		<style>
			.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
				/*border: none !important;*/
			}
		</style>
    </head>

    <body>

    	<div class="container-fluid">
    		<div class="row" style="margin-bottom:20px">
    			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-4" style="text-align:center">
	    			<div class="row">
		    			<h1 class="navbar navbar-default">Race Pack</h1>
		    			<div class="col-md-12" style="text-align:center">
		    				<img src="../img/500x300.jpg" class="img-responsive" style="display:inline">
		    			</div>
		    		</div>
    				<div class="bs-example" data-example-id="simple-horizontal-form" style="margin-top:25px"> 
    				
    					<form class="form-horizontal" id="form_login" action="login.php" method="post"> 
    						<div class="form-group"> 
    							<label for="inputEmail3" class="col-sm-2 control-label">Username</label> 
    							<div class="col-sm-9"> 
    								<input type="text" name="username" id="username" class="form-control" id="inputEmail3" placeholder="Username"> 
    							</div> 
    						</div> 
    						<div class="form-group"> 
    							<label for="inputPassword3" class="col-sm-2 control-label">Password</label> 
    							<div class="col-sm-9"> 
    								<input type="password" name="password" id="password" class="form-control" id="inputPassword3" placeholder="Password">
    							</div> 
    						</div> 
    						<div class="form-group"> 
    							<div class="col-sm-offset-2 col-sm-10"> 
    								<button type="submit" class="btn btn-primary">Sign in</button> 
    							</div> 
    						</div> 
    					</form> 
    				</div>
    			</div>
    		</div>
    	</div>

    	<script>
    		
    	</script>

    </body>
</html>