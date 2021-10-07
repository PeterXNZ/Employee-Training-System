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
 <a href="homepage.php">Back</a>

<br>
<br>

<?php 

	#print all courses the employee will have to take
	$uid = $_SESSION['user_id'];
	$sql = "SELECT * FROM users WHERE id = '$uid'";
	$employee = mysqli_fetch_assoc(mysqli_query($connection,$sql));

	if(empty($employee['required_courses'])){
		echo "You have't been assigned any courses yet.";
	}

	else{
		$array_course = explode(", ", $employee['required_courses']);

		$array_size = count($array_course);
		$count = 0;
		#print courses
		for($i=0;$i<$array_size;$i++){
			$course_id = $array_course[$i];
			$sql = "SELECT * FROM courses WHERE id = '$course_id'";
			$course = mysqli_fetch_assoc(mysqli_query($connection,$sql));
			$course_name = $course['name'];

			echo "Course ".($i+1).": ";
			echo "<a href='employee_chapters.php?course_name=".$course['name']."'>".$course['name']."</a>";
			#check the completion of this course
			$sql = "SELECT * FROM chapters WHERE _course_name = '$course_name'";
			$total_chapters = getObjectsSize($connection,$sql);
			// echo "<br>".$total_chapters."<br>";
			// echo $uid."<br>";
			$sql = "SELECT * FROM log WHERE user_id = '$uid' AND course_name = '$course_name'";
			$finished_objects = getObjects($connection,$sql);
			$length= getObjectsSize($connection,$sql);
			$finished_chapters=0;
			for($j=0;$j<$length;$j++){
				$current = mysqli_fetch_assoc($finished_objects);
				if($current['corrects']/$current['total'] >= 0.5){
					$finished_chapters++;
				}
			}
			// echo $finished_chapters."<br>";
			
			if($finished_chapters != $total_chapters){
				echo "  [NOT COMPLETED]";
			}
			else{
				echo "  [COMPLETED]";
				$count++;
			}
			echo " Completeness: ".(round($finished_chapters/$total_chapters,2)*100)."%";
			echo "<br>";
		}
		echo "<br><br><br>";
		echo "COMPLETION: ".$count."/".$array_size;
	}
	
 ?>