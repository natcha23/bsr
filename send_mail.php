<?php
require 'function.php';

// send email
// $message = "เรียน คุณ ทดสอบ<br><br>";
// $message .= "กำหนดการ และ สถานที่จัดกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN"; 
// $subject = "กำหนดการ และ สถานที่จัดกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN";
// $from = "ผู้จัดกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN";
// $file = 'img/A3.jpg';

// if(file_exists($file)){
// 	echo 'file exists';
// }else{
// 	echo 'file not exists';
// }
// echo '<hr/>';

// $sendmail = send_mail('bj.veevacrazy@gmail.com', $subject, $message ,$from, $file);
// echo $sendmail;

$db->select('*')->from('registration');
$db->where(array(
	'PaidStatus' => 1,
	'Status' => 1,
	'SendMail' => 0
));
$db->order_by('CreateDate asc');
$db->limit(20);
$sql = $db->get();
echo $sql->num_rows();
echo '<hr/>';
$i = 0;
foreach( $sql->result_array() as $arr ) {
	$i++;
	// send email
	$message = "เรียน คุณ ". $arr['Name_en'] ."<br><br>";
	$message .= "กำหนดการ และ สถานที่จัดกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN"; 
	$subject = "กำหนดการ และ สถานที่จัดกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN";
	$from = "ผู้จัดกิจกรรม BATMAN Vs SUPERMAN MIDNIGHT RUN";
	$file = 'img/slip.jpg';
	if(file_exists($file)){
		$sendmail = send_mail($arr['Email'], $subject, $message ,$from, $file);
		$db->update('registration', array('SendMail'=>1), array('ID'=>$arr['ID']));
	}
	echo $i .' '. $arr['ID'] .'name'. $arr['Name_en'] .' Email:'. $arr['Email'].' Barcode:'.$arr['Barcode'];
	echo '<hr/>';
}
?>

<script type="text/javascript">
	setInterval(function(){ 
		window.location.reload(); 
	}, 20000);
</script>