<?php

include 'admin/config/config.php';

session_start();

if (isset($_SESSION['admin'])) {
    header('location: admin/index.php');
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header('location: admin/index.php');
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
</body>
</html>