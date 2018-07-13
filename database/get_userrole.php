<?php

function GetUserRole($conn, $user_id){
	$query = "select user_roles.role_id from user_roles inner join users on user_roles.role_id = users.role_id and users.user_id = '$user_id'";
	$result = mysqli_query($conn, $query);

	$row = mysqli_fetch_assoc($result);
	return $row['role_id'];
}
?>

