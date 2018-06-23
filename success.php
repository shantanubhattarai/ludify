<?php $title = "Article published" ;?>
<?php include 'partial_upper.php'; ?>

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
			Article published successfully <br>
			<div class="card-body">
				<a href="file_upload.php">Publish another Article</a><br>
				<a href="view_article.php">View Articles</a>
			</div>
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
