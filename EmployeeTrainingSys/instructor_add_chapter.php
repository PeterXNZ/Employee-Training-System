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
	if(isset($_GET['_course_name'])){
		$_SESSION['mother_name'] = $_GET['_course_name'];
	}
	
	
 ?>
 <a href="instructor_manage_courses.php">Back</a>

 <div>
 	<h3 align="left">Create a new chapter here</h3>

 	<form align="left" action="includes/instructor_add_chapter.inc.php" method="GET">
 		<p>Chapter Title </p>
 		<input size="35" type="text" name="chapter_name">
 		<p>Wikipage</p>
 		<input size="50" type="text" name="wikipage">
 		<br>
 		<br>
 		<button>Add</button>

 		<p  class='blue' >(You will need to add quiz later)</p>
 	</form>

 </div>