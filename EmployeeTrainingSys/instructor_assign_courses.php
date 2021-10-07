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
 <a href="homepage.php">Back</a>
 
 <form action="includes/instructor_assign_course.inc.php" method="GET">
 	
 	<h4>Group id:</h4>
 	<?php 
 		#print all employees in checkbox form
 		$sql = "SELECT * FROM users WHERE position='Employee' ";
 		$employees = getObjects($connection,$sql);
 		$employees_size = getObjectsSize($connection,$sql);
 		$groupid = array();

 		for($i=0;$i<$employees_size;$i++){
 			$current_employee = mysqli_fetch_assoc($employees);
 			if(empty($current_employee['required_courses'])){
 				array_push($groupid, $current_employee['group_id']);

 				//echo " <input type='checkbox' name='employees[]' value=".$current_employee['id'].">".$current_employee['group_id'];
 			}
 			
 		}
 			
 			$groupid=array_unique($groupid);
 			$groupid=array_values($groupid);
 			//print_r($groupid);
 			for($i=0;$i<count($groupid);$i++){
 			//echo $groupid[$i];
 			echo " <input type='checkbox' name='employees[]' value=".$groupid[$i].">". $groupid[$i];
 			}

 			
 	 ?>

 	 <h4>Courses:</h4>
 	 <?php 
 	 	#print all courses in checkbox form
 	 	$sql = "SELECT * FROM courses";
 	 	$courses = getObjects($connection,$sql);
 	 	$courses_size = getObjectsSize($connection,$sql);

 	 	for($i=0;$i<$courses_size;$i++){
 	 		$current_course = mysqli_fetch_assoc($courses);

 	 		echo " <input type='checkbox' name='courses[]' value=".$current_course['id'].">".$current_course['name']." - [ ID: ".$current_course['id']." ]<br>";
 	 	}
 	  ?>

 	  <br>
 	 <button>Assign</button>
 	 <HR>
 </form>
<a href="includes/instructor_group_remove.inc.php"></a>

 <?php 
 	#print all groups

 	#this array used to record already printed groups by only remembering their required_courses
 	$courses = array();


 	$sql = "SELECT * FROM users WHERE position = 'Employee' ";
 	$users = getObjects($connection,$sql);
 	$users_size = getObjectsSize($connection,$sql);

 	$count = 1;
 	#scan through all employees
 	for($i=0;$i<$users_size;$i++){
 		$current_user = mysqli_fetch_assoc($users);

 		#check if he or she is a course-alredy-assigned employee
 		if(!empty($current_user['required_courses'])){

 			$shared_courses = $current_user['required_courses'];
 			
 			#if they are not printed before, find all their group members and print them out
 			if(!in_array($shared_courses,$courses)){

 				#find all their group members
 				$sql = "SELECT * FROM users WHERE required_courses='$shared_courses'";
 				$shared_users = getObjects($connection,$sql);
 				$shared_size = getObjectsSize($connection,$sql);

 				echo "<table><tr><th>Name</th><th>Courses IDs</th></tr>";
 				for($j=0;$j<$shared_size;$j++){
 					$current_shared_user = mysqli_fetch_assoc($shared_users);
 					echo "<tr><th>".$current_shared_user['name']."</th><th>".$current_shared_user['required_courses']."</th><th><a href='includes/instructor_group_remove.inc.php?id=".$current_shared_user['id']."'>Remove</a></th></tr>";

 				}
 				echo "</table>";
 				array_push($courses, $shared_courses);
 			}
 			

 		}
 	}


  ?>