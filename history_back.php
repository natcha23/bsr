<?php 
include('function.php');
?>

<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


		<link rel="stylesheet" href="lib/bt336/css/bootstrap.min.css">
		<link rel="stylesheet" href="lib/bt336/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="lib/validetta/validetta.css" type="text/css" media="screen" >
		<link rel="stylesheet" href="lib/jquery-ui/jquery-ui.css">
		<link rel="stylesheet" href="lib/custom.css">

		<script type="text/javascript" src="lib/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="lib/bt336/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="lib/validetta/validetta.js"></script>
		<script type="text/javascript" src="lib/jquery-ui/jquery-ui.js"></script>
		<script type="text/javascript" src="lib/jquery.printPage.js"></script>
		<script type="text/javascript" src="js/register.js"></script>

		<style>
			
		</style>
    </head>

    <body>
    
		<div class="container-fluid">
    		<div class="row" style="margin-bottom:20px">
    			<div class="col-md-8 col-md-offset-2" style="text-align:center;">
    				<h1 style="color:red">SOLD OUT!!</h1>
    				<!-- <h4>ท่านสามารถกลับไปหน้าลงทะเบียนโดยกดปุ่ม กลับสู่หน้าลงทะเบียน เพื่อเลือกทีมหรือไซส์ ใหม่</h4> -->
    				<button onclick="goBack()" class="btn btn-warning">กลับสู่หน้าลงทะเบียน</button>
    				<!-- <a class="btn btn-success btn-block" href="register.php">CLICK FOR REGISTRATION</a> -->
    			</div>
    		</div>
    	</div>
	</body>
</html>

<script>
function goBack() {
    window.history.back();
}
</script>