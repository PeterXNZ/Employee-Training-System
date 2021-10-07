<?php 
	include_once 'database_connection.inc.php';
	$groupid = $_GET['id'];
	$sql1 = "SELECT group_id FROM users WHERE id='$groupid'";
	$t=mysqli_query($connection,$sql1);
	$x=mysqli_fetch_array($t);
	$sql = "UPDATE users SET required_courses=NULL WHERE group_id='$x[0]'";
	mysqli_query($connection,$sql);
	header("Location: ../instructor_assign_courses.php?remove=$x[0]");


 ?>