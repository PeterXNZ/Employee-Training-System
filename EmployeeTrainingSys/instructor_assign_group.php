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
 
 <form action="includes/instructor_assign_group.inc.php" method="GET">
 	
 	<h4>Employee:</h4>
 	<?php 
 		#print all employees in checkbox form
 		$sql = "SELECT * FROM users WHERE position='Employee' ";
 		$employees = getObjects($connection,$sql);
 		$employees_size = getObjectsSize($connection,$sql);

 		for($i=0;$i<$employees_size;$i++){
 			$current_employee = mysqli_fetch_assoc($employees);
 			if(empty($current_employee['group_id'])){
 				echo " <input type='checkbox' name='employees[]' value=".$current_employee['id'].">".$current_employee['name'];
 			}
 			
 		}
 	 ?>
 	 
 	<!--  <h4>Courses:</h4>
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

 	  <br> -->
 	 <button>Assign</button>
 	 <HR>
 </form>
<a href="includes/instructor_group_remove.inc.php"></a>
<body>
Attention: You must remove assigned courses first if you want to remove assigned groups, otherwise there will be something wrong. 
</body>

 <?php 
 	#print all groups

 	#this array used to record already printed groups by only remembering their required_courses
 	$groups = array();


 	$sql = "SELECT * FROM users WHERE position = 'Employee' ";
 	$users = getObjects($connection,$sql);
 	$users_size = getObjectsSize($connection,$sql);

 	
 	#scan through all employees
 	for($i=0;$i<$users_size;$i++){
 		$current_user = mysqli_fetch_assoc($users);

 		#check if he or she is a grouped-alredy-assigned employee
 		if(!empty($current_user['group_id'])){

 			$shared_groups = $current_user['group_id'];
 			
 			#if they are not printed before, find all their group members and print them out
 			if(!in_array($shared_groups,$groups)){

 				#find all their group members
 				$sql = "SELECT * FROM users WHERE group_id='$shared_groups'";
 				$shared_users = getObjects($connection,$sql);
 				$shared_size = getObjectsSize($connection,$sql);

 				#print them as a group
 				echo "<h5>Group <h5>";
 		



 				echo "<table><tr><th>Name</th></tr>";
 				for($j=0;$j<$shared_size;$j++){
 					$current_shared_user = mysqli_fetch_assoc($shared_users);
 					echo "<tr><th>".$current_shared_user['name']."</th><th>".$current_shared_user['group_id']."</th><th><a href='includes/instructor_groupmember_remove.inc.php?id=".$current_shared_user['id']."'>Remove</a></th></tr>";

 				}
 				echo "</table>";
 				array_push($groups, $shared_groups);
 			}
 			

 		}
 	}


  ?>