<?php
$host = 'localhost';
$user = 'codeufcw_qms_user';
$pass = 'w1o.*Acy;=}N';
$db = 'codeufcw_qms_db';
$tz = 'Asia/Kolkata';

date_default_timezone_set($tz);
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION)){
    session_start();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /quiz-system/login.php');
    exit; // Ensure no further code is executed after redirection
}

?>