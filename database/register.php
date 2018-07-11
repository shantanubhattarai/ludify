<?php
/*  registers the user into the database and 
	send email verification link for verification
*/

require "connection.php";
session_start();

$date = date('Y-m-d H:i:s');

$firstname = mysqli_real_escape_string($conn,$_POST['fname']);
$lastname = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));
$hash = mysqli_real_escape_string($conn,md5(rand(0,1000)));

$_SESSION['hash'] = $hash;

$gender = mysqli_real_escape_string($conn,$_POST['gender']);
$contact = mysqli_real_escape_string($conn,$_POST['contact']);
$dob = mysqli_real_escape_string($conn,$_POST['dob']);
$username = mysqli_real_escape_string($conn,$_POST['username']);
$active=$loggedin=0;
$avatar = $_FILES['file']['name'];
$path_to_upload = "media/".$_FILES["file"]["name"];


if(move_uploaded_file($_FILES["file"]["tmp_name"], $path_to_upload)){


	$query1="SELECT * FROM `users` WHERE username ='$username' ";
	$result1=mysqli_query($conn,$query1);
	$query = "SELECT * FROM `users` WHERE email ='$email' ";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) >0)
	{
		$_SESSION['message'] =  "The user has already been registered";
		header("location:error.php");
	}
	else
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, hash,active,loggedin,gender, contact, username, dob, avatar) VALUES ('$firstname', '$lastname', '$email', '$password', '$hash','$active','$loggedin', '$gender', '$contact', '$username', '$dob', 'asdfas')";
		
		$result = mysqli_query($conn,$query);
		if($result)
		{
			/*$_SESSION['active'] = 0; // 0 until the user verifies the account
			$_SESSION['logged_in'] = true;
			$_SESSION['message'] = 'Conformation link has been sent to '.$email. ' Please verify your account before logging in.';

			//send registration conformation link
			$to = $email;
			$subject = "Conformation email";
			$message_body = 
						'Hello '.$firstname.' !!
						Please verify your account by clicking on the link below:

						http://localhost/kinmail3/verify.php?email='.$email.'&hash='.$hash;
			mail($to, $subject, $message_body);*/
			$result = mysqli_query($conn,"select user_id from  users where username='$username");
			$row= mysqli_fetch_assoc($result);
			$_SESSION['user_id'] = $row['user_id'];
//FOR NOTIFICATION
			$query = "INSERT INTO NOTIFICATION('user_id','last_logged_in') VALUES('$_SESSION['user_id']','$date')";
			$sql = mysqli_query($conn,$query);
			if($sql){
				header("location:success.php");
			}
			else{
				echo mysqli_error($conn);
			}
		}
		else
		{
			$_SESSION['message'] = "Registration failed";
			echo mysqli_error($conn);
			//header("location:error.php");
		}
	}
}

?>

