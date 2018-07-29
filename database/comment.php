<?php
	require 'connection.php';
	session_start();
	$user_id = $_SESSION['user_id'];
	$date = date('Y-m-d');
	if(isset($_POST['submit'])){
		$body = mysqli_real_escape_string($conn,$_POST['body']);
		$article_id = mysqli_real_escape_string($conn,$_POST['article_id']);
		$sql = "INSERT INTO comments(comment_body, comment_date, comment_user_id, article_id)
				VALUES('$body','$date','$user_id','$article_id')";
		$result = mysqli_query($conn,$sql);
		if($result){
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
		else{
			$_SESSION['error']="Problem in submitting comment try again";
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}

	}
?>
