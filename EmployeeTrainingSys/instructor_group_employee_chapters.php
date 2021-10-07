<?php
	include_once '_header.php'; 
	include_once 'includes/_functions.inc.php';
	//reject unauthorised access
	if($_SESSION['user_position']!="Instructor"){
		header("Location: index.php?login=unauthorised");
		exit();
	}

	//connect database
	include_once 'includes/database_connection.inc.php';

 ?>
 <a href="javascript:history.go(-1);">Back</a>

 <br>
 <br>

 <?php 
 	#print all chapters belonging to this course
 	$_course_name = $_GET['course_name'];
 	$uid = $_GET['user_id'];
 	
 	$sql = "SELECT * FROM chapters WHERE _course_name = '$_course_name'";
 	$chapters = getObjects($connection,$sql);
 	$size = getObjectsSize($connection,$sql);

 	for($i=0;$i<$size;$i++){
 		$current_chapter = mysqli_fetch_assoc($chapters);
 		$chapter_name = $current_chapter['name'];
 		echo "Chapter ".($i+1).": ";
 		echo "<a href='".$current_chapter['wikipage']."'>".$current_chapter['name']."</a>";

 		$sql = "SELECT * FROM log WHERE chapter_name='$chapter_name' AND user_id='$uid'";
 		
 		if(getObjectsSize($connection,$sql)>0){
 			$result = mysqli_fetch_assoc(getObjects($connection,$sql));
 			if(($result['corrects']/$result['total']) >= 0.5){
 				echo " [PASSED]";
 			}
 			else{
 				echo " [FAILED]";
 			}
 			echo "Correctness: ".(round($result['corrects']/$result['total'],2)*100)."%<br>";
 		}
 		else{
 			echo " [NOT COMPLETED]<br>";
 		}
		
		echo "<br>";
 	}


  ?>