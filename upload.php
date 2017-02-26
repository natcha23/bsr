<?php
if(!empty($_FILES)) {
	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
		$sourcePath = $_FILES['userImage']['tmp_name'];
		$targetPath = "excelfile/".$_FILES['userImage']['name'];
		if(copy($sourcePath,$targetPath)) {
			echo $targetPath.' '.$_FILES['userImage']['size'];
			echo '<hr/>';
			echo '<a target="_blank" href="chk_barcode.php?file_name='. $_FILES['userImage']['name'] .'">chk_barcode.php?file_name='. $_FILES['userImage']['name'] .'</a>';
			echo '<hr/>';
		}
	}
}
?>