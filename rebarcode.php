<?php
header('Content-Type: text/html; charset=utf-8');
require_once('function.php');
require_once('lib/ClassesPHPExel/PHPExcel/IOFactory.php');

// if( !isset($_GET['file_name']) || empty($_GET['file_name']) ){
// 	exit();
// }

$inputFileName = 'excelfile/final.xls';

//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
    . '": ' . $e->getMessage());
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

$loop = $highestRow / 500;
$loop = ceil($loop);
$start = 0;
$end = 0;

$regIDs = array();
for( $row = 2; $row <= $highestRow; $row++) {
	$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
	foreach($rowData as $index => $val){
		echo $row .' ===> ';
		echo $barcode = $val[1];

		$db->select('registration.*')->from('barcode');
		$db->join('booking_register','barcode.id = booking_register.barcodeID','inner');
		$db->join('registration','registration.ID = booking_register.regisID','inner');
		$db->where(array('barcode.barcode'=>$barcode));
		$sql = $db->get();
		$arr = $sql->row_array();
		print_r($arr);
		echo '<hr>';
	}
}
echo 'End----';
echo '<hr>';
?>
