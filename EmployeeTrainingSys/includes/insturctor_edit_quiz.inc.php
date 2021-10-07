<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';

	$quiz_id = $_GET['quiz_id'];


	if(isset($_GET['quiz_title'])){

		if(empty($_GET['quiz_title'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}

		else{
			$edit_title = $_GET['quiz_title'];

			$sql = "UPDATE quizzes SET title = '$edit_title' WHERE id = '$quiz_id'";
			mysqli_query($connection,$sql);

			
			header("Location: ../instructor_manage_courses.php?edit=success");
		}
	}

	else if(isset($_GET['option1'])){

		if(empty($_GET['option1'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}

		else{
			$edit_option1 = $_GET['option1'];

			$sql = "UPDATE quizzes SET option_1 = '$edit_option1' WHERE id = '$quiz_id'";
			mysqli_query($connection,$sql);

			
			header("Location: ../instructor_manage_courses.php?edit=success");
		}
	}

	else if(isset($_GET['option2'])){

		if(empty($_GET['option2'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}

		else{
			$edit_option2 = $_GET['option2'];

			$sql = "UPDATE quizzes SET option_2 = '$edit_option2' WHERE id = '$quiz_id'";
			mysqli_query($connection,$sql);

			
			header("Location: ../instructor_manage_courses.php?edit=success");
		}
	}

	else if(isset($_GET['option3'])){

		if(empty($_GET['option3'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}

		else{
			$edit_option3 = $_GET['option3'];

			$sql = "UPDATE quizzes SET option_3 = '$edit_option3' WHERE id = '$quiz_id'";
			mysqli_query($connection,$sql);

			
			header("Location: ../instructor_manage_courses.php?edit=success");
		}
	}

	else if(isset($_GET['option4'])){

		if(empty($_GET['option4'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}

		else{
			$edit_option4 = $_GET['option4'];

			$sql = "UPDATE quizzes SET option_4 = '$edit_option4' WHERE id = '$quiz_id'";
			mysqli_query($connection,$sql);

			
			header("Location: ../instructor_manage_courses.php?edit=success");
		}
	}

	else if(isset($_GET['correct'])){

		if(empty($_GET['correct'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}

		else{
			$edit_correct = $_GET['correct'];

			$sql = "UPDATE quizzes SET correct = '$edit_correct' WHERE id = '$quiz_id'";
			mysqli_query($connection,$sql);

			
			header("Location: ../instructor_manage_courses.php?edit=success");
		}
	}
 ?>