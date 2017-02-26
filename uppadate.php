<?php
header('Content-Type: text/html; charset=utf-8');
require_once('function.php');
require_once('lib/ClassesPHPExel/PHPExcel/IOFactory.php');
echo $expired_start = date('Y-m-d H:i:s', strtotime('+9 hour', strtotime(date('Y-m-d'))));
echo '<hr>';

$obj= new PHPExcel();
$obj->setActiveSheetINdex(0)
	->setCellValue('A1', 'No')
	->setCellValue('B1', 'Barcode')
	->setCellValue('C1', 'Expired');

$db->select('*')->from('barcode')->where(array(
	'regist_id !=' => 0, 
));
$db->where_in('status', array(1,2));
$db->order_by('expired asc');
$sql = $db->get();
$i = 1;
foreach( $sql->result_array() as $arr ){ $i++;
	echo $i.' => '.$arr['barcode'].' status: '.$arr['status'].' regist_id: '.$arr['regist_id'].' date_update: '.$arr['date_updated'].' => '.$arr['expired'];
	$obj->getActiveSheet()->setCellValue( 'A'. $i, $i - 1 );
	$obj->getActiveSheet()->setCellValueExplicit( 'B'. $i, $arr['barcode'], PHPExcel_Cell_DataType::TYPE_STRING );
	$obj->getActiveSheet()->setCellValueExplicit( 'C'. $i, $arr['expired'], PHPExcel_Cell_DataType::TYPE_STRING );
	// $expire = explode(' ', $arr['date_updated']);
	// $new_expire = date('Y-m-d H:i:s', strtotime('+2day 9 hour', strtotime($expire[0])));
	// echo '<br>new Expire => '.$new_expire;
	// $db->update('barcode', array('expired'=>$new_expire), array('id'=>$arr['id']));
	echo '<hr>';
}

$db->select('barcode.*')->from('barcode');
$db->join('registration', 'registration.ID = barcode.regist_id','left');
$db->where(array(
	'registration.PaidStatus !=' => 1,
	'registration.PayDate <=' => $expired_start, 
	'barcode.status' => 0
));
$sql = $db->get();

foreach( $sql->result_array() as $arr ) { $i++;
	echo $i.' => '.$arr['barcode'].' status: '.$arr['status'].' regist_id: '.$arr['regist_id'].' date_update: '.$arr['date_updated'].' => '.$arr['expired'];
	$obj->getActiveSheet()->setCellValue( 'A'. $i, $i - 1 );
	$obj->getActiveSheet()->setCellValueExplicit( 'B'. $i, $arr['barcode'], PHPExcel_Cell_DataType::TYPE_STRING );
	$obj->getActiveSheet()->setCellValueExplicit( 'C'. $i, $arr['expired'], PHPExcel_Cell_DataType::TYPE_STRING );
	// $db->update('barcode', array('expired'=>$expired_start), array('id'=>$arr['id']));
	echo '<hr>';
}

$objWriter = PHPExcel_IOFactory::createWriter( $obj, 'Excel2007' );
$dir_path = 'excelfile/';
if( !is_dir($dir_path) ) {
	mkdir($dir_path);
	chmod($dir_path, 0777);
}
$file_name = $dir_path .'/barcode_expired_all.xlsx';
$objWriter->save($file_name);

echo '<a href="'.$file_name .'" target="_blank">'. $file_name .'</a>';