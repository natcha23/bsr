<?php
session_start();
require('../function.php');
if( !isset($_SESSION['is_login']) || $_SESSION['is_login']==false ){
	session_destroy();
	header('Location: index.php');
	exit();
}
updateData();
?>

<style>
.navbar-custom {
    background-color:#229922;
    color:#ffffff;
    border-radius:0;
}

.navbar-custom .navbar-nav > li > a {
    color:#fff;
}
.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
    color: #ffffff;
    background-color:transparent;
}
.navbar-custom .navbar-brand {
    color:#eeeeee;
}

</style>
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
		<!-- <link rel="stylesheet" href="../lib/bootstrap_table/css/jquery.bdt.css" type="text/css"> -->
		<link rel="stylesheet" href="../lib/bootstrap_table/datatable.min.css" type="text/css">

		<script type="text/javascript" src="../lib/jquery-2.2.1.js"></script>
		<script type="text/javascript" src="../lib/bt336/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../lib/validetta/validetta.js"></script>
		<script type="text/javascript" src="../lib/jquery-ui/jquery-ui.js"></script>
		<!-- <script type="text/javascript" src="../lib/bootstrap_table/js/vendor/jquery.sortelements.js"></script>
		<script type="text/javascript" src="../lib/bootstrap_table/js/jquery.bdt.js"></script> -->
		<script type="text/javascript" src="../lib/bootstrap_table/datatable.min.js"></script>
		
		<script type="text/javascript" src="../js/register.js"></script>

		<style>
			.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
				/*border: none !important;*/
				text-align: center;
			}

			.table>thead>tr {
				background-color: #337ab7;
				color: #fff;
			}

			#table-paid>thead>tr>th, #table-paid>tbody>tr>td, #table-unpaid>thead>tr>th, #table-unpaid>tbody>tr>td {
				font-size: 12px !important;
			}
			.race-pack {
				font-weight: bold;
				font-size: 20px;
			}
		</style>
    </head>

    <body>
    <div class="container-fluid" style="padding:20px">
    <a href="logout.php" class="btn btn-danger" style="position:absolute; right:5px; top:5px; z-index:2">Sign out</a>
	<?php 
	$db->select('*')->from('registration')->where(array('RacePackStatus'=>1, 'PaidStatus'=>1));
	$racepacksql = $db->get();
	$racepacknum = $racepacksql->num_rows();
	
	$db->select('*')->from('registration')->where(array('PaidStatus'=>1));
	$db->where("(RacePackStatus = 0 OR RacePackStatus IS NULL)");
	$unracepacksql = $db->get();
	$unracepacknum = $unracepacksql->num_rows();
	
	?>

		<div class="row">
			<div class="col-md-12">
				<h1 class="navbar navbar-custom">Race Pack</h1>
				<div class="col-md-6">
				<span style="color:#0077BF;font-size: 26px;">บาร์โค๊ดที่ชำระเงินแล้ว</span>
				</div>
				<div class="col-md-6">
					<span class="pull-right race-pack"><font color="#1B9229">รับแล้ว&nbsp;:&nbsp; <?php echo number_format($racepacknum); ?></font> | <font color="#928F8E">ยังไม่ได้รับ&nbsp;:&nbsp; <?php echo number_format($unracepacknum);?></font></span>
				</div>
				<div id="paid">
					<table class="table table-bordered" id="table-paid">
					<thead>
						<tr>
							<th>ชื่อภาษาไทย</th>
							<th>ชื่อภาษาอังกฤษ</th>
							<th>เลขบัตรประชาชน</th>
							<th>เบอร์โทรศัพท์/อีเมล</th>
							<th>บาร์โค๊ด</th>
							<th>ทีม/ไซต์เสื้อ</th>
							<th>วันลงทะเบียน/กำหนดจ่ายเงิน</th>
							<th>วันที่จ่ายเงิน</th>
							<th>สถานะการจ่าย</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
					$db->select('*')->from('registration')->where(array('Status'=>1, 'PaidStatus'=>1));
					$sql = $db->get();
					foreach( $sql->result_array() as $arr ){
					?>
						<tr <?php if($arr['RacePackStatus'] == 1) { ?> style="background-color:#BFE6A9" <?php } ?>>
							<td id="tdNameTH_<?php echo $arr['ID']; ?>"><?php echo $arr['Name_th']; ?></td>
							<td id="tdNameEN_<?php echo $arr['ID']; ?>"><?php echo $arr['Name_en']; ?></td>
							<td><?php echo $arr['IDNumber']; ?></td>
							<td>
								Tel: <?php echo $arr['Phone']; ?>
								<br>
								Email: <?php echo $arr['Email']; ?>
							</td>
							<td><?php echo $arr['Barcode']; ?></td>
							<td id="tdTeam_<?php echo $arr['ID']; ?>">
								<?php
								$team = $arr['Team']==1 ? 'Batman':'Superman';
								if( $arr['TshirtSize']=='s' ) :
									$size = 'S รอบอก / Chest 36"';
								elseif ( $arr['TshirtSize']=='m' ) :
									$size = 'M รอบอก / Chest 38"';
								elseif ( $arr['TshirtSize']=='l' ) :
									$size = 'L รอบอก / Chest 40"';
								elseif ( $arr['TshirtSize']=='xl' ) :
									$size = 'XL รอบอก / Chest 42"';
								elseif ( $arr['TshirtSize']=='xxl' ) :
									$size = 'XXL รอบอก / Chest 44"';
								endif ;
								echo $team.' Size: '.$size;
								?>
							</td>
							<td>
								<?php echo $arr['CreateDate']; ?>
								<br>
								<span style="color:red">
								<?php $regis_date=date_create($arr['CreateDate']);?>
				    			<?php echo date('Y-m-d H:i:s', strtotime('+2 days 9 hour', strtotime(date_format($regis_date,"Y-m-d")))); ?>
								<?php #echo date('Y-m-d H:i:s', strtotime('+2 days 9 hour', strtotime($arr['CreateDate']))); ?>
								</span>
							</td>
							<td><?php echo $arr['UpdateDate']; ?></td>
							<td><?php echo $paidstatus = $arr['PaidStatus']==0 ? 'ยังไม่ได้ชำระ':'ชำระแล้ว'; ?></td>
							<td>
							<?php if($arr['RacePackStatus'] != 1) { ?>
								<button type="button" class="btn btn-warning" id="btnRacePack_<?php echo $arr['ID'];?>" onclick="$.racepackAction('<?php echo $arr['ID'];?>')" value="<?php echo $arr['ID']; ?>">Race Pack</button>
							<?php } else { ?>
								<button type="button" class="btn btn-default" disabled>Race Pack</button>
							<?php } ?>
							</td>
						</tr>
					<? } ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	</body>

	<script>
	    $(document).ready( function () {
	  		$('#paid > table').DataTable();

	  		$.racepackAction = function(id) {
	  			var value = id;
	  			var runner = $('#tdNameTH_'+id).html();
	  			var size = $('#tdTeam_'+id).html();
				if (confirm("ยืนยันการรับของ \n"+"คุณ "+runner+"\nT-Shirt:"+size)) {
					$.ajax({
						   type: "POST",
						   url: "race_pack.php",
						   data: "search_key="+value,
						   success: function(msg){
							   window.location.reload();
						   }
					});
				} else {
					return false;
				}
	  		}

	    });
	</script>
</html>