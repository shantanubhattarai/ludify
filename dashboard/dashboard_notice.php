<?php
	$sql = "select * from notices where notice_id =".$_GET['notice'];
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>
<a href="/dashboard_admin.php/?type=notices">
	<button class="btn btn-success">
		Back to Notices
	</button>
</a>
<h4 class="card-header"><?=$row['notice_title']?></h4>
<p class="card-text">
	<?=$row['notice_body']?>
</p>