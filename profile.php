<?php $title = "Profile" ;?>
<?php include 'partial_upper.php';?>
<?php include'partial_sidebar.php'; ?>
		<?php
			$user_id=$_SESSION['user_id'];
			if(empty($user_id)){
				echo "EMPTYY";
			}
			$query = mysqli_query($conn,"select * from  users where user_id='$user_id'");
			$row = mysqli_fetch_assoc($query);
		?>
		<div class="col-md-8 card">         
			<?php
				echo $row['first_name']." ".$row['last_name'];
				echo "\n";
				echo $row['email'];
				//show the profile details here
			//use the row['column_name'] to get calues here;
			?>
		</div>
	</div>
</div>			
		
<?php include 'partial_lower.php'; ?>
