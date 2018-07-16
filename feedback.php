<?php 
	$title = "Feedback";
?>

<?php include'partial_upper.php';?>

<?php include'partial_sidebar.php'; ?>
<div class="col-md-9 container main-content">
	<div class="card">
	  	<h5 class="card-header">Feedback</h5>
	  	<div class="card-body">
	  		<form class="form" action ="database/feedback.php" method="post">
	  			<div class="form-group label-floating">
	  				<label class="control-label" for="title">Title</label>
		  			<input class="form-control" type="text" name="title">
	  			</div>
		  		<div class="form-group label-floating">
		  			<label class="control-label" for="body">Comment</label>
		  			<textarea class="form-control" rows="8" name="body"></textarea>
		  		</div>
		  		<div class="form-group">
					<button type="submit" class="btn btn-default" name="submit">Submit</button>
		  		</div>
			</form>
	  	</div>
	</div>
</div>

<?php include'partial_lower.php'; ?>