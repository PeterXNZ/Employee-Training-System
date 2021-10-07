<?php 
	include_once '_header.php';

	//reject unauthorised access
	if($_SESSION['user_position']!="Admin"){
		header("Location: index.php?login=unauthorised");
		exit();
	}
	// //connect data base
	// include_once 'includes/database_connection.inc.php'; 

 ?>	
<a href="admin_manage_employees.php">Back</a>
<body>

	<form align=center action = "includes/admin_add_users.inc.php" method="POST">
		<h4>Add users here</h4>
		<br>
		<input type="text" name="name" placeholder="User name">
		<br>
		<br>
		<input type="password" name="password" placeholder="Set user password">
		<br>
		<br>
		<input type="text" name="age" placeholder="Age">
		<br>
		<br>
		<!-- <input type="text" name="sex" placeholder="Gender"> --> <!-- it might change to selection button later-->
		<select name="sex">
			<option>Gender</option>
			<option value="Female">Female</option>
			<option value="Male">Male</option>
		</select>
		<br>
		<br>
		<input type="text" name="email" placeholder="Set user email address">
		<br>
		<br>
		<input type="text" name="phone_number" placeholder="Phone number">
		<br>
		<br>
		<!-- <input type="text" name="position" placeholder="User position in this company"> --> <!-- it might change to selection button later-->
		<select name="position">
			<option>Postion in company</option>
			<option value="Employee">Employee</option>
			<option value="Admin">Admin</option>
		</select>
		<br>
		<br>
		<button type= "submit" name="signup">Add</button>
	</form>

<?php 
		if(isset($_GET['add'])){
			if($_GET['add'] == "empty"){
				echo "<p  class='red' align=center>Error: Input cannot be empty</p>";
			}

			else if($_GET['add'] == "repeat"){
				echo "<p  class='red' align=center>Error: Already registered email, name, or phone number</p>";
			}

			else if($_GET['add'] == "invalid"){
				echo "<p  class='red' align=center>Error: Invalid input!</p>";
			}

			else if($_GET['add'] == "email"){
				echo "<p  class='red' align=center>Error: Incorrect format of email!</p>";
			}

			else if($_GET['add'] == "position"){
				echo "<p  class='red' align=center>Error: You have to choose a position!</p>";
			}

			else if($_GET['add'] == "sex"){
				echo "<p  class='red' align=center>Error: You have to choose a gender!</p>";
			}


			else if($_GET['add'] == "success"){
				echo "<p  class='green' align=center>Adding user successfully!</p>";
			}

		}


	 ?>



</body>