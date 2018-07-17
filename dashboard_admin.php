<?php 
	$title = "Dashboard";
?>
<?php //include 'database/admin_check.php'; ?>

<?php include'partial_upper.php'; ?>

<div class="col-md-2 container">
<div class="card sidebar sidebar-left">
	<ul class="list-group-flush" style="padding:0; margin-bottom: 0;">
			<a class="list-group-item" href="dashboard_admin.php">Dashboard</a>
			<a class="list-group-item" href="?type=notices">Notices</a>
			<a class="list-group-item" href="?type=feedback">Feedback</a>
			<a class="list-group-item" href="?type=settings">Settings</a>
		</ul>
	</div>
</div>
<div class="col-md-9 container main-content">
	<div class="col-sm-12 col-xs-12 col-md-12" style="height: 100%;">
		<div class="card" style="min-height:100%">	
			<div class="card-body">
				<?php
					if(isset($_GET['type'])) {
						include 'dashboard/dashboard_'.$_GET['type'].'.php';
					}else{
				?>
				
				<div class="row">
					<div class="container col-md-4">
						<div class="card">
							<a href="?type=users">
								<div class="card-body">
									<strong>Active Users</strong>
									
									<?php
										$sql = "select * from users";
										$result = mysqli_query($conn,$sql);
										$total = mysqli_num_rows($result);
									?>
									<br>
									<span class="text"><?=$total?></span> <br>									
								</div>
							</a>
						</div>
					</div>

					<div class="container col-md-4">
						<div class="card">
							<a href="#">
								<div class="card-body">
									<strong>Total Visits</strong>
									<br>
									<?php 
										$sql = "SELECT sum(count) as visits FROM users where user_id!=3";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_assoc($result);
										$count = $row['visits'];
									?>
									<span class="text"><?=$count?></span> <br>
								</div>
							</a>
						</div>
					</div>

					<div class="container col-md-4">
						<div class="card">
							<a href="?type=feedback">
								<div class="card-body">
									<strong>Feedback</strong>
									<br>
									<?php
										$sql = "SELECT count(feedback_id)	 as total FROM feedback";
										$result = mysqli_query($conn,$sql);
										$row = mysqli_fetch_assoc($result);
										$count = $row['total'];
									?>
									<span class="text"><?=$count?></span> <br>
								</div>
							</a>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>

</div>

<?php include'partial_lower.php'; ?>