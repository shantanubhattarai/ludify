<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php'; ?>

<!-- TODO:include check for article id to redirect to list here -->
<?php include'partial_sidebar.php'; ?>
		<div class="col-md-9 container main-content">
			<?php
				$id = $_GET['article_id'];
				$query = "SELECT * FROM articles WHERE article_id = $id";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);

				$sql2 = mysqli_query($conn,"select * from files where file_id = ".$row['file_id']);
				$row2 = mysqli_fetch_assoc($sql2);
				$link =  $row2['link'];
				$file_name = $row2['file_name'];
			?>
			<div class="card border-0">
				<div class="card-header">
					<h3><?= $row['article_title']; ?> </h3>
				</div>
				<div class="card-body">
					<?= $row['article_body']; ?>
					<form class = "form" action = "database/download_file.php" method="post">
						<div class="form-group">
							<input type="text" name="link" value=<?= $link ?> hidden>
							<input type="text" name="file_id" value=<?= $row['file_id'] ?> hidden>
							<br>
							<input class="btn btn-danger" value="Download" type="submit" name="submit">
							File: <?= $file_name ?>
						</div>	
					</form>
					<br>
					No. of total Downloads: <?=$row2['no_of_downloads']?>
				</div>
			
				<?php 
//COMMENT SECTION
					$result  = mysqli_query($conn,"SELECT * FROM comments where article_id = '$id' order by comment_date desc");
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){
							$comment_id = $row['comment_id'];
				?>

				<div class="card border-0">
							<?php 
								echo "<b>".GetUsername($conn,$row['comment_user_id'])."</b><br>";
							 	echo $row['comment_body'];
							?>
						<?php
						}
					}
				?>
				</div>
				<?php 
					if(isset($_SESSION['user_id'])){
				?>
					<div class="card border-0">
						<form action="database/comment.php" method="post">
							<textarea rows = "3" name="body"></textarea>
							<input type="text" name="article_id" hidden value="<?=$id?>">
							<div class="form-group">
								<button type="submit" class="btn btn-outline-danger" name="submit">Submit</button>
							</div>
						</form>
					</div>
				<?php
					}
				?>
			</div>

		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
