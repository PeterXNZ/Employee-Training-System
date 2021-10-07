<?php
include_once '_header.php';
include_once 'includes/_functions.inc.php';
//reject unauthorised access
if ($_SESSION['user_position'] != "Instructor") {
    header("Location: index.php?login=unauthorised");
    exit();
}

?>
<a href="javascript:history.go(-1);">Back</a>
<?php
    function getCourse($course_id) {
        global $connection;
        $sql = "select * from courses where id = $course_id";
        $object = getObjects($connection, $sql);
        $course = mysqli_fetch_assoc($object);
        return $course;
    }
    include_once 'includes/database_connection.inc.php';
    $course_id = $_GET['course_id'];
    $user_ids = explode(',', $_GET['user_ids']);

//    echo "<h1>{$course['name']}</h1>";
    $html = <<<HTML
<table>
<tr>
<td>Name</td>
<td>ID</td>
<td>Course ID</td>
<td>COMPLETION</td>
</tr>
HTML;
    echo $html;

    foreach ($user_ids as $user_id) {
        $sql = "select * from users where id = $user_id";
        $user = mysqli_fetch_assoc(mysqli_query($connection, $sql));

        $course_ids = $course_id == -1 ? explode(',', $user['required_courses']) : [$course_id];

        foreach ($course_ids as $cid) {
            $course = getCourse($cid);
            $chapter_info = getCourseProgress($connection, $user['id'], $course['name']);

            $chapter_cnt = $chapter_info[0];
            $chapter_ok = $chapter_info[1];
            $complete_progress = round($chapter_info[1]/$chapter_info[0]*100)."％";

            $html = <<<HTML
<tr>
<td>{$user['name']}</td>
<td>{$user['id']}</td>
<td>{$course['id']}</td>
<td>{$chapter_ok}/{$chapter_cnt}</td>
<td><a href="instructor_group_employee_chapters.php?course_name={$course['name']}&user_id={$user['id']}">check detail</a></td>
</tr>
HTML;
            echo $html;
        }
    }
    echo '</table>';



