<?php $title = "FILE UPLOAD" ;?>
<?php include 'partial_upper.php';?>

		<div class="col-md-9 container main-content">
			<form action="database\file_upload.php" method ="post" enctype="multipart/form-data">
			<div class="form-group">
				<label><b>Type of Article</b></label> <br>
								<select name="category_id">
							<option value="1">Category 1</option>
							<option value="2">Category 2</option>
							<option value="3">category 3</option>
							<option value="4">category 4</option>
				</select><br>
				
								<label><b>Article Title </b></label><br>
								<input type="text" name="title"><br>

								<label><b>Article Body</b></label><br>
								<textarea name="body" rows="15" cols="55"></textarea><br>

				<input type="file" name="file"><br>
				<input type="submit" value="Publish" name="article">
			</div>
			</form>
				</div>
				
		</div>
</div>


<?php include 'partial_lower.php'; ?>
