<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';

	

	if(empty($_GET['chapter_name']) || empty($_GET['wikipage'])){
		header("Location: ../instructor_add_chapter.php?add=empty");
		exit();
	}
	
	session_start();
	$new_mother_name = $_SESSION['mother_name'];
	$new_chapter_name = $_GET['chapter_name'];
	$new_chapter_wikipage = $_GET['wikipage'];

	#check if there are repeated chapter names alredy in database
	$sql = "SELECT * FROM chapters WHERE name = '$new_chapter_name'";
	if(getObjectsSize($connection, $sql) > 0){
		header("Location: ../instructor_add_chapter.php?add=repeat");
		exit();
	}

	else{
		$sql = "INSERT INTO chapters(_course_name, name, wikipage) VALUES('$new_mother_name', '$new_chapter_name', '$new_chapter_wikipage')";
		mysqli_query($connection,$sql);
		header("Location: ../instructor_manage_courses.php?add=success");
	}
 ?>