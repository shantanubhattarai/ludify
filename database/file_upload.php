<?php
	include 'connection.php';
	include 'get_username.php';
	session_start();
	$date = date('Y-m-d');
	$query =  mysqli_query($conn,"select article_id from articles order by article_id desc limit 1");
	$row = mysqli_fetch_assoc($query);
	$article_id = $row['article_id']+1;
	$target= "../files/".$article_id;

	$user_id = $_SESSION['user_id'];

	echo $user_id;

	if(!file_exists($target) && !is_dir($target)){
		mkdir($target,0700);
	}
	$target = $target."/";

	if(isset($_FILES["file"]) && $_FILES["file"]["name"]!=null){
		$target_file=$target.basename($_FILES["file"]["name"]);
		$filetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	}

	if(isset($_POST['article'])){

		if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
			$file_path = $target_file;
			echo $file_path;
			$query = "insert into files(link,no_of_downloads) values('$file_path','0')";
			$sql = mysqli_query($conn,$query);
			if($sql){
				$query = "select file_id from files where link = '$file_path'";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				$file_id = $row['file_id'];
				echo $file_id;
				$category_id = mysqli_real_escape_string($conn,$_POST['category_id']);
  				$title = mysqli_real_escape_string($conn,$_POST['title']);
  				$body = mysqli_real_escape_string($conn,$_POST['body']);
  				
				$sql1 = "INSERT INTO articles(article_category,article_title,article_body,author_id,file_id,date_of_upload) VALUES ('$category_id', '$title', '$body','$user_id', '$file_id','$date')";

				if(mysqli_query($conn, $sql1))
					header('location: /ludify/success.php');
				else
					echo mysqli_error($conn);
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
