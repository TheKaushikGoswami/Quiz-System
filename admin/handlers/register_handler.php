<?php

include '../config/config.php';

if (isset($_POST['submit'])) {
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];
    $cnf_password = $_POST['cnf_password'];

    $sql = "SELECT * FROM `users` WHERE `roll_no` = '$roll'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('User with this roll number is already registered!');</script>";
    }

    if ($password == $cnf_password) {
        $sql = "INSERT INTO `users` (`roll_no`, `name`, `email`, `course`, `year`, `semester`, `password`) VALUES ('$roll', '$name', '$email', '$course', '$year', '$semester', '$password')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "<script>alert('User registered successfully!'); window.location.href='../../login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Passwords do not match!')</script>";
    }

}

?>