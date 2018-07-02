<?php
session_start();

require"db3.php";
$u_email=$_SESSION['email'];
$query4 = "UPDATE users SET loggedin = '0' WHERE email = '$u_email'";
$result2 = $conn->query($query4);

session_destroy();

header("location:login.php");

?>