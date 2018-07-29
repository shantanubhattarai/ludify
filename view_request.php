<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>


<?php include'partial_sidebar.php'; ?>
		<div class="col-md-9 container main-content">
			<?php
				$id = $_GET['request_id'];
				$_SESSION['request_id'] = $id;
				$query = "SELECT * FROM requests WHERE request_id = $id";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);

				if(isset($row['accepted']) && $row['accepted']==1){
					$status = "Accepted";
				}
				else{
					$status = "Not Viewed";
				}
			?>
			<div class="card border-0">
				<div class="card-header">
					<h3><?= $row['request_title']; ?> </h3>
				</div>
				<div class="card-body">
					<div>
						<?= $row['request_body']; ?>
					</div>
					<div>
						<?php
//CHECK IF USER IS LOGGED IN
							if(isset($_SESSION['user_id'])){
								$user_id = $_SESSION['user_id'];
								if(GetUserRole($conn,$user_id)==1){ 
//IF THE USER IS A GENERAL USER
						?>
								<label>Status of Request: </label>
								<div style="color:#D32F2F;">
									<?=$status;?>	
								</div>
						<?php
								}
								else{
//IF THE USER IS A DEVELOPER
									$sql = "SELECT * FROM requests WHERE request_id = ".$id;
									$res = mysqli_query($conn,$sql);
									$row=mysqli_fetch_assoc($res);
									if($row['accepted']!=1){
						?>
								<a class="btn btn-danger" href="database/accept_request.php">
									Accept the request
								</a>
						<?php
									}
								}
							}
						?>
					</div>
				</div>					
			</div>

		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
