<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>

<!-- TODO:include check for article id to redirect to list here -->
<?php include'partial_sidebar.php'; ?>
		<div class="col-md-9 container main-content">
			<?php
				if(isset($_SESSION['user_id'])){
					$user_id = $_SESSION['user_id'];
				}
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
					<?= $row['article_body'] ?>
					<form class = "form" action = "database/download_file.php" method="post">
						<div class="form-group">
							<input type="text" name="link" value=<?= $link ?> hidden>
							<input type="text" name="file_id" value=<?= $row['file_id'] ?> hidden>
							<br>
							<input class="btn btn-outline-danger" value="Download" type="submit" name="submit">
							File: <?= $file_name ?>
						</div>	
					</form>
					<br>
					No. of total Downloads: <?=$row2['no_of_downloads']?>
						<?php
							if(isset($user_id) && $user_id ==$row['author_id']){
						?>
						<div class="row">
							<a href="edit_article.php?article_id=<?=$id?>" class="btn btn-outline-danger"> Edit Article</a> &nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn btn-outline-danger" onclick="confirmation();"> Delete Article</button>
						</div>
						<?php
							}
						?>
				</div>

				<div class="card">
					<ul class="list-group list-group-flush">
				<?php 
//COMMENT SECTION
					$result  = mysqli_query($conn,"SELECT * FROM comments where article_id = '$id' order by comment_date desc");
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){
							$comment_id = $row['comment_id'];
							$comment_user_id =$row['comment_user_id'];
				?>
								<li class= 'list-group-item'><a href="view_profile.php?author_id=<?=$comment_user_id?>"><b><?=GetUsername($conn,$comment_user_id)?></b></a><br>
							 	 <?=$row['comment_body']?></li>
						<?php
						}
					}
				?>
				</ul>
				</div>
				<?php 
					if(isset($_SESSION['user_id'])){
				?>
					<div class="card border-0">
						<form action="database/comment.php" method="post">
							<textarea rows = "3" name="body"></textarea>
							<input type="text" name="article_id" hidden value="<?=$id?>">
							<div class="form-group">
								<button type="submit" class="btn btn-outline-danger" name="submit">Add Comment</button>
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

<script type="text/javascript">
	function confirmation(){
		var text = confirm('Are you sure you want to delete this article?"');
		if(text == true){
			window.location.href="database/delete_article.php?article_id=<?=$id?>";
		}
		else{
			this.cancel();
		}
	}
</script>

<?php include 'partial_lower.php'; ?>
