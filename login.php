<?php $title = "Login Page" ;?>

<?php include 'partial_upper.php';?>


<div class="card col-md-5">
	<form class="form" method="post" action="database/login.php">
		<h2>Login</h2>

		<div>
			<label for="email">E-mail address/Username:</label>
			<input type="text" name="email" id="email" required />
		</div>
		<div>
			<label  for="password">Password:</label>  
			<input type="password" name="password" id="password" required />
		<div>
		<div>
			<button type="submit" name="submit" class=" btn btn-primary" > Login</button> <br>
		</div>
			
		<div>				
			 <a href="#" type="submit">Forgot Password?</a> <br>
			Haven't registered yet then 
			<a href="register.php">Sign up</a> here!
		</div>
	</form>

		<?php 
			 if(isset($_SESSION['login_message']) && $_SESSION['login_message'] != null){
		 ?>
		 
		 <div class="panel alert-danger">
			<div class="panel-body">
				<?=$_SESSION['login_message'] ?>
			</div>
		 </div>

		<?php
				$_SESSION['login_message'] = null; 
			}
		?>
</div>

<?php include 'partial_lower.php'; ?>

