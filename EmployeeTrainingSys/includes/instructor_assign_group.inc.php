<?php 
	include_once 'database_connection.inc.php';
	include_once 'instructor_assign_group';
if(!isset($_GET['employees'])) {
		header("Location: ../instructor_assign_group.php?assign=empty");
		exit();
	}
	$accessCount = 0; 
$file = 'accessCount.txt'; 
if(file_exists($file)){ 
	$accessCount = file_get_contents($file); 
}
$accessCount++; 
file_put_contents($file, $accessCount); 
	
	$employee = $_GET['employees'];
	$string_employee = implode(", ",$employee);
	$array_employee = explode(", ", $string_employee);
	
	$course = $_GET['courses'];
	$string_course = implode(", ", $course);
	$array_course = explode(", ", $string_course);
	
// echo $string_employee;
// echo "<br>";
// echo $string_course;

   $j=0;
	$employee_size = count($array_employee);
	for($i=0;$i<$employee_size;$i++){
		$id = $array_employee[$i];
		$sql = "UPDATE users SET group_id = $accessCount WHERE id = '$id'";
		mysqli_query($connection,$sql);
		$j++;
		
	}

	header("Location: ../instructor_assign_group.php?assign=success");
 ?>