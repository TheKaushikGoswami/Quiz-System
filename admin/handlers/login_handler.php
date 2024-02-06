<?php

include '../config/config.php';


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        foreach($result as $row){
            if ($row['admin'] == 1) {
                if ($row['status'] == 0) {
                    echo "<script>alert('Email not verified!');window.location.href='../../login.php'</script>";
                }
                else{
                    $_SESSION['admin'] = $row['roll_no'];
                    echo "<script>alert('Logged in successfully!'); window.location.href='../index.php';</script>";
                }
            } else {
                if ($row['status'] == 0) {
                    echo "<script>alert('Email not verified!');window.location.href='../../login.php'</script>";
                }
                else{
                    $_SESSION['user'] = $row['roll_no'];
                    echo "<script>alert('Logged in successfully!'); window.location.href='../../index.php';</script>";
                }
            }
        }
    } else {
        echo "<script>alert('Invalid Credentials');window.location.href='../../login.php'</script>";
    }
}