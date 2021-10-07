<?php 
	include_once 'database_connection.inc.php';
	include_once '_functions.inc.php';

	$chapter_id = $_GET['chapter_id'];


	if(isset($_GET['chapter_name'])){
		
		if(empty($_GET['chapter_name'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}
		else{
			$edit_chapter_name = $_GET['chapter_name'];

			#check repeated chapters
			$sql = "SELECT * FROM chapters WHERE name = '$edit_chapter_name'";
			if(getObjectsSize($connection,$sql) > 0){
				header("Location: ../instructor_manage_courses.php?edit=repeat");
				exit();
			}

			#now update chapter name
			else{

				#step1: update all sub quizzes' _chapter_name
				$sql = "SELECT * FROM chapters WHERE id='$chapter_id'";
				$chapter = mysqli_fetch_assoc(getObjects($connection,$sql));
				$mother_name = $chapter['name'];

				$sql = "UPDATE quizzes SET _chapter_name = '$edit_chapter_name' WHERE _chapter_name = '$mother_name' ";
				mysqli_query($connection,$sql);

				#step2: update chapter name
				$sql = "UPDATE chapters SET name = '$edit_chapter_name' WHERE id = '$chapter_id'";
				mysqli_query($connection,$sql);

				#move back
				header("Location: ../instructor_manage_courses.php?edit=success");

			}
		}
	}

	else if(isset($_GET['wikipage'])){

		if(empty($_GET['wikipage'])){
			header("Location: ../instructor_manage_courses.php?edit=empty");
			exit();
		}
		else{
			$edit_wikipage = $_GET['wikipage'];

			#we dont check repeated wikipage coz there could be some same wikipage links
			// #check repeated chapters
			// $sql = "SELECT * FROM chapters WHERE name = '$edit_chapter_name'";
			// if(getObjectsSize($connection,$sql) > 0){
			// 	header("Location: ../instructor_manage_courses.php?edit=repeat");
			// 	exit();
			// }

			#now update chapter name
			
			#step1: update all sub quizzes' _chapter_name
			// $sql = "SELECT * FROM chapters WHERE id='$chapter_id'";
			// $chapter = mysqli_fetch_assoc(getObjects($connection,$sql));
			// $mother_name = $chapter['name'];

			// $sql = "UPDATE quizzes SET _chapter_name = '$edit_chapter_name' WHERE _chapter_name = '$mother_name' ";
			// mysqli_query($connection,$sql);

			#step2: update chapter name
			$sql = "UPDATE chapters SET wikipage = '$edit_wikipage' WHERE id = '$chapter_id'";
			mysqli_query($connection,$sql);

			#move back
			header("Location: ../instructor_manage_courses.php?edit=success");
				
			
		}
	}
 ?>