<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<!-- TODO:include check for article id to redirect to list here -->

<div class="container">
	<div class="row">
		<div class="col-md-2 container">
			<div class="card sidebar sidebar-left">
				<ul class="list-group-flush" style="padding:0; margin-bottom: 0;">
					<a href="." class="list-group-item" style="color:#F44336;opacity: 0.93;">Home</a>
					<a href="#" class="list-group-item text-muted">Dashboard</a>
					<a href="#" class="list-group-item text-muted">Your Requests</a>
					<a href="#" class="list-group-item text-muted">About</a>
					<a href="#" class="list-group-item text-muted">Contact</a>
				</ul>
			</div>
		</div>
		<div class="col-md-9 container main-content">
			<?php
				$id = $_GET['article_id'];
				$query = "SELECT * FROM articles WHERE article_id = $id";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
			?>
			<div class="card border-0">
				<div class="card-header">
					<h3><?= $row['article_title']; ?> </h3>
				</div>
				<div class="card-body">
					<?= $row['article_body']; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
