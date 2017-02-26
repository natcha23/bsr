<?php
session_start();
require('../function.php');

if( (!isset($_POST['username']) || empty($_POST['username'])) || (!isset($_POST['password']) || empty($_POST['password'])) ){
	echo 'empty';
	header('Location: index.php');
	exit();
}

$username = $_POST['username'];
$password = md5($_POST['password']);
// rpa2016#2043c1d4cded502e235226fa9cd5493e
if( $username == 'rpadmin' && $password == '2043c1d4cded502e235226fa9cd5493e' ) {
	$_SESSION['is_login'] = true;
	header('Location: home.php');
} else {
	echo 'Login ไม่ถูกต้อง';
	header('Location: index.php');
	exit();
}
?>