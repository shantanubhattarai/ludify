<?php $title = "FILE UPLOAD" ;?>
<?php include 'partial_upper.php';?>
<?php include'partial_sidebar.php'; ?>

		<div class="col-md-9 container main-content">
			<form action="database\file_upload.php" method ="post" enctype="multipart/form-data">
			<div class="form-group">
				<label><b>Type of Article</b></label> <br>
					<select name="category_id">
				<?php
					$res = mysqli_query($conn,"SELECT * from article_categories");
					while($row =mysqli_fetch_assoc($res)){
						$id = $row['category_id'];
				?>
						<option value="<?=$id?>"><?=$row['category']?></option>

				<?php
					}
				?>
					</select><br>
				
					<label><b>Article Title </b></label><br>
					<input type="text" name="title"><br>

					<label><b>Article Body</b></label><br>
					<textarea name="body" rows="15" cols="55"></textarea><br>

				<input type="file" name="file"><br>
				<input class="btn btn-outline-danger" type="submit" value="Publish" name="article">
			</div>
			</form>
				</div>
				
		</div>
</div>


<?php include 'partial_lower.php'; ?>
