<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';


	session_start();
	$new_mother_name = $_SESSION['mother_name'];
	$new_title = $_GET['title'];
	$new_option1 = $_GET['option1'];
	$new_option2 = $_GET['option2'];
	$new_option3 = $_GET['option3'];
	$new_option4 = $_GET['option4'];
	$new_correct = $_GET['correct'];

	if(empty($new_mother_name) || empty($new_title) || empty($new_option1) || empty($new_option2)|| empty($new_correct)){
		header("Location: ../instructor_add_quiz.php?add=empty");
		exit();
	}

	else{
		$sql = " INSERT INTO quizzes(_chapter_name,  title, option_1, option_2, option_3, option_4, correct) VALUES ('$new_mother_name', '$new_title', '$new_option1', '$new_option2', '$new_option3', '$new_option4', '$new_correct') ";
		mysqli_query($connection,$sql);
		header("Location: ../instructor_manage_courses.php?add=success");
		
	}
 ?>