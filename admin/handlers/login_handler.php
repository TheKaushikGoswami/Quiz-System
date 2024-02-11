<?php

include '../config/config.php';
include '../../includes/header.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        foreach($result as $row){
            if ($row['status'] == 0) {
                echo "<script>alert('Email not verified!'); window.location.href='../../login.php';</script>";
            }
            else{
                if ($row['admin'] == 1) {
                    $_SESSION['admin'] = $row['roll_no'];
                    echo "<script>alert('Logged in successfully!'); window.location.href='../../admin/index.php';</script>";
                }
                else{
                    $_SESSION['user'] = $row['roll_no'];
                    echo "<script>alert('Logged in successfully!'); window.location.href='../../index.php';</script>";
                }
            }
        }
    }
    else {
        echo "<script>alert('Invalid email or password!'); window.location.href='../../login.php';</script>";
    }
}

include '../../includes/footer.php';

?>