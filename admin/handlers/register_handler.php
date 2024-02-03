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
        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Insert user data along with the token and set email verification to false
        $sql = "INSERT INTO `users` (`roll_no`, `name`, `email`, `course`, `year`, `semester`, `password`, `token`) VALUES ('$roll', '$name', '$email', '$course', '$year', '$semester', '$password', '$token')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            // Send email to the user using Brevo API
            $subject = "Email Verification";
            $body = "Hi, $name. Click here to verify your email: http://localhost/quiz-app/admin/handlers/verify_email.php?token=$token";
            $headers = "From: Geeta University";

            if (mail($email, $subject, $body, $headers)) {
                echo "<script>alert('User registered successfully! Please verify your email to login.');</script>";
            } else {
                echo "<script>alert('Failed to send email!');</script>";
            }
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Passwords do not match!');window.location.href='../../register.php'</script>";
    }

}

?>