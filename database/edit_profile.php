<?php
	require_once 'connection.php';
	session_start();
	$user_id = $_SESSION['user_id'];

	if(isset($_POST['submit'])){
		$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
		$last_name=mysqli_real_escape_string($conn,$_POST['last_name']);

		if($_FILES['image']['size']!=0){
			$target= '/media/';
			$default_file = $target."default.png";
			if(isset($_FILES["image"]) && $_FILES["image"]!=null){
				$target_file=$target.basename($_FILES["image"]["name"]);
				$filetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				$checkfiletype = array('png','jpg','jpeg');
			}
			if(isset($target_file)){
				echo $target_file;
				if(move_uploaded_file($_FILES["image"]["tmp_name"],'..'.$target_file)){
					$image_path = $target_file;
					echo $image_path;

				}
			}
			else{
				$image_path = $default_file;
				echo $image_path;

			}
			$image_path = '/ludify/'.$image_path;
			$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', avatar='$image_path' WHERE user_id = $user_id";

		}
		else{
			echo "No photo taken";
			$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name' WHERE user_id = $user_id";
		}

		$result= mysqli_query($conn,$sql);
		if($result){
			header('location: /ludify/profile.php');
		}
		else{
			$_SESSION['error']="Problem in editing your profile try again";
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
		
	}
	

?>