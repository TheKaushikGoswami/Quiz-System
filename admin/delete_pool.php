<?php

include 'config/config.php';

if (!isset($_SESSION['admin'])) {
    header('location: ../login.php');
}

$pool_name = $_SERVER['QUERY_STRING'];
$pool_name = substr($pool_name, 5);

$sql = "DELETE FROM `question_pools` WHERE `name` = '$pool_name'";

$result = $conn->query($sql);

if ($result === TRUE) {
    $sql2 = "DROP TABLE `$pool_name`";
    $result2 = $conn->query($sql2);
    echo "<script>alert('Pool deleted successfully!'); window.location.href='pools.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>