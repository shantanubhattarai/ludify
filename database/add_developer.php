<?php
	require 'connection.php';
	include 'get_username.php';
	session_start();

	if(isset($_POST['submit'])){
		$user_id = $_POST['user_id'];
		$sql = "UPDATE users SET role_id = 3 WHERE user_id = '$user_id'";
		$sql2 = "DELETE FROM developer_request WHERE user_id = '$user_id'";
		$res1 = mysqli_query($conn,$sql);
		if($res1){
			$res2 = mysqli_query($conn,$sql2);
			if($res2){
				$_SESSION['info']="Accepted ".GetUserName($conn,$user_id)." as a developer";
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}
			else{

				echo "With 1 completed\n".mysqli_error($conn);
			}
		}
		else{
			echo mysqli_error($conn);
		}
	}
	
?>