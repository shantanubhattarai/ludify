<?php $title = "Edit Profile" ;?>
<?php include 'partial_upper.php'; ?>
<?php include'partial_sidebar.php'; ?>
	<?php
		$user_id = $_SESSION['user_id'];
		$sql = mysqli_query($conn,"select * from users where user_id = '$user_id'");
		if($sql){
			$row = mysqli_fetch_assoc($sql);
		}
		else{
			echo mysqli_error($conn);
		}	
	?>
		<form class="form col-md-4" method="post" action="database\edit_profile.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name" class="control-label">First Name</label>
				<input class="form-control" name="first_name" value = "<?=$row['first_name']?>" required>
			</div>
			<div class="form-group">
				<label for="name" class="control-label">Last Name</label>
				<input class="form-control" name="last_name" value = "<?=$row['last_name']?>" required>
			</div>
			<div class="form-group">
				<label for="name" class="control-label">Date of Birth</label>
				<input class="form-control" name="dob" value = "<?=$row['dob']?>" required>
			</div>
			<div class="form-group">
	  			<img id="blah" src="<?=$row['avatar']?>" alt="your image" width="100" height="100" class="rounded-circle" />
			  	<label class="control-label" for="image"> Select your image</label>
				<input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
	  		</div>
			<div class="form-group">
				<button type="submit" class="btn btn-danger" name="submit">Update</button>
			</div>
		</form>

		<form class="form col-md-4" method="post" action="database/reset_password.php">
			<div class ="form-group">
				<label for="change_password" class="control-label">Old Password</label>
				<input class="form-control" name="password_old" type="password">
				<label for="change_password" class="control-label">New Password</label>
				<input class="form-control" name="password_new1" type="password">
				<label for="change_password" class="control-label">Re-enter New Password</label>
				<input class="form-control" name="password_new2" type="password">

			</div>
			<div class ="form-group">
				<button type="submit" class="btn btn-danger" name="confirm">Confirm</button>
			</div>

		</form>
		
	</div>
</div>

<?php include 'partial_lower.php'; ?>
