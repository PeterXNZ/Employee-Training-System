<?php
	include_once '_header.php'; 
 ?>
<a href="personalInfo.php">Back</a>

 
 	

 

<h4 align=center>Change your information here</h4>

<form align=center action="includes/edit_name.inc.php" method="POST">
	<input type="text" name="name" placeholder="Name" >
	<button type="submit" name="submit">Update</button>
</form>

<br>

<form align=center action="includes/edit_email.inc.php" method="POST">
	<input type="text" name="email" placeholder="Email">
	<button type="submit" name="submit">Update</button>
</form>

<br>

<form align=center action="includes/edit_phone_num.inc.php" method="POST">
	<input type="text" name="phone_number" placeholder="Phone number">
	<button type="submit" name="submit">Update</button>
</form>

<br><br><br>
<form align=center>
	<?php 
	if(isset($_GET['update'])){
		if($_GET['update'] == "empty"){
			echo "Error: Input cannot be empty!";
		}

		else if($_GET['update'] == "email"){
			echo "Error: Invalid email format!";
		}

		else if($_GET['update'] == "invalid"){
			echo "Error: Invalid input!";
		}

		else if($_GET['update'] == "repeat"){
			echo "Error: Repeated input!";
		}

		else if($_GET['update'] == "success"){
			echo "Editing successfully!";
		}
	}
	
 ?>

</form>

