<?php
session_start();
include '../config/config.php';


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        foreach($result as $row){
            if ($row['admin'] == 1) {
                $_SESSION['admin'] = $row['id'];
                echo "<script>alert('Logged in successfully!'); window.location.href='../index.php';</script>";
            } else {
                $_SESSION['user'] = $row['id'];
                echo "<script>alert('Logged in successfully!'); window.location.href='../../index.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}