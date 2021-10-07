<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php?login=unauthorised");
    exit();
}

include_once '_functions.inc.php';
include_once 'database_connection.inc.php';

$ids = $_GET['id'];
$ids = explode(',', $ids);
foreach ($ids as $uid) {
    $user_process_html = showUserProcess($connection, $uid);
    echo $user_process_html;
}
