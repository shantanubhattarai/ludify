<?php

function GetUsername($conn, $user_id){
	$query = "SELECT username FROM users WHERE user_id = $user_id";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	return $row['username'];
}

?>