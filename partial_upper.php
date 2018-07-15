<!DOCTYPE html>
<html>
<?php include 'database/connection.php' ?>
<?php include 'partial_head.php' ?>
<body>
<div class="container col-sm-12 col-md-12">
	<?php
		session_start();
			if(isset($_SESSION['error']) && $_SESSION['error']!=""){
			echo "<div class='alert alert-danger alert-dismissible'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'><i class='material-icons'>clear</i></span>
				</button>"
				.$_SESSION['error'].
				"</div>";
			$_SESSION['error']="";
		}
		?>
<?php include'partial_nav.php'; ?>
<div class="container">
	<div class="row">


