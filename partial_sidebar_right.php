<?php include'database/maintenance_check.php'; ?>

<div class="col-md-3 container">
	<div class="card sidebar sidebar-right">
		<div class="card-body">
		<form class="form">
			<div class="form-group">
					<input class = "form-control mr-3" type="text" name="search_text" placeholder="search by name">
			</div>
			<div class="form-group">
				<button class = "btn btn-outline-danger" type="submit" name = "search">search</button>
			</div>
						<div class="form-group">
					<label for="filter" class="control-label">filter by:</label>
					<select class="form-control custom-select" name="filter">
						<option value = "0">All</option>
				<?php
					$res = mysqli_query($conn,"SELECT * from article_categories");
					while($row =mysqli_fetch_assoc($res)){
						$id = $row['category_id'];
				?>
						<option value="<?=$id?>"><?=$row['category']?></option>
				<?php
					}
				?>
					</select>
				</div>
				<div class="form-group">
					<label for="order" class="control-label">sort by:</label>
					<select class="form-control custom-select" name="order">
						<option value="article_title">name</option>
						<option value="date_of_upload">upload date</option>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-outline-danger" onclick="reload(true);">apply</button>
				</div>
				<div class="form-group">
					<a href="index.php" class="text-muted">reset all</a>
				</div>
		</form>
	</div>
	</div>
</div>
