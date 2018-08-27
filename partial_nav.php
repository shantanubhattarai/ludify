<div class="container col-md-9">
	<nav class="navbar navbar-light navbar-expand-lg">
		<a class="navbar-brand" href="."><h2>ludify</h2></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="" style="color:white;"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
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
					<a class="nav-link" href="database/logout.php"> log out</a>
				<?php }
				?>
			</ul>
		</div>
	</nav>
</div>
