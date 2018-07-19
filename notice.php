<?php 
	$title = "Notices and FAQs";
?>
<?php include'partial_upper.php'; ?>
<?php include'partial_sidebar.php'; ?>
<div class="col-md-9 container main-content">
	<div class="card">
	<ul class="list-group list-group-flush">
<?php
	$sql = "select * from notices";
	$result = mysqli_query($conn,$sql);
	$check="read";
	$sno=1;
	while($row=mysqli_fetch_assoc($result)){
?>
		<a class="list-group-item" href="/ludify/previewnotice.php?count=<?=$row['id']?>">
			<?= $sno;?>.&nbsp;
			<?= $row['notice_title'];?>
			
			<span class="pull-right">
				<?= $row['updated_at'];?>
			</span>
		</a>

		<?php
		 	$sno++;
		}
?>
	</ul>
	</div>
</div>

<?php include'partial_lower.php'; ?>