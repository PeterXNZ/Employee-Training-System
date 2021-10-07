<?php
	include_once '_header.php'; 
	include_once 'includes/_functions.inc.php';

	//reject unauthorised access
	if($_SESSION['user_position']!="Employee"){
		header("Location: index.php?login=unauthorised");
		exit();
	}

	//connect database
	include_once 'includes/database_connection.inc.php';

 ?>
 <?php 
 	#find the course name according to its chapter name
 	$chapter_name = $_GET['chapter_name'];
 	$sql = "SELECT * FROM chapters WHERE name = '$chapter_name'";
 	$chapter = mysqli_fetch_assoc(mysqli_query($connection,$sql));
 	$course_name = $chapter['_course_name'];
 	

  ?>
 <a href="employee_chapters.php?course_name=<?php echo $course_name; ?>">Back</a>

<br>
<br>

<!-- <form action="includes/employee_quiz_check.inc.php" method="GET">
	<input type="radio" name="quiz" value="1">1<br>
<input type="radio" name="quiz" value="2">2<br>
<input type="radio" name="quiz" value="3">3<br>
<input type="radio" name="quiz" value="4">4<br>

<input type="radio" name="quiz2" value="1">1<br>
<input type="radio" name="quiz2" value="2">2<br>
<input type="radio" name="quiz2" value="3">3<br>
<input type="radio" name="quiz2" value="4">4<br>

<button>submit</button>
</form>
 -->
 <?php 
 	#print all quizzes
 	$_chapter_name = $_GET['chapter_name'];
 	$_SESSION['chapter_name'] = $_chapter_name;
 	$sql = "SELECT * FROM quizzes WHERE _chapter_name='$_chapter_name'";
	$quizzes = getObjects($connection,$sql);
	$size = getObjectsSize($connection,$sql);

	#start a form
	echo "<form action='includes/employee_quiz_check.inc.php' method='GET'>";
	for($i=0;$i<$size;$i++){
		$current_quiz = mysqli_fetch_assoc($quizzes);
		echo "<h4>";
		echo "Q".($i+1).": ";
		echo $current_quiz['title'];
		echo "</h4>";
		echo "<input type='radio' name=".$current_quiz['id']." value = '".$current_quiz['option_1']."'>".$current_quiz['option_1']."<br>";
		echo "<input type='radio' name=".$current_quiz['id']." value = '".$current_quiz['option_2']."'>".$current_quiz['option_2']."<br>";
		if(!empty($current_quiz['option_3'])){
			echo "<input type='radio' name=".$current_quiz['id']." value = '".$current_quiz['option_3']."'>".$current_quiz['option_3']."<br>";
		}

		if(!empty($current_quiz['option_4'])){
			echo "<input type='radio' name=".$current_quiz['id']." value = '".$current_quiz['option_4']."'>".$current_quiz['option_4']."<br>";
		}

	}	


	#end of form
	echo "<br><button>submit</button>";
	echo "</form>";
  ?>