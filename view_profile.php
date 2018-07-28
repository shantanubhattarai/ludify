<?php $title = "Profile" ;?>
<?php include 'partial_upper.php'; ?>
<?php include'partial_sidebar.php'; 
// FOR PAGE
$items_per_page = 4;
include 'include\pagination.php';
?>
		<div class="col-md-9 container">
			<?php
					$author_id = $_GET['author_id'];
					$query = "SELECT * FROM users where user_id='$author_id'";
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
				<table class="table table-borderless">
					<tr>
						<td><label>Username</label></td>
						<td><h4 class="profile"><?=$row['username']?></h4></td>
					</tr>
					<tr>
						<td><label>Name</label></td>
						<td><h4 class="profile"><?=$row['first_name']." ".$row['last_name']?></h4></td>
					</tr>
					<tr>
						<td><label>Email</label></td>
						<td><h4 class="profile"><?=$row['email']?></h4></td>
					</tr>
					<tr>
						<td><label>Type</label></td>
						<td><h4 class="profile"><?=$row2['role_name']?></h4></td>
					</tr>
					<tr>
						<td><label>Date of Birth</label></td>
						<td><h4 class="profile"><?=$row['dob']?></h4></td>
					</tr>
				</table>

				<table class="table table-borderless">
					<tr>
						<th>S No.</th>
						<th>Article title</th>
						<th>Category</th>
						<th>Published Date</th>
					</tr>
					<?php
					$sno = 1;
					$result = mysqli_query( $conn , " SELECT * FROM articles  WHERE author_id = '$author_id' ORDER BY date_of_upload  DESC LIMIT $start, $items_per_page ");
					$result1 = mysqli_query( $conn , " SELECT * FROM articles WHERE author_id = '$author_id' ORDER BY date_of_upload  DESC");
					$total_items = mysqli_num_rows($result1); 
					if($result)
					while($row = mysqli_fetch_assoc($result)){
						$res = mysqli_query($conn , "SELECT category from article_categories WHERE category_id = ".$row['article_category']);
						$row2 = mysqli_fetch_assoc($res);
						$article_id = $row['article_id'];
					?>
					<tr>
						<td><?=$sno?></td>
						<td><a href="view_article.php?article_id=<?=$article_id?>"><?=$row['article_title']?></a></td>
						<td><?=$row2['category']?></td>
						<td><?=$row['date_of_upload']?></td>
					</tr>
						<?php
							$sno++;
							}
							include 'include\pagination_display.php';
						?>
				</table>
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
