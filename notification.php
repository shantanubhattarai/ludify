<?php
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$sql = "SELECT COUNT(notification.notification_id) AS count FROM notification INNER JOIN requests ON notification.last_logged_in <requests.date_of_request and notification.user_id = '$user_id' ";
		$res = mysqli_query($conn,$sql);
		if($res){
			$row = mysqli_fetch_assoc($res);
			if($row['count'] !=0){
				echo "(".$row['count'].")";
			}
		}
		else{
			echo mysqli_error($conn);
		}
	}
?>