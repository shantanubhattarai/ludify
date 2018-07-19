<?php
	require('connection.php');
	session_start();
	$user_id = $_SESSION['user_id'];
	$index=1;
	$date_now = date('Y-m-d');
	if(isset($_POST['submit'])){
		$project_no = $_POST['project_no'];

		$qualification = mysqli_real_escape_string($conn,$_POST['qualification']);
		if(empty($qualification)){
			$qualification = "Empty";
		}
		$query = "INSERT INTO developer_request(user_id,date_of_request,qualification) VALUES('$user_id','$date_now','$qualification')";
		$res = mysqli_query($conn,$query);
		if($res){
			$res = mysqli_query($conn,"SELECT request_id FROM developer_request WHERE user_id ='$user_id' AND date_of_request='$date_now'");
			$row = mysqli_fetch_assoc($res);
			$req_id = $row['request_id'];
			while($index <=$project_no){
				$temp = "project".$index;
				$project_temp = mysqli_real_escape_string($conn,$_POST[$temp]);
				$query =  "INSERT INTO projects(user_id,request_id,link) VALUES('$user_id','$req_id','$project_temp')";
				$res = mysqli_query($conn,$query);
				if($res){
				}
				else{
					echo mysqli_error($conn);
				}
				$index++;
			}
			$_SESSION['info'] = "Your request has been sent. We will contact you if your request is considered";
			header('location:/ludify/index.php');
			
		}
		else{
			$_SESSION['error'] = "Error Submitting Request for Becoming a Developer. Try Again.";
			//header("Location: {$_SERVER['HTTP_REFERER']}");
			echo mysqli_error($conn);
		}

	}
?>