<?php $title = "Register Page" ;?>

<?php include 'partial_upper.php';?>

<div class="container col-md-4">
	<form class="form" method="post" action="database/register.php" enctype="multipart/form-data">
		
		<div class="form-group">
			<label class="control-label">Profile picture:</label>
			<div id="profile_image">display image here</div>
			<input type="file" name="profile_image" id="profile_image">
		</div>
		
		<div class = "form-group">
			<label for="name" class="control-label" >First Name:</label>
			<input class="form-control" type="text" name="fname" id="fname" required />
		</div>
		
		<div class="form-group">
			<label for="name" class="control-label">Last Name:</label>
			<input class = "form-control" type="text" name="lname" id="lname" required/>
		</div> 
		
		<div class="form-group">
			<label class="control-label" for="gender" >Gender:</label>
			<input type="radio" name="gender" id="gender1" value="male">Male
			<input type="radio" name="gender" id="gender2" value="female">Female
		</div> 

		<div class="form-group">
			<label class="control-label"  for="email">Contact Number:</label>
			<input  class = "form-control" type="text"  name="contact" id="email" required maxlength="10" />
		</div>
		
		<div class="form-group">
			<label class="control-label"  for="email" required>E-mail address:</label>
			<input  class = "form-control" type="text" name="email" id="email" required>		
		</div>
	 
		<div class="form-group">
			<label class="control-label"  for="email">Birthdate:</label>
			<input  class = "form-control" id="exampleInputDOB1" name="dob" type="date" required>
		</div>
		
		<div class="form-group">
			<label class="control-label"  for="username">Username:</label>
					<input  class = "form-control" type="text" name="username" id="username" required  />
		</div>

		<div class="form-group">
			<label class="control-label"  for="password">Password:</label>
			<input  class = "form-control" type="password" name="password" id="password" minlength="6" placeholder="At least 6 characters" required  onkeyup='check();' />
		</div>

		<div class="form-group">
			<label class="control-label"  for="confirm">Confirm Password:</label>
			<input  class = "form-control" type="password" name="confirm_password" id="confirm_password" minlength="6" required  placeholder="Re-type Password" onkeyup='check();'/> <span id="message"></span>
		</div>
		 
		<div class="form-group">
			<button class="btn btn-danger" type="submit"  >Sign up</button>
		</div>
								
	</form>

</div>

<script>
	$('#password, #confirm_password').on('keyup', function () {
	if ($('#password').val() == $('#confirm_password').val()) {
		$('#message').html('Matching').css('color', 'green');
	} else 
		$('#message').html('Not Matching').css('color', 'red');
});


</script>


<?php include 'partial_lower.php'?>
