<?php
	include_once '_header.php'; 

	//reject unauthorised access
	if($_SESSION['user_position']!="Instructor"){
		header("Location: index.php?login=unauthorised");
		exit();
	}

	//connect database
	include_once 'includes/database_connection.inc.php';
 ?>
 <a href="instructor_manage_courses.php">Back</a>

 <div>
 	<h3 align="left">Create a new course here</h3>

 	<form align="left" action="includes/instructor_add_course.inc.php" method="GET">
 		Course name: <input type="text" name="course_name">
 		<button>Add</button>
 		<p  class='blue' >(You will need to add chapter later)</p>
 	</form>

 </div>