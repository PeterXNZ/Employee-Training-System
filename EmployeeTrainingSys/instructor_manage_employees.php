<?php
	include_once '_header.php'; 
	if($_SESSION['user_position']!="Instructor"){
		header("Location: index.php?login=unauthorised");
		exit();
	}
	include_once 'includes/database_connection.inc.php';
 ?>
 <a href="homepage.php">Back</a>
 <br>
<body>
	<!-- below are for showing employees information in the form of a table -->
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Password</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Email</th>
			<th>Phone number</th>
			<th>Postion</th>
			<th>Courses</th>
		</tr>

		<?php
			$current_uid = $_SESSION['user_id'];
			$sql = "SELECT * FROM users WHERE id!=$current_uid";
			$selected_users = mysqli_query($connection, $sql);
			$size_selected = mysqli_num_rows($selected_users);

			for($i=0;$i<$size_selected;$i++){
				$next_user =  mysqli_fetch_assoc($selected_users);
				echo "<tr><th>".$next_user['id']."</th><th>".$next_user['name']."</th><th>".$next_user['password']."</th><th>".$next_user['age']."</th><th>".$next_user['sex']."</th><th>".$next_user['email']."</th><th>".$next_user['phone_number']."</th><th>".$next_user['position']."</th><th>".$next_user['required_courses']."</th><th><form action='instructor_edit_users.php' method = 'POST'><button name='edit_id' value=".$next_user['id'].">Edit</button></form></th> </tr>";
				
			}

	 	?>
	</table>

	

</body>


 