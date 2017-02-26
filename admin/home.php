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
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title>
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
		</style>
    </head>

    <body>
    <div class="container-fluid" style="padding:20px">
    <a href="logout.php" class="btn btn-danger" style="position:absolute; right:5px; top:5px; z-index:2">Sign out</a>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="4" style="text-align: center">จำนวนผู้ลงทะเบียนทั้งหมดแต่ละทีม</th>
					</tr>
					<tr>
						<th>ทีม</th>
						<th>จำนวนผุ้ลงทะเบียน</th>
						<th>ชำระเงินแล้ว</th>
						<th>ยังไม่ได้ชำระเงิน</th>
					</tr>
				</thead>
				<?php
				$db->select('*')->from('registration')->where(array('Status'=>1));
				$sql = $db->get();
				$batman = 0;
				$batman_paid = 0;
				$batman_unpaid = 0;
				$superman = 0;
				$superman_paid = 0;
				$superman_unpaid = 0;
				foreach( $sql->result_array() as $arr ){
					if( $arr['Team'] == 1 ){
						$batman++;
						if( $arr['PaidStatus'] == 1 ) {
							$batman_paid++;
						} else {
							$batman_unpaid++;
						}
					} 
					if( $arr['Team'] == 2 ){
						$superman++;
						if( $arr['PaidStatus'] == 1 ) {
							$superman_paid++;
						} else {
							$superman_unpaid++;
						}
					}
				}
				?>
				<tbody>
					<tr>
						<td>Batman</td>
						<td><?php echo $batman; ?></td>
						<td><?php echo $batman_paid; ?></td>
						<td><?php echo $batman_unpaid; ?></td>
					</tr>
					<tr>
						<td>Superman</td>
						<td><?php echo $superman; ?></td>
						<td><?php echo $superman_paid; ?></td>
						<td><?php echo $superman_unpaid; ?></td>
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
						<td><b><?php echo totalShirt(1, 's'); ?></b> | <?php echo $batman_s; ?></td>
						<td><b><?php echo totalShirt(1, 'm'); ?></b> | <?php echo $batman_m; ?></td>
						<td><b><?php echo totalShirt(1, 'l'); ?></b> | <?php echo $batman_l; ?></td>
						<td><b><?php echo totalShirt(1, 'xl'); ?></b> | <?php echo $batman_xl; ?></td>
						<td><b><?php echo totalShirt(1, 'xxl'); ?></b> | <?php echo $batman_xxl; ?></td>
						<td><b><?php echo $batman_total; ?></td>
					</tr>
					<tr>
						<td>Superman</td>
						<td><b><?php echo totalShirt(2, 's'); ?></b> | <?php echo $superman_s; ?></td>
						<td><b><?php echo totalShirt(2, 'm'); ?></b> | <?php echo $superman_m; ?></td>
						<td><b><?php echo totalShirt(2, 'l'); ?></b> | <?php echo $superman_l; ?></td>
						<td><b><?php echo totalShirt(2, 'xl'); ?></b> | <?php echo $superman_xl; ?></td>
						<td><b><?php echo totalShirt(2, 'xxl'); ?></b> | <?php echo $superman_xxl; ?></td>
						<td><?php echo $superman_total; ?></td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified" style="margin-bottom: 5px">
				  	<li role="presentation" id="li-unpaid" class="active" onclick="$.show('unpaid')"><a href="#">บาร์โค๊ดที่ยังชำระเงินแล้ว</a></li>
				  	<li role="presentation" id="li-paid" onclick="$.show('paid')"><a href="#">บาร์โค๊ดที่ชำระเงินแล้ว</a></li>
				</ul>

				<div id="unpaid">
					<table class="table table-bordered" id="table-unpaid">
					<thead>
						<tr>
							<th>ชื่อภาษาไทย</th>
							<th>ชื่อภาษาอังกฤษ</th>
							<th>เลขบัตรประชาชน</th>
							<th>เบอร์โทรศัพท์/อีเมล</th>
							<th>บาร์โค๊ด</th>
							<th>ทีม/ไซต์เสื้อ</th>
							<th>วันลงทะเบียน/กำหนดจ่ายเงิน</th>
							<th>สถานะการจ่าย</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$db->select('registration.*, barcode.barcode')->from('registration')->where(array('registration.Status'=>1, 'registration.PaidStatus'=>0));
					$db->join('booking_register', 'booking_register.regisID = registration.ID', 'inner');
					$db->join('barcode', 'barcode.id = booking_register.barcodeID', 'inner');
					$sql = $db->get();
					foreach( $sql->result_array() as $arr ){
					?>
						<tr>
							<td><?php echo $arr['Name_th']; ?></td>
							<td><?php echo $arr['Name_en']; ?></td>
							<td><?php echo $arr['IDNumber']; ?></td>
							<td>
								Tel: <?php echo $arr['Phone']; ?>
								<br>
								Email: <?php echo $arr['Email']; ?>
							</td>
							<td><?php echo $arr['barcode']; ?></td>
							<td>
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
								<?php echo date('Y-m-d H:i:s', strtotime('+48 hour', strtotime($arr['CreateDate']))); ?>
								</span>
							</td>
							<td>
								<?php echo $paidstatus = $arr['PaidStatus']==0 ? 'ยังไม่ได้ชำระ':'ชำระแล้ว'; ?> 
								<?php $encode = encrypt($arr['ID'].'#'.time(),'cancle'); ?>
								<button class="btn btn-xs btn-warning" onclick="$.cancle('<?php echo $encode; ?>')">ยกเลิก</button>
							</td>
						</tr>
					<? } ?>
					</tbody>
					</table>
				</div>

				<div id="paid" style="display: none">
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
						</tr>
					</thead>
					<tbody>
					<?php
					$db->select('*')->from('registration')->where(array('Status'=>1, 'PaidStatus'=>1));
					$sql = $db->get();
					foreach( $sql->result_array() as $arr ){
					?>
						<tr>
							<td><?php echo $arr['Name_th']; ?></td>
							<td><?php echo $arr['Name_en']; ?></td>
							<td><?php echo $arr['IDNumber']; ?></td>
							<td>
								Tel: <?php echo $arr['Phone']; ?>
								<br>
								Email: <?php echo $arr['Email']; ?>
							</td>
							<td><?php echo $arr['Barcode']; ?></td>
							<td>
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
								<?php echo date('Y-m-d H:i:s', strtotime('+48 hour', strtotime($arr['CreateDate']))); ?>
								</span>
							</td>
							<td><?php echo $arr['UpdateDate']; ?></td>
							<td><?php echo $paidstatus = $arr['PaidStatus']==0 ? 'ยังไม่ได้ชำระ':'ชำระแล้ว'; ?></td>
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

	    	$.cancle = function(data){
	    		var dialog = $('<div />');
	    		$(dialog).dialog({
	    			modal: true,
	    			resizable: false, 
	    			width: 'auto',
	    			height: 'auto',
	    			'close': function(){
	    				window.location.reload();
	    			}
	    		});

	    		var h3 = $('<h3 />').html('ระบุชื่อผู้ทำการยกเลิก');
	    		var input = $('<input />',{ 'type':'text', 'id':'name', 'class':'form-control' });
	    		var div = $('<div />').css({ 'float':'right', 'margin-top':'5px' });
	    		var btn_save = $('<button />',{ 'class':'btn btn-xs btn-success' }).html('บันทึก');
	    		var btn_cancle = $('<button />',{ 'class':'btn btn-xs btn-danger' }).css({ 'margin-left':'5px' }).html('ยกเลิก');

	    		$(btn_save).click(function(){
	    			var name = $.trim($('#name').val());
	    			if( name != '' ){
	    				if( confirm('ยืนยันการยกเลิก') == true ) {
	    					$.post( 'cancle_regist.php', { data:data, name:name }, function(html){
								$(dialog).dialog('close');
		    				});
	    				}
	    			}
	    		});
	    		$(btn_cancle).click(function(){
	    			$(dialog).dialog('close');
	    		});

	    		$(dialog).append(h3);
	    		$(dialog).append(input);
	    		$(div).append(btn_save);
	    		$(div).append(btn_cancle);
	    		$(dialog).append(div);
	    	}
	    	// $('#unpaid > table').bdt();
	  		// $('#paid > table').bdt();
	  		$('#unpaid > table').DataTable();
	  		$('#paid > table').DataTable();

	        $.show = function( status ){
	        	$('ul.nav > li').removeClass('active');
	        	$('#li-'+ status).addClass('active');
	        	if( status == 'paid' ) {
	        		$('#paid').show();
	        		$('#unpaid').hide();
	        	} else {
					$('#unpaid').show();
	        		$('#paid').hide();
	        	}
	        }
	    });
	</script>
</html>