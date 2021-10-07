<?php include_once '_header.php'; ?>
<?php
// parameter check
$course_id = $_GET['course_id'];
if (!isset($course_id)) {
    echo 'parameter error';
    exit();
}
// permission check
include_once 'includes/database_connection.inc.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$user_info = mysqli_fetch_assoc(mysqli_query($connection, $sql));
$require_options_str = $user_info["required_courses"];
$require_options = explode(',', $require_options_str);
if (!in_array($course_id, $require_options) && $_SESSION['user_position'] == "Employee") {
    echo "don't allow access";
    exit();
}

// load chapter
$sql = "select t.* from chapters as t join courses as c on t._course_name = c.name where c.id = $course_id";
$cursor = mysqli_query($connection, $sql);
$chapters = mysqli_fetch_all($cursor, MYSQLI_ASSOC);
if (count($chapters) == 0) {
    echo 'This course does has chapter';
    exit();
}
$course_name = $chapters[0]['_course_name'];

$html = <<<HTML
<a href="homepage.php">Back</a>

<h2> {$course_name}: </h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>chapter</th>
    </tr>
HTML;
echo $html;
foreach ($chapters as $chapter) {
    $chapter_html = <<<HTML
     <tr>
     <th>{$chapter['id']}</th>
     <th><a href="employee_chapter_click.php?redirect_url={$chapter['wikipage']}&course_id={$course_id}&chapter_id={$chapter['id']}">{$chapter['name']}</a></th>
</tr>
HTML;
    echo $chapter_html;
}
