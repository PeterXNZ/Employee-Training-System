<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';
	session_start();

	$uid = $_SESSION['user_id'];
	$correct_answers=0; #record the number of correct answers
	$course_name = $_SESSION['course_name'];
	$chapter_name = $_SESSION['chapter_name'];
	$sql = "SELECT * FROM quizzes WHERE _chapter_name = '$chapter_name'";
	$quizzes = getObjects($connection,$sql);
	$size = getObjectsSize($connection,$sql);

	#create two arrays to record all the quizzes' id and correct answers
	$array_quiz_id = array();
	$array_correct = array();
	for($i=0;$i<$size;$i++){
		$current_quiz = mysqli_fetch_assoc($quizzes);
		array_push($array_quiz_id, $current_quiz['id']);
		array_push($array_correct, $current_quiz['correct']);

	}

	#compare the GET attributs(as submitted answers) with the correct answers
	$length = count($array_quiz_id);
	for($i=0;$i<$length;$i++){
		if(isset($_GET[$array_quiz_id[$i]])){
			echo $_GET[$array_quiz_id[$i]];
			echo " <==  :  ==> ";
			echo $array_correct[$i];
			echo "<br>";
			#if corrected, add++
			if($_GET[$array_quiz_id[$i]] == $array_correct[$i]){
				$correct_answers++;
			}
		}
		
	}

	echo "<br><br><br>HERE present final results:<br>";
	echo "user_id: ".$uid."<br>";
	echo "course_name: ".$_SESSION['course_name']."<br>";
	echo "chapter_name: ".$_SESSION['chapter_name']."<br>";
	echo "correct:".$correct_answers."<br>";
	echo "total: ".$size."<br>";
	// $num = 12;
	// echo $_GET[$num];

	#add data to log

	#first check if there is already quiz result in log table
	$sql = "SELECT * FROM log WHERE chapter_name = '$chapter_name' AND user_id='$uid'";
	
	if(getObjectsSize($connection,$sql)>0){
		$object = mysqli_fetch_assoc(getObjects($connection,$sql));
		$id_object = $object['id'];
		$sql = "UPDATE log SET corrects = '$correct_answers' WHERE id='$id_object';";
		
		mysqli_query($connection,$sql);
		header('Location: ../employee_chapters.php?course_name='.$course_name);
		exit();

	}
	else{
		$sql = "INSERT INTO log(user_id,course_name,chapter_name,corrects,total) VALUES('$uid','$course_name','$chapter_name','$correct_answers','$size');";
		mysqli_query($connection,$sql);
		header('Location: ../employee_chapters.php?course_name='.$course_name);
		exit();
	}
	

 ?>
