<?php 
	include_once 'database_connection.inc.php';
	$id = $_GET['id'];
	$sql = "UPDATE users SET group_id=NULL WHERE id='$id'";
	mysqli_query($connection,$sql);
	header("Location: ../instructor_assign_group.php?remove=success");


 ?>