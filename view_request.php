<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php'; ?>

<?php include'partial_sidebar.php'; ?>
		<div class="col-md-9 container main-content">
			<?php
				$id = $_GET['request_id'];
				$query = "SELECT * FROM requests WHERE request_id = $id";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
			?>
			<div class="card border-0">
				<div class="card-header">
					<h3><?= $row['request_title']; ?> </h3>
				</div>
				<div class="card-body">
					<?= $row['request_body']; ?>
				</div>					
			</div>

		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
