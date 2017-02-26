<?php
require('../function.php');

$where = array("ID" => $_POST['search_key']);
$db->update("registration", array("RacePackStatus" => 1, "RacePackDate" => date('Y-m-d H:i:s')), $where);

echo 'success';
?>