<?php
	session_start();
	require_once('connection.php');
	$email = $password = '';

	if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string($conn, $_POST['email_login']);
		$password = mysqli_real_escape_string($conn, $_POST['password_login']);
		$password = md5($password);

		$query = "SELECT * FROM users where email ='$email' or username='$email' and password='$password'";
		$result = mysqli_query($conn, $query);

		$row = mysqli_fetch_assoc($result);
		if($row['role_id'] == 3) {
				$_SESSION['user_id'] = $result['user_id'];
				header('location:/ludify/dashboard_admin.php');
		}
		else{
			$_SESSION['error'] = "The email or password is wrong or you are not an adminstrator";
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
		
	}
?>
