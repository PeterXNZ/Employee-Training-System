<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: index.php?login=unauthorised");
        exit();
    }

    $course_id = $_GET['course_id'];
    $user_id = $_SESSION['user_id'];
    $chapter_id = $_GET['chapter_id'];
    $redirect_url = $_GET['redirect_url'];

    if (!isset($course_id) || !isset($chapter_id) || !isset($redirect_url)) {
        echo 'parameter error';
        exit();
    }

    include_once 'includes/database_connection.inc.php';

    $sql = "INSERT IGNORE INTO employee_course_log (course_id, chapter_id, user_id) VALUES ($course_id, $chapter_id, $user_id)";
    mysqli_query($connection,$sql);

    header("Location: $redirect_url");

