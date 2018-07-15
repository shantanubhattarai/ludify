<?php
	require('connection.php');
	session_start();
	$request_id = $_SESSION['request_id'];

	$sql = "update requests set accepted='1' where request_id = '$request_id'";
	$res = mysqli_query($conn,$sql);
	if($res){
		header("Location: /ludify/request.php");
	}
	else{
		echo mysqli_error($conn);
	}
?>