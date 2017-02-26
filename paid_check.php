<?php
include('function.php');
define('_HTTP_PATH_','http://'.str_replace($_SERVER['DOCUMENT_ROOT'],$_SERVER['HTTP_HOST'],dirname($_SERVER['SCRIPT_FILENAME'])));

if(!empty($_POST['search_key'])) {
	$db->select('*')->from('registration');
	$db->where(array('registration.Status'=>1));
	$db->where(array('registration.IDNumber'=>$_POST['search_key']));
	$db->or_where(array('registration.Barcode'=>$_POST['search_key']));
	$db->order_by("ID ASC");
	$db->limit(1);
	
	$sql = $db->get();
// 	echo $db->last_query();
	$row = $sql->num_rows();
	
}
?>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Search</title>
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
		<script type="text/javascript" src="js/register.js"></script>

		<style>
			.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
				/*border: none !important;*/
			}
		</style>
    </head>

    <body>

    	<div class="row-fluid">
    		<div class="row">
    			<div class="col-md-12" style="text-align:center">
    				<img src="img/500x300.jpg" class="img-responsive" style="display:inline">
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12" style="text-align:center">
    				<!-- <h2>การแข่งขัน  BATMAN VS SUPERMAN MIDNIGHT RUN</h2> -->
    				<h3>ค้นหาข้อมูลการลงทะเบียน <span style="font-size:16px">( สามารถตรวจสอบผลการชำระเงินได้หลังเวลา 9 นาฬิกาของวันถัดไป )</span></h3>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12">
			    	<form action="" method="post" name="form-regist" id="form-regist"> 
			    		<table class="table table-responsive">
			    			<tr>
			    				<td style="text-align: center">
			    					<h4 style="color:red">ใส่หมายเลขบัตรประชาชน หรือ หมายเลขพาสปอร์ต หรือ บาร์โค้ด</h4>
			    					<input type="text" class="form-control" style="width:90%; display:inline" id="search_key" name="search_key" data-validetta="required" data-vd-message-required="กรอกหมายเลขบาร์โค้ดหรือหมายเลขบัตรประชาชน">
			    					<button type="submit" class="btn btn-primary">ค้นหา</button>
			    					<h5 style="color:#BF0011">* หากค้นหาด้วยหมายเลขบัตรประชาชนแล้วไม่เจอข้อมูล ให้ค้นด้วยบาร์โค้ดที่นำไปชำระเงิน</h5>
			    				</td>
			    			</tr>
			    			
			    		</table>
			    	</form>
			    	<?php if (isset($row) && $row > 0) {
			    		$result = $sql->row_array();
			    		//echo '<pre>'.print_r($result, 1).'</pre>';
			    		if($result['PaidStatus'] == 0) {
			    			$db->select("barcode")->from("barcode")->where('regist_id',$result['ID']);
			    			$sql = $db->get();
			    			
			    			$rows = $sql->row_array();
			    			$barcode = $rows["barcode"];
			    		} else {
			    			$barcode = $result["Barcode"];
			    		}
			    		?>
				    	<table class="table table-responsive">
				    		<tr>
				    			<?php 
				    				if ($result['PaidStatus'] == 1 ) {
				    					$paid=true;
				    					$message = '<h3 style="color:green;">ชำระเงินแล้ว</h3>';
				    				}else{
				    					$paid=false;
				    					$message = '<h3 style="color:red;">ยังไม่ได้ชำระเงิน</h3>';
				    				} 
				    			?>
				    			<td class="inline" style="text-align:center"><?php echo $message; ?></td>
						    	<a class="btn btn-success btnPrintCheck" style="">Print</a>
				    			
				    			
				    		</tr>
				    	
				    	</table>
				    	<div class="container-fluid">
				    		<div class="row" style="margin-bottom:5px">
				    			<div class="col-md-12" style="text-align:center;">
				    				<h2>ใบแจ้งชำระค่าลงทะเบียน</h2>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-12">
				    				<table class="table" id="user-profile">
				    					<tr>
						    				<td style="width:50%"><span class="txt-title">ชื่อ/นามสกุล(ภาษาไทย)</span> : <?php echo $result['Name_th']; ?></td>
						    				<td style="width:50%"><span class="txt-title">First/Last name(English)</span> : <?php echo $result['Name_en']; ?></td>
						    			</tr>
						    			<tr>
						    				<td><span class="txt-title">เลขประชาชน (ID Card)</span> : <?php echo $result['IDNumber']; ?></td>
						    				<td><span class="txt-title">วัน เดือน ปีเกิด (Birthday)</span> : <?php echo $result['Birthdate']; ?> อายุ(Age) <?php echo $result['Age']; ?> ปี</td>
						    			</tr>
						    			<tr>
						    				<td><span class="txt-title">เพศ (Gender)</span> : <?php echo $gender = $result['Gender']==1 ? 'ชาย':'หญิง'; ?></td>
						    				<td><span class="txt-title">สัญชาติ (Nationality)</span> : <?php echo $result['Nationality']; ?></td>
						    			</tr>
						    			<tr>
						    				<td><span class="txt-title">โทรศัพท์ (Mobile Phone)</span> : <?php echo $result['Phone']; ?></td>
						    				<td><span class="txt-title">อีเมล (E-mail address)</span> : <?php echo $result['Email']; ?></td>
						    			</tr>
						    			<tr>
						    				<td><span class="txt-title">ที่อยู่ที่ติดต่อได้ (Postal Address or Mailing Address)</span></td>
						    				<td>
						    					<?php echo $result['Address']; ?> 
						    					<?php echo $result['City']; ?> 
						    					<?php echo $result['Province']; ?> <?php echo $result['Postcode']; ?>
						    				</td>
						    			</tr>
						    			<tr>
						    				<td>
						    					<span class="txt-title">ชื่อติดต่อบุคคลอ้างอิงในกรณีฉุกเฉิน (Emergency Contact: Name)</span> : <?php echo $result['RefContact']; ?>
						    				</td>
						    				<td><span class="txt-title">เบอร์โทร (Mobile Phone)</span> : <?php echo $result['RefContactPhone']; ?></td>
						    			</tr>
				    				</table>
				    			</div>
				    		</div>
				
				    		<div class="row">
				    			<div class="col-md-12">
				    				<table class="table table-bordered" id="pay-detail">
				    					<tr>
				    						<th>ทีม (Team)</th>
				    						<th>ขนาดเสื้อ (T-shirt size)</th>
				    						<th class="bk-ccc">ราคา (Price)</th>
				    						<th class="bk-ccc">ชำระภายในวันที่ (Due Date)</th>
				    					</tr>
				    					<tr>
				    						<?php
					    						if( $result['TshirtSize'] == 's' ) {
					    							$shirt = 'S รอบอก / Chest 36"';
					    						} else if( $result['TshirtSize'] == 'm' ) {
					    							$shirt = 'M รอบอก / Chest 38"';
					    						} else if( $result['TshirtSize'] == 'l' ) {
					    							$shirt = 'L รอบอก / Chest 40"';
					    						} else if( $result['TshirtSize'] == 'xl' ) {
					    							$shirt = 'XL รอบอก / Chest 42"';
					    						} else if( $result['TshirtSize'] == 'xxl' ) {
					    							$shirt = 'XXL รอบอก / Chest 44"';
					    						}
					    					?>
				    						<td><?php echo $team = $result['Team']==1 ? 'Batman':'Superman'; ?></td>
				    						<td><?php echo $shirt; ?></td>
				    						<td class="bk-ccc">1060.00</td>
				    						<?php $regis_date=date_create($result['CreateDate']);?>
				    						<?php $duedate = date('d-m-Y H:i:s', strtotime('+2 days 9 hour', strtotime(date_format($regis_date,"Y-m-d")))); ?>
				    						<td class="bk-ccc" style="font-size:16px;font-weight:bold;color:red"><?php echo $duedate; ?></td>
				    					</tr>
				    				</table>
				    				<div style="text-align:center">
				    					<div><b>โปรดชำระเงินภายในวันที่ (Due Date) <?php echo $duedate; ?></b></div>
				    					<img alt="testing" src="lib/barcode.php?text=<?php echo $barcode; ?>" />
				    					<div><?php echo $barcode; ?></div>
				    					<h4 id="msg-warning" style="color:red">* หากเลยกำหนดชำระ กรุณาลงทะเบียนใหม่ เพื่อรับ barcode ใหม่</h4>
				    					<!-- <h4 id="msg-warning" style="color:red">Barcode is expired in 48 hours. If over 48 hours, please new register.</h4> -->
				    				</div>
				    			</div>
				
				    			<div class="col-md-12" style="text-align:right">
				    				<div>* นำไปชำระค่าลงทะเบียนที่ เคาน์เตอร์ เซอร์วิส ออล ทิกเก็ต ในเซเว่นอีเลฟเว่น ทุกสาขาทั่วประเทศ <img src="<?php echo _HTTP_PATH_;?>/img/images.png" style="height:35px" /></div>
				    				
				    				<!-- <div>* นำหลักฐานการชำระเงิน (สลิป) พร้อมใบสมัครลงทะเบียนการวิ่งมารับเสื้อวิ่งวันที่ 31 มีนาคม ที่ลานด้านหน้าเซ็นทรัล เวิดล์ (TBC)</div> -->
				    			</div>
				    		</div>
				    	</div>
			    	
			    	<?php } else { 
			    		if(!empty($_POST['search_key'])) {
			    	?>
			    	
				    	<table class="table table-responsive">
				    		<tr>
				    			<td class="inline" style="text-align:center"><h3 style="color:blue;">ไม่พบข้อมูลการลงทะเบียน</h3></td>
				    		</tr>
				    	
				    	</table>
			    	
			    	
			    	<?php } } ?>
    			</div>
    		</div>
    	</div>

    </body>
</html>