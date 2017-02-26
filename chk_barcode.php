<?php
header('Content-Type: text/html; charset=utf-8');
require_once('function.php');
require_once('lib/ClassesPHPExel/PHPExcel/IOFactory.php');

if( !isset($_GET['file_name']) || empty($_GET['file_name']) ){
	exit();
}

$inputFileName = 'excelfile/'.$_GET['file_name'];

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
		$ex = explode('/', $val[5]);
		$pay_date = $ex[2].'-'.$ex[1].'-'.$ex[0].' 00:00:00';
		
		$db->select('regist_id')->from('barcode')->where(array('barcode'=>$val[1]));
		$sql = $db->get();
		$arr = $sql->row_array();
		if( $arr['regist_id'] != 0 ) {
			

			$db->select('*')->from('registration')->where(array('ID'=>$arr['regist_id']));
			$sql = $db->get();
			$re = $sql->row_array();
			
			if( $re['Status'] == 0 ){ $regIDs[] = $re['ID']; }

			$db->select('*')->from('booking_register')->where(array('regisID'=>$arr['regist_id']));
			$sql = $db->get();
			$num = $sql->num_rows();
			// echo ' ---- '.$num;
			$db->update('registration', array('PaidStatus'=>1, 'Barcode'=>$val[1], 'UpdateDate'=>$pay_date, 'Status'=>1), array('ID'=>$arr['regist_id']));
			$db->update('booking_register', array('Status'=>1), array('regisID'=>$arr['regist_id']));
		}
		// echo $row.' => ';
		// echo $val[1];
		// echo ' => '.$pay_date;
		// echo '<br>';
		// echo 'Regist ID:'. $re['ID'].$re['Name_th'].' paystatus:'. $re['PaidStatus'].' status:'. $re['Status'] .' CreateDate'. $re['CreateDate'].' UpdateDate'. $re['UpdateDate'];

		// echo '<hr>';
	}
}
echo 'Update barcode status finish';
echo '<hr>';

$db->select('*')->from('barcode')->where(array('status'=>1, 'regist_id'=>0));
$db->order_by('date_updated asc');
$sql = $db->get();
$count = 0;
foreach( $sql->result_array() as $arr ) { 
	$count++;
}
echo 'จำนวน barcode ที่ยังใช้งานได้ :'.$count;
echo '<hr>';

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
	// echo $arr['ID'].' create date:'. $arr['CreateDate'] .' barcode:'.$rs['barcode'].' expired:'.$rs['expired'].' paydate:'.$arr['PayDate'];
	// echo '<hr>';
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
?>
