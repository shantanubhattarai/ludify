<?php $title = "FILE UPLOAD" ;?>
<?php include 'partial_upper.php';?>

<div class="container">
	<div class="row">
		<div class="col-md-2 container">
			<div class="card sidebar sidebar-left">
				<ul class="list-group-flush" style="padding:0; margin-bottom: 0;">
					<a href="#" class="list-group-item" style="color:#F44336;opacity: 0.93;">Home</a>
					<a href="#" class="list-group-item text-muted">Dashboard</a>
					<a href="#" class="list-group-item text-muted">Your Requests</a>
					<a href="#" class="list-group-item text-muted">About</a>
					<a href="#" class="list-group-item text-muted">Contact</a>
				</ul>
			</div>
		</div>
		<div class="col-md-9 container main-content">
			<form action="database/file_upload.php" method ="POST" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="file">
					<input type="submit" value="UPLOAD" name="submit">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
