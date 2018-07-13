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
		$_SESSION['message'] = "No such account exists";
		echo mysqli_error($conn);
		//header("location:error.php");
	}
	else
	{
		$row = mysqli_fetch_assoc($result);
		if($password == $row['password'])
		{
					echo "ASDFASD";
		/*	$_SESSION['first_name'] = $user['first_name'];
			$_SESSION['last_name'] = $user['last_name'];
			$_SESSION['email'] = $user['email'];
			$u_email=$_SESSION['email'];
			$_SESSION['active'] = $user['active'];
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['hash']=$user['hash'];

			$query4 = "UPDATE users SET loggedin = '1' WHERE email = '$u_email'";
			$result2 = mysqli_query($conn,$query4);

			//header("location:error.php");*/
			$_SESSION['user_id'] = $row['user_id'];
			
			header("location:../index.php");
		}
		else
		{
			$_SESSION['message'] = "The password you entered is incorrect.";
						mysqli_error($conn);

			//header("location:error.php");
		}
	}

}
else
{
	$_SESSION['message'] = "Do not leave the fields empty";
				mysqli_error($conn);

	//header("location:error.php");
}


?>
