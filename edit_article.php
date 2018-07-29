<?php $title = "FILE UPLOAD" ;?>
<?php include 'partial_upper.php';?>
<?php include'partial_sidebar.php'; 
		$id = $_GET['article_id'];
		$query = "SELECT * FROM articles WHERE article_id = $id";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		$sql2 = mysqli_query($conn,"select * from files where file_id = ".$row['file_id']);
		$row2 = mysqli_fetch_assoc($sql2);
		$link =  $row2['link'];
		$title=$row['article_title'];
		$body = $row['article_body'];
?>

		<div class="col-md-9 container main-content">
			<form action="database\edit_article.php" method ="post" enctype="multipart/form-data">
			<div class="form-group">
					<input type="text" hidden value="<?=$id?>" name ="id">
					<label><b>Article Title </b></label><br>
					<input type="text" name="title"  value="<?=$title?>"><br>
					<label><b>Article Body</b></label><br>
					<textarea name="body" rows="15" cols="55" value="<?=$body?>"></textarea><br>
				<input type="submit" value="Confirm" name="submit">
			</div>
			</form>
				</div>
				
		</div>
</div>


<?php include 'partial_lower.php'; ?>
