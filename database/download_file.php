<?php
	
if(isset($_POST['submit'])){
	$link = $_POST['link'];
	echo "ASDF";
	echo $link;
	if (!is_dir($link)) {
		echo "ASDF";
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($link).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($link));
	    readfile($link);
	    exit;
	}
}
?>