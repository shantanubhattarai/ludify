<?php $title = "Add Request" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php';
	  include 'database/get_userrole.php';
?>
<?php include'partial_sidebar.php'; ?>

		<div class="col-md-9 container main-content">
			<form action="database/add_request.php" method="post">
					<div class="form-group">
						<label><b>Request Title </b></label><br>
						<input type="text" name="title"><br>
						<label><b>Enter you request here:</b></label><br>
						<textarea row="10" cols ="55" name="request" required></textarea><br>
						<input type="submit" class="btn btn-outline-danger" name="submit" value="Submit">
					</div>
				</form>
		</div>
	</div>
</div>

