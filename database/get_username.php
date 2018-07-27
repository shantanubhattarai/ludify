<?php

function GetUsername($conn, $user_id){
	$query = "SELECT * FROM users WHERE user_id = $user_id";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$name =  $row['username'];
	return $name;
}

?>
