<?php
	$sql = "select * from notices where notice_id =".$_GET['notice'];
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>
<a href="/ludify/dashboard_admin.php?type=notices">
	<button class="btn btn-outline-danger">
		Back to Notices
	</button>
</a>
<div class="card-header"><?=$row['notice_title']?></div>

<div class="card-body">

<p class="card-text">
	<?=$row['notice_body']?>
</p>
</div>
