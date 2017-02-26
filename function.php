<?php
// define('_DB_HOST_','localhost');
// define('_DB_USER_','root');
// define('_DB_PASS_','eoffice0841606322');
// define('_DB_DATA_','register_7');
// define('_DB_TYPE_','mysql');

define('_SMTP_HOST_','eoffice7.com');
define('_SMTP_PORT_','587');
define('_MAIL_','eoffice@eoffice7.com');
define('_MAIL_PASS_','123456');
define('_SMTP_SECURE_','tls');

//CI Library
define('BASEPATH', 'lib/');

require_once('lib/PHPMailer/class.phpmailer.php');

define('_DB_HOST_','localhost');
define('_DB_USER_','root');
define('_DB_PASS_','');
define('_DB_DATA_','bsr_db');
define('_DB_TYPE_','mysql');
date_default_timezone_set('Asia/Bangkok');
function connectMysql($active_record_override = NULL)
{
	$params = array(
		'dbdriver'	=> _DB_TYPE_,
		'hostname'	=> _DB_HOST_,
		'username'	=> _DB_USER_,
		'password'	=> _DB_PASS_,
		'database'	=> _DB_DATA_
	);

	if ($active_record_override !== NULL){
		$active_record = $active_record_override;
	}
	require_once(BASEPATH.'/database/DB_driver.php');
	if (!isset($active_record) OR $active_record == TRUE){
		require_once(BASEPATH.'/database/DB_active_rec.php');

		if (!class_exists('CI_DB')){
			eval('class CI_DB extends CI_DB_active_record { }');
		}
	}
	else{
		if (!class_exists('CI_DB')){
			eval('class CI_DB extends CI_DB_driver { }');
		}
	}
	require_once(BASEPATH.'/database/drivers/'.$params['dbdriver'].'/'.$params['dbdriver'].'_driver.php');
	
	$driver = 'CI_DB_'.$params['dbdriver'].'_driver';
	$DB = new $driver($params);

	if ($DB->autoinit == TRUE){
		$DB->initialize();
	}
	if (isset($params['stricton']) && $params['stricton'] == TRUE){
		$DB->query('SET SESSION sql_mode="STRICT_ALL_TABLES"');
	}
	return $DB;
}
$db = connectMysql();

function updateData(){
	$db = connectMysql();
	$exdate = date('Y-m-d H:i:s', strtotime('+9 hour', strtotime(date('Y-m-d'))));

	$db->select('*')->from('registration')->where(array('Status'=>1, 'PaidStatus'=>0, 'PayDate <='=>$exdate));
	$sql = $db->get();

	foreach( $sql->result_array() as $arr ){
		$db->select('*')->from('booking_register')->where(array('regisID'=>$arr['ID']));
		$sql = $db->get();
		$num = $sql->num_rows();
		$rs = $sql->row_array();

		$db->update('registration', array('Status'=>0), array('ID'=>$arr['ID']));
		$db->update('barcode', array('status'=>2, 'date_updated'=>date('Y-m-d').' 09:00:00'), array('id'=>$rs['barcodeID']));

		$db->select('*')->from('tshirt')->where(array('ID'=>$rs['tshirtID']));
		$sql = $db->get();
		$row_shirt = $sql->row_array();
		if( $row_shirt['Remain'] < $row_shirt['Total'] ){
			$db->update('tshirt', array('Remain'=>$row_shirt['Remain']+1), array('ID'=>$arr['tshirtID']));
		}
		$db->update('booking_register', array('Status'=>2), array('ID'=>$rs['ID']));
	}
}

function totalShirt($type, $size){
	$db = connectMysql();
	$db->select('*')->from('tshirt')->where(array('Type'=>$type, 'Size'=>$size));
	$sql = $db->get();
	$arr = $sql->row_array();
	return $arr['Total'];
}

function remainShirt($type, $size){
	$db = connectMysql();
	$db->select('*')->from('tshirt')->where(array('Type'=>$type, 'Size'=>$size));
	$sql = $db->get();
	$arr = $sql->row_array();
	return $arr['Remain'];
}

function getBarcode($regist_id){
	$db = connectMysql();
	$db->select('barcode.barcode')->from('booking_register');
	$db->join('barcode','barcode.ID = booking_register.barcodeID','inner');
	$db->where(array('booking_register.regisID'=>$regist_id));
	$sql = $db->get();
	$arr = $sql->row_array();

	return $arr['barcode'];
}

function encrypt($sData, $secretKey){
    $sResult = '';
    for($i=0;$i<strlen($sData);$i++){
        $sChar    = substr($sData, $i, 1);
        $sKeyChar = substr($secretKey, ($i % strlen($secretKey)) - 1, 1);
        $sChar    = chr(ord($sChar) + ord($sKeyChar));
        $sResult .= $sChar;

    }
    return encode_base64($sResult);
} 

function decrypt($sData, $secretKey){
    $sResult = '';
    $sData   = decode_base64($sData);
    for($i=0;$i<strlen($sData);$i++){
        $sChar    = substr($sData, $i, 1);
        $sKeyChar = substr($secretKey, ($i % strlen($secretKey)) - 1, 1);
        $sChar    = chr(ord($sChar) - ord($sKeyChar));
        $sResult .= $sChar;
    }
    return $sResult;
}

function encode_base64($sData){
    $sBase64 = base64_encode($sData);
    return str_replace('=', '', strtr($sBase64, '+/', '-_'));
}

function decode_base64($sData){
    $sBase64 = strtr($sData, '-_', '+/');
    return base64_decode($sBase64.'==');
}

function send_mail($to='', $subject='Send Mail Subject',$message='Send mail message content',$from='Server', $file='', $debug=0){
	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->Host = _SMTP_HOST_;
	$mail->Port = _SMTP_PORT_;
	$mail->SMTPAuth = true;
	$mail->Username = _MAIL_;
	$mail->Password = _MAIL_PASS_;
	$mail->SMTPSecure = _SMTP_SECURE_;
	$mail->SMTPDebug = $debug;

	$mail->From = 'batsuprun@staff.com';
	$mail->FromName = $from;
	$mail->AddAddress($to);
	$mail->WordWrap = 50;
	if( $file != '' ) $mail->AddAttachment($file);
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $message;
	return $mail->Send();
}

?>
