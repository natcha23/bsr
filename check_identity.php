<?php 
require('function.php');
updateData();
/* Check T-Shirt */
$db->select("*")->from("registration");
$db->where(array("IDNumber" => $_POST['idcard'], 'Status !=' => 0));
$sql = $db->get();
$iden_count = $sql->num_rows();
// $tshirt_row = $sql->row_array();
if($iden_count == 0) {
	echo 'pass';
} else {
	echo 'error';
}
exit;
?>