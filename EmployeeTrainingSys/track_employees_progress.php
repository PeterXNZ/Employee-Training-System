<?php
include_once '_header.php';
include_once 'includes/_functions.inc.php';
//reject unauthorised access
if ($_SESSION['user_position'] != "Instructor") {
    header("Location: index.php?login=unauthorised");
    exit();
}

//connect database
include_once 'includes/database_connection.inc.php';
?>
    <a href="homepage.php">Back</a>

<?php
    // copy from instructor_assign_group.php
    $groups = array();

    $sql = "SELECT * FROM users WHERE position = 'Employee' ";
    $users = getObjects($connection, $sql);
    $users_size = getObjectsSize($connection, $sql);


    #scan through all employees
    for ($i = 0; $i < $users_size; $i++) {
        $current_user = mysqli_fetch_assoc($users);

        #check if he or she is a grouped-alredy-assigned employee
        if (!empty($current_user['group_id'])) {

            $group_id = $current_user['group_id'];

            #if they are not printed before, find all their group members and print them out
            if (!array_key_exists($group_id, $groups)) {

                #find all their group members
                $sql = "SELECT * FROM users WHERE group_id='$group_id'";

                $shared_users = getObjects($connection, $sql);
                $shared_size = getObjectsSize($connection, $sql);
                $shared_groups = array();

                for ($j = 0; $j < $shared_size; $j++) {
                    $current_shared_user = mysqli_fetch_assoc($shared_users);
                    array_push($shared_groups, $current_shared_user);
                }
                $groups[$group_id] = [];
                $groups[$group_id]['employees'] = $shared_groups;
            }


        }
    }

    $courses = array();
    # scan each group
    foreach ($groups as $group_id => $group) {
        $employees = $group['employees'];
        $current_group_courses = [];
        # scan each employee for group
        foreach ($employees as $employee) {
            $uid = $employee['id'];
            $current_courses = explode(',', $employee['required_courses']);
            # scan each course for employee
            foreach ($current_courses as $course_id) {
                $course_name = getCourseName($connection, $course_id);
                if (!array_key_exists($course_name, $current_group_courses)){
                    $current_group_courses[$course_name] = [
                        "user_num" => 0,
                        "complete_num" => 0,
                        "user_ids" => [],
                        "course_id" => $course_id
                    ];
                }
                $is_complete = isCompleteCourse($connection, $uid, $course_name);
                $current_group_courses[$course_name]['user_num'] += 1;
                array_push($current_group_courses[$course_name]['user_ids'], $uid);
                $current_group_courses[$course_name]['complete_num'] += $is_complete ? 1 : 0;
            }
        }
        $groups[$group_id]['courses'] = $current_group_courses;
    }

    # show time
    foreach ($groups as $group_id => $group) {
        # Count all user_id
        $uids = [];
        foreach ($group['employees'] as $employee) {
            array_push($uids, $employee['id']);
        }
        $uids = implode(',', $uids);

        $html = <<<HTML
        <div style="margin: 0.83em"><span style="font-size: 1.5em">group $group_id</span>
        <a href='instructor_track_group_employees_progress.php?course_id=-1&user_ids={$uids}'>members detail</a>
        </div>
HTML;
        echo $html;

        # print all courses
        $courses = $group['courses'];
        $i = 1;
        $complete_num = 0;
        foreach ($courses as $name => $detail) {
            $user_ids = implode(',', $detail['user_ids']);
            $course_id = $detail['course_id'];

            $is_complete = $detail['user_num'] == $detail['complete_num'] ;
            $complete = $is_complete ? 'COMPLETENESS' : 'NOT COMPLETED';
            $complete_num += $is_complete ? 1 : 0;

            $complete_progress = round($detail['complete_num']/$detail['user_num']*100)."％";
            echo "<div style='margin: 1em'>course $i: <a href='instructor_track_group_employees_progress.php?course_id={$course_id}&user_ids={$user_ids}'>{$name}</a> $complete $complete_progress</div>";
            $i++;
        }
        $courses_num = $i-1;
        echo "<div>COMPLETEION: $complete_num/{$courses_num}</div>";
    }

