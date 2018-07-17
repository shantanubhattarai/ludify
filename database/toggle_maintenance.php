<?php 
	require_once('connection.php');
	session_start();
	if(isset($_POST['toggle_maintenance']) && $_POST['toggle_maintenance']!=null){
		$tgl_value = $_POST['toggle_maintenance'];
		$sql = "UPDATE admin_settings SET maintenance=$tgl_value WHERE id = 1";
		$result = mysqli_query($conn,$sql);
		$_SESSION['info'] = "Settings saved";
		header('location:/ludify/dashboard_admin.php?type=settings');
	}else{
		$_SESSION['info'] = "Settings saved";
		header('location:/ludify/dashboard_admin.php?type=settings');
	}

?>