<?php 
	$title = "Index";
?>
<?php include'partial_upper.php'; ?>
 <div class="col-md-9 container main-content">
	<div class="card">
		<div class="card-body">
		<?php
			$no = $_GET['count'];
			$sql = "SELECT * FROM notices WHERE notice_id='$no'";
			$result = mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
		?>
			<h1><?= $row['notice_title']; ?></h1>
			<p><?=$row['notice_body'];?></p>
		
			<a href="notice.php">
				<button class="btn btn-success">
					Back
				</button>
			</a>
		</div>
	</div>
</div>
<?php
	$check = "read".$_GET['count'];
	$check_value =1;
	setcookie($check,$check_value);
?>
<?php include'partial_lower.php'; ?>
