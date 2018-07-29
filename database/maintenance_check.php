<?php
	require_once 'connection.php';
	$sql = "SELECT * from admin_settings";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
		header('location:/ludify/dashboard_admin.php');
	}else{
		if($row['maintenance'] == 1){
		header('location:/ludify/maintenance_notice.php');
	}
	}
	
?>