<?php
	$title = "Login as Administrator";
?>
<?php include 'partial_upper.php';?>
<div class="container col-md-4">
	<form class="form" action ="database/admin_login.php" method="post">
		<div class="form-group">
			<label class = "control-label" for="email">E-mail address/Username:</label>
			<input class = "form-control" type="text" name="email_login" id="email" required />
		</div>
		<div class="form-group">
			<label  class = "control-label"  for="password">Password:</label>  
			<input class = "form-control"  type="password" name="password_login" id="password" required />
		</div>
		<div class="form-group">
			<button  class=" btn btn-danger" type="submit" name="submit"> Login</button> <br>
		</div>
		<div class="form-group">
			<a href="password_reset.php">Forgot your password?</a>
		</div>
	</form>
</div>

<?php include'partial_lower.php'; ?>