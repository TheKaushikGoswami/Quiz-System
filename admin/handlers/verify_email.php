<?php

include '../config/config.php';

$token = $_GET['token'];

$sql = "SELECT * FROM `users` WHERE `token` = '$token'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sql = "UPDATE `users` SET `status` = '1' WHERE `token` = '$token'";
    $conn->query($sql);
    echo "<script>alert('Email verified successfully');window.location.href='../../login.php'</script>";
} else {
    echo "<script>alert('Invalid token');window.location.href='../../login.php'</script>";
}

?>