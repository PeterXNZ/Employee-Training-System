<!DOCTYPE html>
<html>
<head>
	<title>Employee Training System</title>
	<style>
		body{
			font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
		}
	</style>

	<form align=center >
 		<h1 algin = center>Employee Traning System Login</h1>
 	</form>
 	<form action="homepage.php" align=right>
 		<button type="submit">Already logged in?</button>
 	</form>
 	<hr>
	
</head>
<body>
	<br>
	<br>
	<form align=left action = "includes/login.inc.php" method="POST">
		<p>Email</p>
		<input type="text" name="email" placeholder="Email">
		
		<p>Password</p>
		<input type="password" name="password" placeholder="Password">
		<br>
		<br>
		<button type="submit" name="login">Log in</button>
	</form>

	<br>

	<br>
	<form align = left action ="signup.php">
		Haven't got an account? <button type= "submit" name="tosignup">Sign up first</button>
	</form>
	<br>
	<br>
	<?php
		
		if(isset($_GET['login'])){
			if($_GET['login'] == "incorrect"){
				echo "<font color='red'>Error: Invalid email or password!</font>";
			}

			if($_GET['login'] == "unauthorised"){
				echo "<font color='red'>Error: You are not unauthorised! Try to login with an authorised account</font>";
			}

		}

		if(isset($_GET['signup'])){
			if($_GET['signup'] == "success"){
				echo "<font color='green'>Sign up sccessfully!</font>";
			}
		}

		if(isset($_GET['logout'])){
			if($_GET['logout'] == "success"){
				echo "<font color='green'>Log out sccessfully!</font>";
			}
		}

	 ?>
</body>
</html>