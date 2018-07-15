<?php
	require "connection.php";
	session_start();
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['confirm'])){
		$old_pw = md5(mysqli_real_escape_string($conn,$_POST['password_old']));
		$row =mysqli_fetch_assoc(mysqli_query($conn,"select password from users where user_id='$user_id'"));
		if($old_pw==$row['password']){
			$pass1 = md5(mysqli_real_escape_string($conn,$_POST['password_new1']));
			$pass2 = md5(mysqli_real_escape_string($conn,$_POST['password_new2']));
			if($pass1 == $pass2){
				$sql = "UPDATE users SET password =$pass1 WHERE user_id='$user_id'";
				$result = mysqli_query($conn,$sql);
				if($sql){
					header('location: /ludify/profile.php');
				}
				else{
					echo mysqli_error($conn);
				}
			}
			else{
				$_SESSION['error']="Password dont match";
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}

		}
		else{
			$_SESSION['error'] = "The old password is wrong";
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
	}

?>
