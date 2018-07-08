<?php $title = "Request" ;?>
<?php include 'partial_upper.php'; 
	$user_id=$_SESSION['user_id'];
?>
<?php include 'database/get_username.php';
	  include 'database/get_userrole.php';
?>
<?php include'partial_sidebar.php'; ?>

		<div class="col-md-9 container main-content">
		<?php
			//IF USER IS A GENERAL USER
			if(GETUSERROLE($conn,$user_id) == 1){
		?>
				<form action="database/request.php" method="post">
					<div class="form-group">
						<label>Enter you request here:</label><br>
						<textarea row="10" cols ="55" name="request" required></textarea><br>
						<input type="submit" class="btn btn-outline-danger" name="submit" value="Submit">
					</div>
				</form>
				
		<?php
			}
			//IF USER IS DEVELOPER
			else{
				$result = mysqli_query($conn,"select * from requests order by date_of_request desc");
				while($row = mysqli_fetch_assoc($result)){
		?>
					<div class="card main-list">
						<div class="card-header">
							<h3><a href="view_request.php?request_id=<?=$row['request_id'] ?>"> <?=$row['request_title'] ?> </a></h3>
						</div>
						<div class="card-body card-meta text-muted">
							Requested by <?=GETUSERNAME($conn,$user_id)?> in <?=$row['date_of_request']?>	
						</div>
					</div>
		<?php
				}
			}
		?>
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>