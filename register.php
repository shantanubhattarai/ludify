<?php $title = "Register Page" ;?>

<?php include 'partial_upper.php';?>

<div>
	<div ></div>
	<div>
			<div class="panel panel-primary" style="padding: 0;">
				<div><h3>Update a Profile picture</h3></div>
				<div class="panel-body"> 

<form class="form form-group" method="post" action="database/register.php" enctype="multipart/form-data">

					<div class="container-fluid"  >
						<div id="profile_image"></div>
						<input type="file" name="file" id="file">
							
					</div>
			</div>
		</div>
	</div>

	<div class="container col-sm-1"></div>

<div>
	<div><h3>Sign up here</h3></div>
		<div >
			<label for="name" >First Name:</label>
			<div>
				<div class="input-group"> 
					<input type="text" name="fname" id="fname" required />
				</div>
			</div>
		</div>
		<div col-md-6">
			<label for="name">Last Name:</label>
			<div>
					<input type="text" name="lname" id="lname" required/>
			</div>
		</div> 
	</div>
					


 <div>
		<div class="col-md-6">
			<div">
				<label for="gender" >Gender:</label>
					<br>
						<label class="radio-inline">
						<input type="radio" name="gender" id="gender1" value="male">Male
				</label>
			<label class="radio-inline">
					<input type="radio" name="gender" id="gender2" value="female">Female
			</label>
	</div>
	</div>
	
	<div>
		<label for="email">Contact Number:</label>
				<input type="text"  name="contact" id="email"  placeholder="Contact Number" required maxlength="10" />
	</div>
	
	


	<div>
		<label for="email" required>E-mail address:</label>
		
				<input type="text" name="email" id="email"  placeholder="E-mail address" / required>
			
	</div>
 
	<div >
		<label for="email">Birthdate:</label>
		
				<input id="exampleInputDOB1" name="dob" placeholder="Date of Birth" type="date" required>
	 
	</div>
	
	<div >
		<label for="username">Username:</label>
				<input type="text" name="username" id="username"  placeholder="Username" required  />
			</div>
	
 
	<div >
		<label for="password">Password:</label>
		
				<input type="password" name="password" id="password" minlength="6" placeholder="At least 6 characters" required  onkeyup='check();' />
			</div>
		
	</div>
	<div >
 
		<label for="confirm" style="text-align:left; ">Confirm Password:</label>
	 
				<input type="password" name="confirm_password" id="confirm_password" minlength="6" required  placeholder="Re-type Password" onkeyup='check();'/> <span id="message"></span>
			</div>
	 
	</div>
	</div>
	<div >
		<button type="submit"  ><span ></span> Sign up</button>
	</div>
							
					</form>

			</div>
		</div>
</div>

 
<script>
	$('#password, #confirm_password').on('keyup', function () {
	if ($('#password').val() == $('#confirm_password').val()) {
		$('#message').html('Matching').css('color', 'green');
	} else 
		$('#message').html('Not Matching').css('color', 'red');
});


</script>




</body>
</html>