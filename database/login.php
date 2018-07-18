<?php
	require "connection.php";
	session_start();

	if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string ($conn,$_POST['email']);
		$password = md5(mysqli_real_escape_string ($conn,$_POST['password']));

		$query = "SELECT * FROM users where email='$email' or username='$email'";
		$result = mysqli_query($conn,$query);

		if(mysqli_num_rows($result) == 0)
		{
			$_SESSION['error']="No such account exist. You can create one though.";
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
		else
		{
			$row = mysqli_fetch_assoc($result);
			$role_id = $row['role_id'];
			echo $role_id;
			if($password == $row['password'])
			{
				$_SESSION['user_id'] = $row['user_id'];
				echo $row['user_id'];
				$query2 = "UPDATE users SET count=count+1 where user_id = ".$row['user_id'];
				$res2 = mysqli_query($conn,$query2);
				if($res2 && $role_id!=3){
					header("location:../index.php");					
				}
				else{
					header("location:../dashboard_admin.php");
				}
			}
			else
			{
				$_SESSION['error']="The password you entered is incorrect.";
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}
		}

	}
?>
