<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';
	
	$course_name = $_GET['name'];
	#find chapters and quizzes
	$sql = " SELECT * FROM chapters where _course_name = '$course_name' ";
	$chapters = getObjects($connection,$sql);
	$chapters_size = getObjectsSize($connection,$sql);

	#delete quizzes 
	for($i=0;$i<$chapters_size;$i++){
		$current_chapter = mysqli_fetch_assoc($chapters);
		$chapter_name = $current_chapter['name'];

		$sql = "DELETE FROM quizzes WHERE _chapter_name = '$chapter_name'";
		mysqli_query($connection,$sql);
	}

 	#delete chapters
 	$sql = " DELETE FROM chapters WHERE _course_name='$course_name' ";
 	mysqli_query($connection,$sql);

 	#delete course
 	$sql = "DELETE FROM courses WHERE name = '$course_name' ";
 	mysqli_query($connection,$sql);

 	header("Location: ../instructor_manage_courses.php?delete=success");
 ?>