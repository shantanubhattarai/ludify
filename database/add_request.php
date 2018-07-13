<?php 
	include 'connection.php';
	session_start();
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['submit'])){
		$date = date('Y-m-d H:i:s')
		$request = mysqli_real_escape_string($conn,$_POST['request']);
		$title = mysqli_real_escape_string($conn,$_POST['title']);
		$query = "INSERT INTO requests(user_id,request_body,request_title,date_of_request)
					VALUES ('$user_id','$request','$title')";
		$result = mysqli_query($conn,$query);
		if($result){
			header('location: /ludify/index.php');
		}
		else{
			echo mysqli_error($conn);
		}
	}
?>
