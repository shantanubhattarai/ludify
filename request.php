<?php $title = "Request" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php';
	  include 'database/get_userrole.php';
?>
<?php include'partial_sidebar.php'; ?>

		<div class="col-md-9 container main-content">
		<?php
			//IF USER IS A GENERAL USER
		if(isset($_SESSION['user_id'])){
			$user_id = $_SESSION['user_id'];
			if(GETUSERROLE($conn,$user_id) == 1){
		?>
				<a href="add_request.php">Make a Request Here!</a>		
		<?php
			}
		}
			$result = mysqli_query($conn,"select * from requests order by date_of_request desc");
			while($row = mysqli_fetch_assoc($result)){
		?>
				<div class="card main-list">
					<div class="card-header">
						<h3><a href="view_request.php?request_id=<?=$row['request_id'] ?>"> <?=$row['request_title'] ?> </a></h3>
					</div>
					<div class="card-body card-meta text-muted">
						Requested by <?=GETUSERNAME($conn,$row['user_id'])?> in <?=$row['date_of_request']?>	
					</div>
				</div>
		<?php
			}
		?>
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>