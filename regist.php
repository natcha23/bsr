<?php 
require_once('function.php');

$now = date('Y-m-d H:i:s');
$eventName = "BatmanSupermanRun";

updateData();
$exdate = date('Y-m-d H:i:s', strtotime('+2 day 9 hour', strtotime(date('Y-m-d'))));
if(!empty($_POST['birthday'])) {
	$day = explode("-", $_POST['birthday']);
	$birthdate = $day[2]."-".$day[1]."-".$day[0];
}
/* Check T-Shirt */
$db->select("*")->from("tshirt");
$db->where(array("Type" => $_POST['team'], "Size" => $_POST['shirt'], "Remain > " => 0));
$sql = $db->get();
$tshirt_count = $sql->num_rows();
$tshirt_row = $sql->row_array();

/* Check Barcode */
$db->select("*")->from("barcode")->where(array("status" => 1))->order_by('date_updated asc')->limit(1);
$sql = $db->get();
$barcode_count = $sql->num_rows();
$barcode_row = $sql->row_array();

if($tshirt_count > 0 && $barcode_count > 0) {
	
	$fields = array(
			"EventName" => $eventName,
			"Name_th" => $_POST['name_th'],
			"Name_en" => $_POST['name_en'],
			"IDNumber" => $_POST['idcard'],
			"Birthdate" => (!empty($birthdate))? $birthdate:$_POST['birthday'],
			"Age" => $_POST['age'],
			"Gender" => $_POST['gerder'],
			"Nationality" => $_POST['nationality'],
			"Address" => $_POST['address'],
			"City" => $_POST['city'],
			"Province" => $_POST['province'],
			"Postcode" => $_POST['postcode'],
			"Phone" => $_POST['mobile'],
			"Email" => $_POST['email'],
			"RefContact" => $_POST['refer-name'],
			"RefContactPhone" => $_POST['refer-phone'],
			"Team" => $_POST['team'],
			"TshirtSize" => $_POST['shirt'],
			"CreateDate" => $now,
			"UpdateDate" => $now,
 			"PayDate" => $exdate,
			"PaidStatus" => 0
	);
	
	$db->insert("registration", $fields);
	$last_id = $db->insert_id();
	
	if($last_id) {
		
		$booking_field = array(
				"regisID" => $last_id,
				"barcodeID" => $barcode_row['id'],
				"tshirtID" => $tshirt_row['ID'],
				"PayDate" => $exdate,
				"Status" => 0,
				"CreateDate" => $now
		);
		$db->insert("booking_register", $booking_field);
		$booking_id = $db->insert_id();
		
		$db->update("barcode", array("regist_id" => $last_id, "status" => 0, "expired" => $exdate), array("id" => $barcode_row['id']));
		$db->update("tshirt", array("Remain" => $tshirt_row['Remain']-1, "UpdateDate" => $now), array("ID" => $tshirt_row['ID']));
		
		
		// send email
		$message = "เรียน คุณ ".$_POST['name_th']."<br><br>";
		$message .= "ท่านได้ลงทะเบียนกับกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN เรียบร้อยแล้ว<br>
				 สามารถตรวจสอบการลงทะเบียนได้ทาง http://www.batmanvsupermanrunth.com/paid_check.php <br><br>
				ขอขอบคุณที่ร่วมกิจกรรมกับเรา"; 
		$subject = "แจ้งยืนยันการสมัครและการชำระเงิน สำหรับกิจกรรม BATMAN V SUPERMAN MIDNIGHT RUN";
		$from = "ผู้จัดกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN";
		$file = 'img/slip.jpg';
		
		send_mail($_POST['email'], $subject, $message ,$from, $file);
		
		
		$encode = encrypt($last_id.'#'.$booking_id,'barcode');
	echo '
		<form action="print_slip.php" method="post" id="myForm">
			<input type="hidden" name="data" value="'. $encode .'">
		</form>		
		<script>document.getElementById("myForm").submit();</script>	
		';
// 		header( "location:print_slip.php?b=". $last_id );
	// 	}
	}
} else {
	
		header( "location:history_back.php" );
}
?>

