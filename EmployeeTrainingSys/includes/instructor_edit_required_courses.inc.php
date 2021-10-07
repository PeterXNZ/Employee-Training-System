<?php 
	session_start();
	if($_SESSION['user_position']!="Instructor"){
		header("Location: index.php?login=unauthorised");
		exit();
	}
	include_once 'database_connection.inc.php';
	$edit_id = $_POST['user_id'];

	$courses=$_POST["users_courses"];
	if (!isset($_POST['users_courses'])) {
	    $courses_str = null;
    } else {
        $courses_str=implode(",",$courses);
    }

	if(empty($edit_id)){
		header("Location: ../instructor_edit_users.php?update=empty");
		exit();
	}

	else{
	    if (is_null($courses_str)) {
            $sql = "UPDATE users SET required_courses = null WHERE id = '$edit_id';";
        } else {
            $sql = "UPDATE users SET required_courses = '$courses_str' WHERE id = '$edit_id';";
        }
        mysqli_query($connection, $sql);
        $affected_rows = mysqli_affected_rows($connection);

		header("Location: ../instructor_edit_users.php?update=success");
		exit();
		
	}
 ?>