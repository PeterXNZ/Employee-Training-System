<?php
	include_once '_header.php'; 

 ?>
<li>
	<a href="personalInfo.php">Personal information</a>
</li>
 <!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>homepage</title>
<link rel="stylesheet" type="text/css" href="style.css.php">

</head>
<body>

</body>

</html>
 <?php 
 	if($_SESSION['user_position'] == "Admin"){
 		echo ' <p><li><a href="admin_manage_employees.php">Manage your employees</a></li></p> ';
 	}

 	else if($_SESSION['user_position'] == "Employee"){
 		echo ' <p><li><a href="employee_courses.php">Take courses</a></li></p> ';
 	}

 	else if($_SESSION['user_position'] == "Instructor"){
 		echo ' <p><li><a href="instructor_manage_courses.php">Manage courses</a></li></p> ';

 		echo ' <p><li><a href="instructor_assign_group.php">Assign group</a></li></p> ';

 		echo ' <p><li><a href="instructor_assign_courses.php">Assign courses</a></li></p> ';

        echo ' <p><li><a href="track_employees_progress.php">track employees progress</a></li></p> ';
 	}
  ?>
