<?php
	include_once '_header.php'; 

	//reject unauthorised access
	if($_SESSION['user_position']!="Instructor"){
		header("Location: index.php?login=unauthorised");
		exit();
	}

	//connect database
	include_once 'includes/database_connection.inc.php';

	#set mother name to session
	if(isset($_GET['_chapter_name'])){
		$_SESSION['mother_name'] = $_GET['_chapter_name'];
	}
	

 ?>
 <a href="instructor_manage_courses.php">Back</a>

 <div>
 	<h3 align="left">Create a new quiz here</h3>

 	<form align="left" action="includes/instructor_add_quiz.inc.php" method="GET">
 		Quiz Title:<input size="40" type="text" name="title"><br><br>
 		Option1: <input type="text" name="option1"><br><br>
 		Option2: <input type="text" name="option2"><br><br>
 		Option3: <input type="text" name="option3">(optional)<br><br>
 		Option4: <input type="text" name="option4">(optional)<br><br>
 		Correct Answer: <input type="text" name="correct"><br><br>




 		<br><br>
 		<button>Add</button>

 		
 	</form>

 </div>