<?php
session_start();
require('../function.php');
if( !isset($_SESSION['is_login']) || $_SESSION['is_login']==false ){
	session_destroy();
	header('Location: index.php');
	exit();
}

$decypt = decrypt($_POST['data'],'cancle');
$ex = explode('#', $decypt);
$id = $ex[0];


$db->update('registration', array('UserCancleName'=>$_POST['name'], 'Status'=>0, 'UpdateDate'=>date('Y-m-d H:i:s')), array('ID'=>$id));
$db->update('booking_register', array('Status'=>2), array('regisID'=>$id));
$db->update('barcode', array('Status'=>2), array('regist_id'=>$id));