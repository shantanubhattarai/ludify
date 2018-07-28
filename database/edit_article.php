<?php
 require 'connection.php';

 if(isset($_POST['submit'])){
 	$date = date('Y-m-d');
 	$id = $_POST['id'];
 	$title = mysqli_real_escape_string($conn,$_POST['title']);
  	$body = mysqli_real_escape_string($conn,$_POST['body']);
  	$sql = "UPDATE articles SET article_title='$title', article_body = '$body',date_of_upload='$date' WHERE article_id =  ".$id;
  	$res = mysqli_query($conn,$sql);
  	if($res){
  		header('location:/ludify/view_article.php?article_id='.$id);
  	}
  	else{
  		echo mysqli_error($conn);
  	}
 }
?>