<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';
	
	$chapter_name = $_GET['name'];

	$sql = "DELETE FROM quizzes WHERE _chapter_name = '$chapter_name'";
	mysqli_query($connection,$sql);

	$sql = "DELETE FROM chapters WHERE name = '$chapter_name'";
	mysqli_query($connection,$sql);

	header("Location: ../instructor_manage_courses.php?delete=success");

 ?>