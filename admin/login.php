<?php
session_start();
require('../function.php');

if( (!isset($_POST['username']) || empty($_POST['username'])) || (!isset($_POST['password']) || empty($_POST['password'])) ){
	echo 'empty';
	header('Location: index.php');
	exit();
}

$username = $_POST['username'];
$password = $_POST['password'];
if( $username == 'admin' && $password == '123456' ) {
	$_SESSION['is_login'] = true;
	header('Location: home.php');
} else {
	echo 'Login ไม่ถูกต้อง';
	header('Location: index.php');
	exit();
}

?>