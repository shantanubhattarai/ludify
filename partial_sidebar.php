<?php include'database/maintenance_check.php'; ?>
<?php include'database/get_userrole.php'; ?>

<div class="col-md-2 container">
	<div class="card sidebar sidebar-left">
		<ul class="list-group-flush" style="padding:0; margin-bottom: 0;">
			<a href="index.php" class="sidebar-item list-group-item text-muted" id="sidebar-item-1">Home</a>
			<a href="profile.php" class="sidebar-item list-group-item text-muted" id="sidebar-item-2">Profile</a>
			<a href="request.php" class="sidebar-item list-group-item text-muted" id="sidebar-item-3">Requests
				<?php include 'database/notification.php'?>
			</a>
			<a href="notice.php" class="sidebar-item list-group-item text-muted" id="sidebar-item-4">Notices</a>
			<a href="#" class="sidebar-item list-group-item text-muted" id="sidebar-item-5">About</a>
		<?php
//FOR DEVELOPER
			if(isset($_SESSION['user_id'])&& GetUserRole($conn,($_SESSION['user_id']))=="1"){
		?>
			<a href="file_upload.php" class="sidebar-item list-group-item text-muted" id="sidebar-item-6">Article Upload</a>

		<?php
			}
//FOR USER
			else if(isset($_SESSION['user_id'])&& GetUserRole($conn,($_SESSION['user_id']))=="2"){
		?>
			<a href="feedback.php" class="sidebar-item list-group-item text-muted" id="sidebar-item-6">Send Feedback</a>

		<?php
			}
		?>
		</ul>
	</div>
</div>
