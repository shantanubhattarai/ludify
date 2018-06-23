<?php
	include 'connection.php';
	include 'get_username.php';
	//take userid from the session variable stored during login
	// id =$_SESSION['user_id'];

	$date = date("m.d.y");
	//!-------------------------

	//DELETE THE DATE AND INSERT THE ARTICLE ID INSTEAD OF THE DATE..
	//LILKE THIS
	// $target = "./files/".$article_id;
	//get article_id from the article form you created
	$target = "../files/".$date;

	//-------------! 
	if(!file_exists($target) && !is_dir($target)){
		mkdir($target,0700);
	}
	$target = "../files/".$date."/";
	if(isset($_FILES["file"]) && $_FILES["file"]["name"]!=null){
		$target_file=$target.basename($_FILES["file"]["name"]);
		$filetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	}

	if(isset($_POST['article'])){
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
				//header('location:..\file_upload.php');
				$query = "SELECT * FROM files WHERE link = '$file_path'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				$category_id = mysqli_real_escape_string($conn,$_POST['category_id']);
  				$title = mysqli_real_escape_string($conn,$_POST['title']);
  				$body = mysqli_real_escape_string($conn,$_POST['body']);

				$sql1 = "INSERT INTO articles(category_id,title,body,file_id) VALUES ('$category_id', '$title', '$body', '$row[file_id]')";

				if(mysqli_query($conn, $sql1))
					header('location: /ludify/success.php');
				else
					echo "error inserting to databse";
			}
			else{
				echo "File Upload Failed";
			}
		}
		else{
			echo "File upload is unsuccessfull";
		}
	}
?>