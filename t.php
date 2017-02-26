<?php
require 'function.php';

// $exdate = date('Y-m-d H:i:s', strtotime('-48 hour', strtotime(date('Y-m-d H:i:s'))));
// echo $exdate.'<hr>';

// $db->select('*')->from('registration')->where(array('Status'=>1, 'PaidStatus'=>0, 'CreateDate <='=>$exdate));
// $sql = $db->get();

// foreach( $sql->result_array() as $arr ){
// 	$db->select('*')->from('booking_register')->where(array('regisID'=>$arr['ID']));
// 	$sql = $db->get();
// 	$num = $sql->num_rows();
// 	$rs = $sql->row_array();

// 	echo $arr['ID'].' => '.$arr['CreateDate'].' < '. $exdate .' ===> row: '. $rs['Status'] .'<hr>';

	// $db->update('registration', array('Status'=>0), array('ID'=>$arr['ID']));
	// $db->update('barcode', array('status'=>1), array('id'=>$rs['barcodeID']));

	// $db->select('*')->from('tshirt')->where(array('ID'=>$rs['tshirtID']));
	// $sql = $db->get();
	// $row_shirt = $sql->row_array();
	// if( $row_shirt['Remain'] < $row_shirt['Total'] ){
	// 	$db->update('tshirt', array('Remain'=>$row_shirt['Remain']+1), array('ID'=>$arr['tshirtID']));
	// }
	// $db->update('booking_register', array('Status'=>2), array('ID'=>$rs['ID']));
// }

$db->select('Barcode, COUNT(Barcode) as sum')->from('registration')->where(array('Status'=>1, 'PaidStatus'=>1));
$db->group_by('Barcode');
$db->order_by('Barcode');
$sql = $db->get();
$i = 0;
foreach( $sql->result_array() as $arr ){
	$i++;
	echo $i.' => '.$arr['Barcode'].' => '.$arr['sum'];
	echo '<hr>';
}
?>