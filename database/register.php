<?php
require "connection.php";
session_start();

if(isset($_POST['submit'])){
	$date = date('Y-m-d');

	$firstname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lastname = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));
	$hash = mysqli_real_escape_string($conn,md5(rand(0,1000)));
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$dob = mysqli_real_escape_string($conn,$_POST['dob']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$active=$loggedin=1;

	$target= '/media/';
	$default_file = $target."default.png";
	if(isset($_FILES["image"]) && $_FILES["image"]["name"]!=null){
		$target_file=$target.basename($_FILES["image"]["name"]);
		$filetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		$checkfiletype = array('png','jpg','jpeg');
	}

	if(isset($target_file)){
		echo $target_file;
		if(move_uploaded_file($_FILES["image"]["tmp_name"], '..'.$target_file)){
			$image_path = $target_file;
		}
	}else{
		$image_path = $default_file;
	}
	$image_path = '/ludify/'.$image_path;

	$query = "INSERT INTO users (first_name, last_name, email, password, hash,active,loggedin,gender, contact, username, dob, avatar,count,role_id) VALUES ('$firstname', '$lastname', '$email', '$password', '$hash','$active','$loggedin', '$gender', '$contact', '$username', '$dob', '$image_path','1','1')";
	$result = mysqli_query($conn,$query);
	if($result){
		echo "LINE41:";
		$result = mysqli_query($conn,"select user_id from  users where username='$username'");
		$row= mysqli_fetch_assoc($result);
		$_SESSION['user_id'] = $row['user_id'];
		$user_id = $row['user_id'];
//FOR NOTIFICATION
		$query = "INSERT INTO NOTIFICATION(user_id,last_logged_in) VALUES('$user_id,'$date')";
		$sql = mysqli_query($conn,$query);
		echo "LINE48:";
		if($sql){
			header("location:/ludify/index.php");
		}
		else{
			echo mysqli_error($conn);
		}
	}
	else
	{
		echo "LINE59:";
		$_SESSION['message'] = "Registration failed";
		echo mysqli_error($conn);
	}	
}
?>

			



			
			
			
