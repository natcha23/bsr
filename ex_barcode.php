<?php
header('Content-Type: text/html; charset=utf-8');
require_once('function.php');
require_once('lib/ClassesPHPExel/PHPExcel/IOFactory.php');

echo $exdate1 = date('Y-m-d H:i:s', strtotime('+2 day 9 hour', strtotime(date('Y-m-d'))));
echo '<br>';
echo $exdate2 = date('Y-m-d H:i:s', strtotime('-2 day 9 hour', strtotime(date('Y-m-d'))));
echo '<br>';

// $db->select('*')->from('barcode')->where(array('status'=>1, 'regist_id'=>0));
// $db->order_by('date_updated asc');
// $sql = $db->get();
// $count = 0;
// foreach( $sql->result_array() as $arr ) { 
// 	$count++;
// }
// echo $count;
// echo '<hr>';

// $db->select('*')->from('barcode')->where(array('status'=>1, 'regist_id !='=>0));
// $db->order_by('date_updated asc');
// $sql = $db->get();
// $i = 0;
// foreach( $sql->result_array() as $arr ) {
// 	$i++;
// 	// echo $i.' => '.$arr['barcode'].' => status:'. $arr['status'] .' registed_id:'. $arr['regist_id'] .' date_update:'.$arr['date_updated'];
// 	$db->update('barcode', array('status'=>2, 'date_updated'=>date('Y-m-d').' 09:00:00'), array('id'=>$arr['id']));
// 	echo '<hr>';
// }

// $db->select('*')->from('registration')->where(array('Status'=>1, 'PaidStatus'=>0, 'CreateDate <='=>$exdate2));
// $sql = $db->get();
// echo $db->last_query();
// foreach( $sql->result_array() as $arr ){
// 	echo $arr['ID'];
// 	echo '<hr/>';
// }

// $obj= new PHPExcel();
// $obj->setActiveSheetINdex(0)
// 	->setCellValue('A1', 'No')
// 	->setCellValue('B1', 'Barcode');

// $db->select('*')->from('barcode')->where(array(
// 	'status' => 2, 
// 	'regist_id !=' => 0
// ));
// $db->order_by('date_updated asc');
// $sql = $db->get();
// $i = 1;
// foreach( $sql->result_array() as $arr ) {
// 	$i++;
// 	$obj->getActiveSheet()->setCellValue( 'A'. $i, $i - 1 );
// 	$obj->getActiveSheet()->setCellValueExplicit( 'B'. $i, $arr['barcode'], PHPExcel_Cell_DataType::TYPE_STRING );
// }
// $objWriter = PHPExcel_IOFactory::createWriter( $obj, 'Excel2007' );
// $dir_path = 'excelfile/';
// if( !is_dir($dir_path) ) {
// 	mkdir($dir_path);
// 	chmod($dir_path, 0777);
// }
// $file_name = $dir_path .'/barcode_expired_all.xlsx';
// $objWriter->save($file_name);

// echo '<a href="'.$file_name .'" target="_blank">'. $file_name .'</a>';

// $obj= new PHPExcel();
// $obj->setActiveSheetINdex(0)
// 	->setCellValue('A1', 'No')
// 	->setCellValue('B1', 'Barcode')
// 	->setCellValue('C1', 'Expried');

// $dates = array('2016-03-12','2016-03-13','2016-03-14');
// $i = 1;
// foreach( $dates as $date ) {
// 	$db->select('*')->from('registration');
// 	$db->like('CreateDate', $date, 'both');
// 	$sql = $db->get();
// 	foreach( $sql->result_array() as $arr ){
// 		$db->select('barcode.barcode, barcode.expired')->from('booking_register');
// 		$db->join('barcode', 'barcode.id = booking_register.barcodeID', 'inner');
// 		$db->where(array('booking_register.regisID'=>$arr['ID']));
// 		$sql = $db->get();
// 		$rs = $sql->row_array();
// 		echo $arr['ID'].' create date:'. $arr['CreateDate'] .' barcode:'.$rs['barcode'].' expired:'.$rs['expired'].' paydate:'.$arr['PayDate'];
// 		echo '<hr>';
// 		$i++;
// 		$obj->getActiveSheet()->setCellValue( 'A'. $i, $i - 1 );
// 		$obj->getActiveSheet()->setCellValueExplicit( 'B'. $i, $rs['barcode'], PHPExcel_Cell_DataType::TYPE_STRING );
// 		$obj->getActiveSheet()->setCellValueExplicit( 'C'. $i, $rs['expired'], PHPExcel_Cell_DataType::TYPE_STRING );
// 	}
// }

// $objWriter = PHPExcel_IOFactory::createWriter( $obj, 'Excel2007' );
// $dir_path = 'excelfile/';
// if( !is_dir($dir_path) ) {
// 	mkdir($dir_path);
// 	chmod($dir_path, 0777);
// }
// $file_name = $dir_path .'/barcode_expired_'. date('Ymd') .'.xlsx';
// $objWriter->save($file_name);

// echo '<a href="'.$file_name .'" target="_blank">'. $file_name .'</a>';

$obj= new PHPExcel();
$obj->setActiveSheetINdex(0)
	->setCellValue('A1', 'No')
	->setCellValue('B1', 'Barcode')
	->setCellValue('C1', 'Expried');
	
$date = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
$db->select('*')->from('registration');
$db->like('CreateDate', $date, 'both');
$sql = $db->get();
foreach( $sql->result_array() as $arr ){
	$db->select('barcode.barcode, barcode.expired')->from('booking_register');
	$db->join('barcode', 'barcode.id = booking_register.barcodeID', 'inner');
	$db->where(array('booking_register.regisID'=>$arr['ID']));
	$sql = $db->get();
	$rs = $sql->row_array();
	echo $arr['ID'].' create date:'. $arr['CreateDate'] .' barcode:'.$rs['barcode'].' expired:'.$rs['expired'].' paydate:'.$arr['PayDate'];
	echo '<hr>';
	$i++;
	$obj->getActiveSheet()->setCellValue( 'A'. $i, $i - 1 );
	$obj->getActiveSheet()->setCellValueExplicit( 'B'. $i, $rs['barcode'], PHPExcel_Cell_DataType::TYPE_STRING );
	$obj->getActiveSheet()->setCellValueExplicit( 'C'. $i, $rs['expired'], PHPExcel_Cell_DataType::TYPE_STRING );
}

$objWriter = PHPExcel_IOFactory::createWriter( $obj, 'Excel2007' );
$dir_path = 'excelfile/';
if( !is_dir($dir_path) ) {
	mkdir($dir_path);
	chmod($dir_path, 0777);
}
$file_name = $dir_path .'/barcode_expired_'. date('Ymd') .'.xlsx';
$objWriter->save($file_name);

echo '<a href="'.$file_name .'" target="_blank">'. $file_name .'</a>';