<?php 
	include 'connection.php';
	session_start();
	$user_id = $_SESSION['user_id'];
	echo $user_id;
	if(isset($_POST['submit'])){
		$date = date('Y-m-d H:i:s');
		$request = mysqli_real_escape_string($conn,$_POST['request']);
		$title = mysqli_real_escape_string($conn,$_POST['title']);
		$query = "INSERT INTO requests(user_id,request_body,request_title,date_of_request)
					VALUES ('$user_id','$request','$title','$date')";
		$result = mysqli_query($conn,$query);
		if($result){
			$_SESSION['info'] = "Your request has been submitted";
			header('location: /ludify/index.php');
		}
		else{
		//	$_SESSION['error']="Problem in submitting request try again";
		//	header("Location: {$_SERVER['HTTP_REFERER']}");
			echo mysqli_error($conn);
		}
	}
?>
