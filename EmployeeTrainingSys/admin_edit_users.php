<?php 
	include_once '_header.php';

	//reject unauthorised access
	if($_SESSION['user_position']!="Admin"){
		header("Location: index.php?login=unauthorised");
		exit();
	}

	//connect database
	include_once 'includes/database_connection.inc.php'; 

	//set current admin editing user id
	if(!isset($_SESSION['admin_edit_uid'])){
		$_SESSION['admin_edit_uid'] = $_POST['edit_id'];
	}
	else{
		if(isset($_POST['edit_id'])){
			if($_SESSION['admin_edit_uid'] != $_POST['edit_id']){
				$_SESSION['admin_edit_uid'] = $_POST['edit_id'];
			}
		}
	}
	$edit_user_id = $_SESSION['admin_edit_uid'];
	$sql = "SELECT * FROM users WHERE id = '$edit_user_id'";
	$edit_user =   mysqli_fetch_assoc(mysqli_query($connection, $sql));
	
 ?>

 <a href="admin_manage_employees.php">Back</a>

 <h4 align=center>Edit your employees information here</h4>

 <form align=center action="includes/admin_edit_name.inc.php" method="POST">
	Name: <input type="text" name="name" value=<?php echo $edit_user['name']; ?>>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>

<br>

 <form align=center action="includes/admin_edit_password.inc.php" method="POST">
	Password: <input type="text" name="password" value=<?php echo $edit_user['password']; ?>>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>
<br>

<form align=center action="includes/admin_edit_age.inc.php" method="POST">
	Age: <input type="text" name="age" value=<?php echo $edit_user['age']; ?>>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>

<br>

 <form align=center action="includes/admin_edit_sex.inc.php" method="POST">
	Sex:<select name="sex" >
		<option value="Female"<?php if($edit_user['sex']=="Female"){ echo "selected";} ?>>Female</option>
		<option value="Male"<?php if($edit_user['sex']=="Male"){ echo "selected";} ?>>Male</option>
	</select>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>

<br>

<form align=center action="includes/admin_edit_email.inc.php" method="POST">
	Email: <input type="text" name="email" value=<?php echo $edit_user['email']; ?>>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>

<br>

<form align=center action="includes/admin_edit_phone_num.inc.php" method="POST">
	Phone number: <input type="text" name="phone_number" value=<?php echo $edit_user['phone_number']; ?>>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>

<br>

<form align=center action="includes/admin_edit_position.inc.php" method="POST">
	Position: <select name="position" >
		<option value="Employee"<?php if($edit_user['position']=="Employee"){ echo "selected";} ?>>Employee</option>
		<option value="Instructor"<?php if($edit_user['position']=="Instructor"){ echo "selected";} ?>>Instructor</option>
		<option value="Admin"<?php if($edit_user['position']=="Admin"){ echo "selected";} ?>>Admin</option>
	</select>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>

<?php 
		if(isset($_GET['update'])){
			if($_GET['update'] == "empty"){
				echo "<p class='red' align=center>Error: Input cannot be empty</p>";
			}

			else if($_GET['update'] == "repeat"){
				echo "<p class='red' align=center>Error: Already registered email, name, or phone number</p>";
			}

			else if($_GET['update'] == "invalid"){
				echo "<p class='red' align=center>Error: Invalid input!</p>";
			}

			else if($_GET['update'] == "email"){
				echo "<p class='red' align=center>Error: Incorrect format of email!</p>";
			}

			else if($_GET['update'] == "success"){
				echo "<p class='green' align=center>Editing user successfully!</p>";
			}

		}

		

	 ?>

<br>
<br>