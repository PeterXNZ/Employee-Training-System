<?php 
	#get objects from database
	function getObjects($connection,$sql){
		$result = mysqli_query($connection,$sql);
		return $result;
	}

	#get objects size
	function getObjectsSize($connection, $sql){
		$result = mysqli_num_rows( mysqli_query($connection,$sql) );
		return $result;
	}

    function getCourseName($connection, $course_id) {
	    /** get course name by id */
	    $sql = "select name from courses where id = $course_id";
	    $object = getObjects($connection, $sql);
	    $course = mysqli_fetch_assoc($object);
	    return count($course) ? $course['name'] : '';
    }


    function getCourseProgress($connection, $uid, $course_name) {
	    /** like isCompleteCourse function */
        $sql = "SELECT * FROM chapters WHERE _course_name = '$course_name'";
        $total_chapters = getObjectsSize($connection,$sql);

        $sql = "SELECT * FROM log WHERE user_id = '$uid' AND course_name = '$course_name'";
        $finished_objects = getObjects($connection,$sql);
        $length= getObjectsSize($connection,$sql);

        $finished_chapters=0;
        for($j=0;$j<$length;$j++){
            $current = mysqli_fetch_assoc($finished_objects);
            if($current['corrects']/$current['total'] >= 0.5){
                $finished_chapters++;
            }
        }

        return [$total_chapters, $finished_chapters];
    }


    function isCompleteCourse($connection, $uid, $course_name) {
	    /** copy from employee_courses.php */
        #check the completion of this course
        $sql = "SELECT * FROM chapters WHERE _course_name = '$course_name'";
        $total_chapters = getObjectsSize($connection,$sql);

        $sql = "SELECT * FROM log WHERE user_id = '$uid' AND course_name = '$course_name'";
        $finished_objects = getObjects($connection,$sql);
        $length= getObjectsSize($connection,$sql);

        $finished_chapters=0;
        for($j=0;$j<$length;$j++){
            $current = mysqli_fetch_assoc($finished_objects);
            if($current['corrects']/$current['total'] >= 0.5){
                $finished_chapters++;
            }
        }
        return ($finished_chapters != $total_chapters) ? false : true;
    }
 ?>