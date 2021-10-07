<?php
	include_once '_header.php'; 

	//reject unauthorised access
	if($_SESSION['user_position']!="Instructor"){
		header("Location: index.php?login=unauthorised");
		exit();
	}

	//connect database
	include_once 'includes/database_connection.inc.php';
 ?>
 <a href="homepage.php">Back</a>
 

 
 	
 	<?php 
 		
 		$sql = "SELECT * FROM courses";
 		$selected_courses =  mysqli_query($connection, $sql);
 		$size_courses=mysqli_num_rows($selected_courses);
 		
 		for($i=0;$i<$size_courses;$i++){
 			$current_course = mysqli_fetch_assoc($selected_courses);
 			$course_name = $current_course['name'];
 			$course_id = $current_course['id'];

 			#start print all courses
 			echo "<h3>Course ".($i+1)." <a href='includes/instructor_delete_course.inc.php?name=".$course_name."'>DELETE</a> </h3>";
 			?>
 			<div>
 				
 				<form action="includes/instructor_edit_course.inc.php" method="GET">

 				Course Name: <input size ="40" type="text" name="course_name" value='<?php echo $current_course['name']; ?>'>
 				<button type="submit" name="course_id" value=<?php echo $current_course['id'] ?>>Edit</button>

 				</form>

 				<?php 

 					$sql_chapters = "SELECT * FROM chapters WHERE _course_name='$course_name' ";
 					$selected_chapters = mysqli_query($connection, $sql_chapters);
 					$size_chapters=mysqli_num_rows($selected_chapters);

 					for($j=0;$j<$size_chapters;$j++){
 						$current_chapter = mysqli_fetch_assoc($selected_chapters);
 						$chapter_name = $current_chapter['name'];
 						$chapter_id = $current_chapter['id'];
 						#start print all chapters
 						echo "<h4>Chapter ".($j+1)." <a href='includes/instructor_delete_chapter.inc.php?name=".$chapter_name."'>DELETE</a> </h4>";
 						?>
 						
 						<form action="includes/instructor_edit_chapter.inc.php" method="GET">
 							Chpater Name: <input  size ="40" type="text" name="chapter_name" value='<?php echo $current_chapter['name'] ?>'>
 							<button type="submit" name="chapter_id" value=<?php echo $current_chapter['id'] ?>>Edit</button>
 						</form>


 						<form action="includes/instructor_edit_chapter.inc.php" method="GET">
 							Chapter wikipage: <input  size ="75" type="text" name="wikipage" value= <?php echo $current_chapter['wikipage'] ?> >
 							<button type="submit" name="chapter_id" value=<?php echo $current_chapter['id'] ?>>Edit</button>
 						</form>

 						<?php 

 							$sql_quizzes = "SELECT * FROM quizzes WHERE _chapter_name='$chapter_name' ";
 							$selected_quizzes = mysqli_query($connection, $sql_quizzes);
 							$size_quizzes=mysqli_num_rows($selected_quizzes);

 							for($k=0;$k<$size_quizzes;$k++){
 								$current_quiz = mysqli_fetch_assoc($selected_quizzes);
 								$quiz_id = $current_quiz['id'];
 								echo "<h6>Quiz ".($k+1)." <a href='includes/instructor_delete_quiz.inc.php?id=".$quiz_id."'>DELETE</a></h6>";

 								#print quiz title,options and correct option
 								?>
 								
 								<form action="includes/insturctor_edit_quiz.inc.php" method="GET">
 									Title: <input size ="50" type="text" name="quiz_title" value= '<?php echo $current_quiz['title'] ?>' >
 									<button type="submit" name="quiz_id" value= <?php echo $current_quiz['id']; ?>>Edit</button>
 								</form>

 								<form action="includes/insturctor_edit_quiz.inc.php" method="GET">
 									Option 1: <input size ="38" type="text" name="option1" value= '<?php echo $current_quiz['option_1'] ?>'>
 									<button type="submit" name="quiz_id" value= <?php echo $current_quiz['id']; ?>>Edit</button>
 								</form>

 								<form action="includes/insturctor_edit_quiz.inc.php" method="GET">
 									Option 2: <input size ="38" type="text" name="option2" value= '<?php echo $current_quiz['option_2'] ?>'>
 									<button type="submit" name="quiz_id" value= <?php echo $current_quiz['id']; ?>>Edit</button>
 								</form>

 								<form action="includes/insturctor_edit_quiz.inc.php" method="GET">
 									Option 3: <input size ="38" type="text" name="option3" value= '<?php echo $current_quiz['option_3'] ?>'>
 									<button type="submit" name="quiz_id" value= <?php echo $current_quiz['id']; ?>>Edit</button>
 								</form>

 								<form action="includes/insturctor_edit_quiz.inc.php" method="GET">
 									Option 4: <input size ="38" type="text" name="option4" value= '<?php echo $current_quiz['option_4'] ?>'>
 									<button type="submit" name="quiz_id" value= <?php echo $current_quiz['id']; ?>>Edit</button>
 								</form>

 								<form action="includes/insturctor_edit_quiz.inc.php" method="GET">
 									Correct option : <input size ="38" type="text" name="correct" value= '<?php echo $current_quiz['correct'] ?>'>
 									<button type="submit" name="quiz_id" value= <?php echo $current_quiz['id']; ?>>Edit</button>
 								</form>

 								<?php
 							}

 							echo "<a href='instructor_add_quiz.php?_chapter_name=".$chapter_name."'><h6>Add a quiz</h6></a>";

 						 ?>


 						<?php
 					}

 					echo "<a href='instructor_add_chapter.php?_course_name=".$course_name."'><h4>Add a chapter<h4></a>";
 				 ?>

 				 <br>
 			</div>
 			
 			<?php
 		}

 		echo "<a href='instructor_add_course.php'><h3>Create a course</h3></a>";




 	 ?>
 