<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';

	if(empty($_GET['course_name'])){
		header("Location: ../instructor_manage_courses.php?edit=empty");
		exit();
	}
	else{
		$edit_course_name = $_GET['course_name'];
		$edit_course_id = $_GET['course_id'];
		#check repeated courses
		$sql = "SELECT * FROM courses WHERE name = '$edit_course_name'";

		if(getObjectsSize($connection, $sql) > 0){
			header("Location: ../instructor_manage_courses.php?edit=repeat");
			exit();
		}

		#update course name
		else{
			#update all chapters' _course_name
			$sql = "SELECT * FROM courses WHERE id = '$edit_course_id' ";
			$course = mysqli_fetch_assoc(getObjects($connection,$sql));
			$mother_name = $course['name'];
			$sql = "UPDATE chapters SET _course_name='$edit_course_name' WHERE _course_name='$mother_name'";
			mysqli_query($connection,$sql);

			#update course name
			$sql = "UPDATE courses SET name = '$edit_course_name' WHERE id = '$edit_course_id'";
			mysqli_query($connection,$sql);

			#turn back
			header("Location: ../instructor_manage_courses.php?edit=success");

			// $sql = "SELECT * FROM chapters WHERE _course_name='$mother_name' ";
			// $children_chapters = getObjects($connection,$sql);
			// $size = getObjectsSize($connection,$sql);                  
			// for($i=0;$i<$size;$i++){
			// 	$current_chapter = mysqli_fetch_assoc($children_chapters);
			// 	$current_chapter['_course_name'] = $edit_course_name;
			// }   
		}
	}
 ?>