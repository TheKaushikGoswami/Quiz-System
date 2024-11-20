<?php
ini_set("display_errors",1);
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'qms';
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
    header('Location: ../login.php');
    exit; // Ensure no further code is executed after redirection
}

?>