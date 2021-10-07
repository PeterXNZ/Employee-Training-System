<!DOCTYPE html>
<html>
<head>
	<title>User Signing Up</title>
	<style>
		body{
			font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
		}
	</style>
	<a href="index.php">Back</a>
	<p></p>
</head>
<body>
	<br>
	<form align=left action = "includes/signup.inc.php" method="POST">
		<h3>Create your account here</h3>

		<p>Name</p>
		<input type="text" name="name" placeholder="Your name">

		<p>Password</p>
		<input type="password" name="password" placeholder="Enter your password">

		<p>Age</p>
		<input type="text" name="age" placeholder="Age">

		<p>Your gender:       <select name="sex">
			<option></option>
			<option value="Female">Female</option>
			<option value="Male">Male</option>
		</select></p>

		<p>Eamil</p>
		<input type="text" name="email" placeholder="Your email address">

		<p>Phone number</p>
		<input type="text" name="phone_number" placeholder="Phone number">
		
		<p>Your position: <select name="position">
			<option></option>
			<option value="Employee">Employee</option>
			<option value="Admin">Admin</option>
			<option value="Instructor">Instructor</option>
		</select></p>
		
		<br>

		<button type= "submit" name="signup">Sign up now !</button>
	</form>
	<br>

	<?php 
		if(isset($_GET['signup'])){
			if($_GET['signup'] == "empty"){
				echo "<font color='red'>Error: Input cannot be empty!</font>";
			}

			else if($_GET['signup'] == "repeat"){
				echo "<font color='red'>Error: Already registered email, name, or phone number!</font>";
			}

			else if($_GET['signup'] == "invalid"){
				echo "<font color='red'>Error: Invalid input!</font>";
			}

			else if($_GET['signup'] == "email"){
				echo "<font color='red'>Error: Incorrect format of email!</font>";
			}

			else if($_GET['signup'] == "gender"){
				echo "<font color='red'>Error: Please choose your gender!</font>";
			}

			else if($_GET['signup'] == "position"){
				echo "<font color='red'>Error: Please choose your position!</font>";
			}

		}


	 ?>
</body>
</html>