<?php
header('Content-Type: text/html; charset=utf-8');
require_once('function.php');

echo $exdate = date('Y-m-d H:i:s', strtotime('+9 hour', strtotime(date('Y-m-d'))));
echo '<br>';
$db->select('registration.*')->from('registration');
$db->join('barcode', 'barcode.regist_id = registration.ID', 'inner');
$db->where(array(
	'registration.PayDate <=' => $exdate,
	'registration.PaidStatus' => 1,
	'registration.Status' => 1,
	'barcode.status' => 2
));
$db->order_by('registration.PayDate ASC');
// $db->where(array(
// 	'registration.PayDate <=' => $exdate,
// 	'registration.PaidStatus' => 0,
// 	'registration.Status' => 1
// ));
$sql = $db->get();
foreach( $sql->result_array() as $arr ) {
	echo $arr['ID'].' => '. $arr['Name_th'] .' IDNumber:'. $arr['IDNumber'] .' paydate: '. $arr['PayDate'] .' Status:'. $arr['Status'];
	echo '<hr>';
}