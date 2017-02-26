<?php
if( !isset($_POST['data']) || empty($_POST['data']) ){
	exit(0);
}
include('function.php');

$data = $_POST['data'];
$decypt = decrypt($data,'barcode');
$ex = explode('#', $decypt);
$barcode = $ex[0];
// $barcode = $_GET['b'];
$db->select('*')->from('registration')->where(array('ID'=>$barcode));
$sql = $db->get();
$row = $sql->num_rows();

if( $row == 0 ) exit(0);
$arr = $sql->row_array();
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
		<script type="text/javascript" src="js/register.js"></script>

		<style>
			
		</style>
    </head>

    <body>
    	<a class="btn btn-success btnPrint" style="position:absolute;top:5px;right:5px;z-index:2">Print</a>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12" style="text-align:center">
    				<img src="img/500x300.jpg" class="img-responsive" style="display:inline">
    			</div>
    		</div>
    		<div class="row" style="margin-bottom:5px">
    			<div class="col-md-12" style="text-align:center;">
    				<h2>ใบแจ้งชำระค่าลงทะเบียน</h2>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12">
    				<table class="table" id="user-profile">
    					<tr>
		    				<td style="width:50%"><span class="txt-title">ชื่อ/นามสกุล(ภาษาไทย)</span> : <?php echo $arr['Name_th']; ?></td>
		    				<td style="width:50%"><span class="txt-title">First/Last name(English)</span> : <?php echo $arr['Name_en']; ?></td>
		    			</tr>
		    			<tr>
		    				<td><span class="txt-title">เลขบัตรประชาชน (ID Card)</span> : <?php echo $arr['IDNumber']; ?></td>
		    				<td><span class="txt-title">วัน เดือน ปีเกิด (Birthday)</span> : <?php echo $arr['Birthdate']; ?> อายุ(Age) <?php echo $arr['Age']; ?> ปี</td>
		    			</tr>
		    			<tr>
		    				<td><span class="txt-title">เพศ (Gender)</span> : <?php echo $gender = $arr['Gender']==1 ? 'ชาย':'หญิง'; ?></td>
		    				<td><span class="txt-title">สัญชาติ (Nationality)</span> : <?php echo $arr['Nationality']; ?></td>
		    			</tr>
		    			<tr>
		    				<td><span class="txt-title">โทรศัพท์ (Mobile Phone)</span> : <?php echo $arr['Phone']; ?></td>
		    				<td><span class="txt-title">อีเมล (E-mail address)</span> : <?php echo $arr['Email']; ?></td>
		    			</tr>
		    			<tr>
		    				<td><span class="txt-title">ที่อยู่ที่ติดต่อได้ (Postal Address or Mailing Address)</span></td>
		    				<td>
		    					<?php echo $arr['Address']; ?> 
		    					<?php echo $arr['City']; ?> 
		    					<?php echo $arr['Province']; ?> <?php echo $arr['Postcode']; ?>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>
		    					<span class="txt-title">ชื่อติดต่อบุคคลอ้างอิงในกรณีฉุกเฉิน (Emergency Contact: Name)</span> : <?php echo $arr['RefContact']; ?>
		    				</td>
		    				<td><span class="txt-title">เบอร์โทร (Mobile Phone)</span> : <?php echo $arr['RefContactPhone']; ?></td>
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
	    						if( $arr['TshirtSize'] == 's' ) {
	    							$shirt = 'S รอบอก / Chest 36"';
	    						} else if( $arr['TshirtSize'] == 'm' ) {
	    							$shirt = 'M รอบอก / Chest 38"';
	    						} else if( $arr['TshirtSize'] == 'l' ) {
	    							$shirt = 'L รอบอก / Chest 40"';
	    						} else if( $arr['TshirtSize'] == 'xl' ) {
	    							$shirt = 'XL รอบอก / Chest 42"';
	    						} else if( $arr['TshirtSize'] == 'xxl' ) {
	    							$shirt = 'XXL รอบอก / Chest 44"';
	    						}
	    					?>
    						<td><?php echo $team = $arr['Team']==1 ? 'Batman':'Superman'; ?></td>
    						<td><?php echo $shirt; ?></td>
    						<td class="bk-ccc">1060.00</td>
    						<?php $regis_date=date_create($arr['CreateDate']);?>
    						<?php $duedate = date('d-m-Y H:i:s', strtotime('+2 days 9 hour', strtotime(date_format($regis_date,"Y-m-d")))); ?>
    						<td class="bk-ccc" style="font-size:16px;font-weight:bold;color:red"><?php echo $duedate; ?></td>
    					</tr>
    				</table>
    				<div style="text-align:center">
    					<div><b>โปรดชำระเงินภายในวันที่ (Due Date) <?php echo $duedate; ?></b></div>
    					<img alt="testing" src="lib/barcode.php?text=<?php echo getBarcode($arr['ID']); ?>" />
    					<div><?php echo getBarcode($arr['ID']); ?></div>
    					<h4 id="msg-warning" style="color:red">* หากเลยกำหนดชำระ กรุณาลงทะเบียนใหม่ เพื่อรับ barcode ใหม่</h4>
    				</div>
    			</div>

    			<div class="col-md-12" style="text-align:right">
    				<div>* นำไปชำระค่าลงทะเบียนที่ เคาน์เตอร์ เซอร์วิส ออล ทิกเก็ต ในเซเว่นอีเลฟเว่น ทุกสาขาทั่วประเทศ <img src="img/images.png" style="height:35px" /></div>
<!--     				<div>* นำหลักฐานการชำระเงิน (สลิป) พร้อมใบสมัครลงทะเบียนการวิ่งมารับเสื้อวิ่งวันที่ 31 มีนาคม ที่ลานด้านหน้าเซ็นทรัล เวิดล์ (TBC)</div> -->
    			</div>
    		</div>
    	</div>
    </body>
</html>