<?php 
	session_start();
	if($_GET['question1'] == $_SESSION['question1'] || $_GET['question2'] == $_SESSION['question2']){
		$_SESSION['status'] = "--[PASSED]--";
		header("Location: ../courses/course_1.php");
		exit();
	}
	else{
		$_SESSION['status'] = "--[FAILED]--";
		header("Location: ../courses/course_1.php");
		exit();
	}
 ?>