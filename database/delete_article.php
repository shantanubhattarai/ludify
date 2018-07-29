<?php
	require 'connection.php';
	$id = $_GET['article_id'];
	$sql = "SELECT * from articles where article_id = ".$id;
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($res);
	$file_id = $row['file_id'];
	$sql1 = mysqli_query($conn,"DELETE FROM articles WHERE article_id = ".$id);
	$sql2 = mysqli_query($conn,"DELETE FROM files WHERe file_id=".$file_id);
	if($sql1){
		if($sql2){
			header('location:/ludify/index.php');
		}
		else{
			echo mysqli_error($conn);
		}
	}
	else{
		echo mysqli_error($conn);
	}
?>