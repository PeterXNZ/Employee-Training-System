<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';

	if(empty($_GET['course_name'])){
		header("Location: ../instructor_add_course.php?add=empty");
		exit();
	}

	
	$new_course = $_GET['course_name'];

	$sql = "SELECT * FROM courses WHERE name = '$new_course'";



	if(getObjectsSize($connection, $sql) > 0){
		header("Location: ../instructor_add_course.php?add=repeat");
		exit();
	}

	else{
		$sql = "INSERT INTO courses(name) VALUES ('$new_course') ";
		mysqli_query($connection,$sql);
		header("Location: ../instructor_manage_courses.php?add=success");
	}
 ?>