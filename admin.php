<?php
require('function.php');
updateData();
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

		<script type="text/javascript" src="lib/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="lib/bt336/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="lib/validetta/validetta.js"></script>
		<script type="text/javascript" src="lib/jquery-ui/jquery-ui.js"></script>
		
		<script type="text/javascript" src="js/register.js"></script>

		<style>
			.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
				/*border: none !important;*/
			}
		</style>
    </head>

    <body>
    <div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="2" style="text-align: center">จำนวนผู้ลงทะเบียนทั้งหมดแต่ละทีม</th>
					</tr>
					<tr>
						<th>ทีม</th>
						<th>จำนวนผุ้ลงทะเบียน</th>
					</tr>
				</thead>
				<?php
				$db->select('*')->from('registration')->where(array('Status'=>1));
				$sql = $db->get();
				$batman = 0;
				$superman = 0;
				foreach( $sql->result_array() as $arr ){
					if( $arr['Team'] == 1 ) $batman++;
					if( $arr['Team'] == 2 ) $superman++;
				}
				?>
				<tbody>
					<tr>
						<td>Batman</td>
						<td><?php echo $batman; ?></td>
					</tr>
					<tr>
						<td>Superman</td>
						<td><?php echo $superman; ?></td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="7" style="text-align: center">จำนวนการจองเสื้อของแต่ละทีม</th>
					</tr>
					<tr>
						<th>ทีม</th>
						<th>จำนวนเสื้อ Size S</th>
						<th>จำนวนเสื้อ size M</th>
						<th>จำนวนเสื้อ size L</th>
						<th>จำนวนเสื้อ size XL</th>
						<th>จำนวนเสื้อ size XXL</th>
						<th>จำนวนทั้งหมด</th>
					</tr>
				</thead>
				<?php
				$db->select('*')->from('registration')->where(array('Status'=>1));
				$sql = $db->get();
				$batman_s = 0; $batman_m = 0; $batman_l = 0; $batman_xl = 0; $batman_xxl = 0;
				$superman_s = 0; $superman_m = 0; $superman_l = 0; $superman_xl = 0; $superman_xxl = 0;
				
				foreach( $sql->result_array() as $arr ){
					if( $arr['Team'] == 1 && $arr['TshirtSize'] == 's' ) $batman_s++;
					if( $arr['Team'] == 1 && $arr['TshirtSize'] == 'm' ) $batman_m++;
					if( $arr['Team'] == 1 && $arr['TshirtSize'] == 'l' ) $batman_l++;
					if( $arr['Team'] == 1 && $arr['TshirtSize'] == 'xl' ) $batman_xl++;
					if( $arr['Team'] == 1 && $arr['TshirtSize'] == 'xxl' ) $batman_xxl++;

					if( $arr['Team'] == 2 && $arr['TshirtSize'] == 's' ) $superman_s++;
					if( $arr['Team'] == 2 && $arr['TshirtSize'] == 'm' ) $superman_m++;
					if( $arr['Team'] == 2 && $arr['TshirtSize'] == 'l' ) $superman_l++;
					if( $arr['Team'] == 2 && $arr['TshirtSize'] == 'xl' ) $superman_xl++;
					if( $arr['Team'] == 2 && $arr['TshirtSize'] == 'xxl' ) $superman_xxl++;
				}

				$batman_total = $batman_s + $batman_m + $batman_l + $batman_xl + $batman_xxl;
				$superman_total = $superman_s + $superman_m + $superman_l + $superman_xl + $superman_xxl;
				?>
				<tbody>
					<tr>
						<td>Batman</td>
						<td><?php echo $batman_s; ?></td>
						<td><?php echo $batman_m; ?></td>
						<td><?php echo $batman_l; ?></td>
						<td><?php echo $batman_xl; ?></td>
						<td><?php echo $batman_xxl; ?></td>
						<td><?php echo $batman_total; ?></td>
					</tr>
					<tr>
						<td>Superman</td>
						<td><?php echo $superman_s; ?></td>
						<td><?php echo $superman_m; ?></td>
						<td><?php echo $superman_l; ?></td>
						<td><?php echo $superman_xl; ?></td>
						<td><?php echo $superman_xxl; ?></td>
						<td><?php echo $superman_total; ?></td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>

	</div>
	</body>
</html>