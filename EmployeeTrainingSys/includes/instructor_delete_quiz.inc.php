<?php 
	include_once 'database_connection.inc.php';
	
	$id = $_GET['id'];
	$sql =" DELETE FROM quizzes WHERE id='$id'  ";
	mysqli_query($connection,$sql);

	header("Location: ../instructor_manage_courses.php?delete=success");

 ?>