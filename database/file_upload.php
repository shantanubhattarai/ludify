<?php
	include 'connection.php';
	include 'get_username.php';
	//take userid from the session variable stored during login
	// id =$_SESSION['user_id'];
	$date = date("m.d.y");
	$target = "../files/".$date;//.$id;
	if(!file_exists($target) && !is_dir($target)){
		mkdir($target,0700);
	}
	$target = "../files/".$date."/";
	if(isset($_FILES["file"]) && $_FILES["file"]["name"]!=null){
		$target_file=$target.basename($_FILES["file"]["name"]);
		$filetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	}

	if(isset($_POST['submit'])){
		//get today date
		//check directory if the folder with date matches
		// if matches upload in same directory
		//else make new directory and upload the file in the new directorys
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
			$file_path = $target_file;
			echo $file_path;
			$query = "insert into files(link,no_of_downloads) values('$file_path','0')";
			$sql = mysqli_query($conn,$query);
			if($sql){
				header('location:/../file_upload.php');
			}
			else{
				echo "NOT INSERTED TO DATABASE";
			}
		}
		else{
			echo "File upload is unsuccessfull";
		}
		
	}
?>