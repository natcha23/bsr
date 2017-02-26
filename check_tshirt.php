<?php 
require('function.php');
updateData();
/* Check T-Shirt */
$db->select("*")->from("tshirt");
$db->where(array("Type" => $_POST['team'], "Size" => $_POST['shirt'], "Remain > " => 0));
$sql = $db->get();
$tshirt_count = $sql->num_rows();
// $tshirt_row = $sql->row_array();
if($tshirt_count == 0) {
	echo 'soldout';
} else {
	echo 'instock';
}
exit;
?>