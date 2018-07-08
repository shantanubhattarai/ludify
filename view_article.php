<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php'; ?>

<!-- TODO:include check for article id to redirect to list here -->

<div class="container">
	<div class="row">
		<div class="col-md-2 container">
			<div class="card sidebar sidebar-left">
				<ul class="list-group-flush" style="padding:0; margin-bottom: 0;">
					<a href="." class="list-group-item" style="color:#F44336;opacity: 0.93;">Home</a>
					<a href="#" class="list-group-item text-muted">Dashboard</a>
					<a href="#" class="list-group-item text-muted">Your Requests</a>
					<a href="#" class="list-group-item text-muted">About</a>
					<a href="#" class="list-group-item text-muted">Contact</a>
				</ul>
			</div>
		</div>
		<div class="col-md-9 container main-content">
			<?php
				$id = $_GET['article_id'];
				$query = "SELECT * FROM articles WHERE article_id = $id";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);

				$sql2 = mysqli_query($conn,"select link from files where file_id = ".$row['file_id']);
				$row2 = mysqli_fetch_assoc($sql2);
				$link =  $row2['link'];
			?>
			<div class="card border-0">
				<div class="card-header">
					<h3><?= $row['article_title']; ?> </h3>
				</div>
				<div class="card-body">
					<?= $row['article_body']; ?>
					<form action = "database/download_file.php" method="post">
						<input type="text" name="link" value=<?= $link?> hidden >
						<input class="btn btn-info" value="Download" type="submit" name="submit">
					</form>
				</div>
			
				<?php 
//COMMENT SECTION
					$result  = mysqli_query($conn,"SELECT * FROM comments where article_id = '$id'");
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){
							$comment_id = $row['comment_id'];
				?>

				<div class="card border-0">
							<?php 
								echo GetUsername($conn,$row['comment_user_id'])."<br>";
							 	echo $row['comment_body'];
//REPLY SECTION
							 	$result2 = mysqli_query($conn,"SELECT * FROM replies where comment_id = '$comment_id'");
							 	if(mysqli_num_rows($result2) >0){
									while($row2 = mysqli_fetch_assoc($result2)){
							 			echo GetUsername($conn,$row['reply_user_id'])."<br>";
							 			echo $row['reply_body'];
							 		}
							 	}
//ADD REPLY SECTION
							?>
						<button class="btn btn-outline-danger" onclick="addReply()" id="replyadd_btn" value="Add Reply">
							Add Reply
						</button>
						<div id="addReply">
							<?=$comment_id;?>
							<form action="database/reply.php" method="post">
								<textarea rows = "3" name="body"></textarea>
								<input type="text" name="comment_id" hidden value="<?=$comment_id?>">
								<div class="form-group">
									<button type="submit" class="btn btn-outline-danger" name="submit">Submit</button>
								</div>
							</form>
						</div>
						<?php
						}
						echo "<br>";
					}
				?>
				</div>

				<div class="card border-0">
					<form action="database/comment.php" method="post">
						<textarea rows = "3" name="body"></textarea>
						<input type="text" name="article_id" hidden value="<?=$id?>">
						<div class="form-group">
							<button type="submit" class="btn btn-outline-danger" name="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	var replyarea = document.getElementById('addReply');
	var reply_area_style= replyarea.style.display;
	replyarea.style.display = 'none';	

	var replyadd_btn = document.getElementById('replyadd_btn');
	function addReply(){
		if(replyarea.style.display=='none'){
			replyarea.style.display='block';
			replyadd_btn.innerHTML="Cancel";
			console.log("ON IF");
		}
		else{
			replyarea.style.display = 'none';
			replyadd_btn.innerHTML='Add Reply';
			console.log("ON ELSE");
		}


	}
</script>
<?php include 'partial_lower.php'; ?>
