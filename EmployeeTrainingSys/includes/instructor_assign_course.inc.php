<?php 
	include_once 'database_connection.inc.php';
	if(!isset($_GET['employees'])|| !isset($_GET['courses'])) {
		//header("Location: ../instructor_assign_courses.php?assign=empty");
		//exit();
	}
	
	$employee = $_GET['employees'];
	$string_employee = implode(", ",$employee);
	$array_employee = explode(", ", $string_employee);
	$result = mysqli_query("SELECT * FROM users WHERE group_id=$employee", $connection);
	$num_rows = mysqli_num_rows($result);
	$course = $_GET['courses'];
	$string_course = implode(", ", $course);
	$array_course = explode(", ", $string_course);
	
// echo $string_employee;
// echo "<br>";
echo $num_rows;


	$employee_size = count($array_employee);

		
		//$sql = "UPDATE users SET required_courses = '$string_course' WHERE group_id = '$employee'";
		//mysqli_query($connection,$sql);
	//mysqli_query($connection,"UPDATE users SET required_courses = '$string_course' WHERE group_id = '$employee'");
	for($i=0;$i<$employee_size;$i++){
		$id = $array_employee[$i];
		$sql = "UPDATE users SET required_courses = '$string_course' WHERE group_id = '$employee[0]'";
		mysqli_query($connection,$sql);
		$j++;
		
	}

	header("Location: ../instructor_assign_courses.php?assign=$employee_size");
 ?>