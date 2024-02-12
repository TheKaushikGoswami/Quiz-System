<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'quiz_system';
$tz = 'Asia/Kolkata';

date_default_timezone_set($tz);
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /quiz-system/login.php');
    exit; // Ensure no further code is executed after redirection
}

?>