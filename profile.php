<?php $title = "Profile" ;?>
<?php include 'partial_upper.php'; ?>
<?php include'partial_sidebar.php'; ?>
		<div class="col-md-9 container">
			<?php
				if(isset($_SESSION['user_id'])&& $_SESSION['user_id']!=""){ 
					$user_id = $_SESSION['user_id'];

					$query = "SELECT * FROM users where user_id='$user_id'";
					$result = mysqli_query($conn,$query);
					$row =mysqli_fetch_assoc($result);
				if(empty($row['avatar'])){
					$profile_img = "media/default.png";	
				}
				else{
					$profile_img = $row['avatar'];
				}
				$result2 = mysqli_query($conn,"select role_name from user_roles where role_id = ".$row['role_id']);
				$row2 = mysqli_fetch_assoc($result2);

			?>
				<img class="rounded-circle " style="width:200px; height:200px;" src="<?=$profile_img?>"><br>
				<table class="table table-borderless table-nonfluid">
					<tr>
						<td><label>Username</label></td>
						<td><?=$row['username']?></td>
					</tr>
					<tr>
						<td><label>Name</label></td>
						<td><?=$row['first_name']." ".$row['last_name']?></td>
					</tr>
					<tr>
						<td><label>Email</label></td>
						<td><?=$row['email']?></td>
					</tr>
					<tr>
						<td><label>Type</label></td>
						<td><?=$row2['role_name']?></td>
					</tr>
					<tr>
						<td><label>Date of Birth</label></td>
						<td><?=$row['dob']?></td>
					</tr>
				</table>
				<a href="edit_profile.php" class="btn btn-outline-danger">Edit profile</a> 
			<?php
			}
			else{
				$_SESSION['error'] ="Login First";
				header('location:login.php');
			}
			?>
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
