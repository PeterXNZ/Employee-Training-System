<?php 
	include_once '_header.php';

	//reject unauthorised access
	if($_SESSION['user_position']!="Instructor"){
		header("Location: index.php?login=unauthorised");
		exit();
	}
	//connect data base
	include_once 'includes/database_connection.inc.php'; 

	//set current instructor editing user id
	if(!isset($_SESSION['instructor_edit_uid'])){
		$_SESSION['instructor_edit_uid'] = $_POST['edit_id'];
	}
	else{
		if(isset($_POST['edit_id'])){
			if($_SESSION['instructor_edit_uid'] != $_POST['edit_id']){
				$_SESSION['instructor_edit_uid'] = $_POST['edit_id'];
			}
		}
	}

 ?>

 <a href="instructor_manage_employees.php">Back</a>

 <h4 align=center>Edit the courses of employees here</h4>



<form align=center action="includes/instructor_edit_required_courses.inc.php" method="post">

	required courses: 
	</br>
	</br>
    <?php
    $edit_user_id = $_SESSION['instructor_edit_uid'];
    $sql = "SELECT * FROM users WHERE id = '$edit_user_id'";
    $edit_user = mysqli_fetch_assoc(mysqli_query($connection, $sql));
    $require_options_str = $edit_user["required_courses"];
    $require_options = explode(',', $require_options_str);

    $sql = 'select * from courses;';
    $selected_courses = mysqli_query($connection, $sql);
    $size_selected = mysqli_num_rows($selected_courses);


    for($i=0; $i<$size_selected; $i++){
        $course =  mysqli_fetch_assoc($selected_courses);
        if (in_array($course['id'], $require_options)) {
            $checkbox = <<<HTML
        <input type="checkbox" name="users_courses[]" checked value="{$course["id"]}">{$course["name"]}
        </br>
HTML;
        } else {
            $checkbox = <<<HTML
        <input type="checkbox" name="users_courses[]" value="{$course["id"]}">{$course["name"]}
        </br>
HTML;
        }
	    echo $checkbox;
    }
    ?>
	<button type="submit" name="user_id" value=<?php echo $edit_user_id ?>>Update</button>
</form>




<?php 
				
		 if(isset($_GET['update'])){
			if($_GET['update'] == "empty"){
				echo "<p class='red' align=center>Error: Input cannot be empty</p>";
			}
			else if($_GET['update'] == "success"){
				
				
				

				echo "<p class='green' align=center>update courses successfully!</p>";

				
				
			}
		}

		

		

	 ?>

<br>
<br>