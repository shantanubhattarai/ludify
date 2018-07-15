<div class="container col-md-9">
	<nav class="navbar navbar-light navbar-expand-lg">
		<a class="navbar-brand" href="."><h2>ludify</h2></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="" style="color:white;"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<form id="filter-options" class="form-inline my-2 my-lg-0 ml-auto">
				<div class="form-group">
					<label for="filter" class="control-label">filter by:</label>
					<select class="form-control custom-select" name="filter">
						<option>network</option>
						<option>customization</option>
					</select>
				</div>
				<div class="form-group mx-3">
					<label for="order" class="control-label">sort by:</label>
					<select class="form-control custom-select" name="order">
						<option>name</option>
						<option>upload date</option>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-outline-danger">apply</button>
				</div>
			</form>
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item">
					<a id="filter-toggle" class="nav-link" href="#" style="visibility:hidden;"> filter options </a>
				</li>
				<?php
					if(!isset($_SESSION['user_id'])){
				?>
				<li class="nav-item">
					<a class="nav-link" href="login.php"> sign in </a>
				</li>
				<?php
					}
					else{
				?>
					<a class="nav-link" href="database/logout.php"> LogOut</a>
				<?php }
				?>
			</ul>
		</div>
	</nav>
</div>
