<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../src/Exception.php';
require '../../src/PHPMailer.php';
require '../../src/SMTP.php';

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
            $mail = new PHPMailer(true);
        
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                // Enable SMTP authentication
                $mail->Username   = 'prograund001@gmail.com'; // SMTP username
                $mail->Password   = '137W0tWAuBF3';    // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
        
                //Recipients
                $mail->setFrom('prograund001@gmail.com', 'Mailer');
                $mail->addAddress($email); // Add a recipient, using the email from the form
        
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Email Verification';
                $mail->Body    = 'Please click on the following link to verify your email: <a href="http://localhost/admin/verify_email.php?token=your_unique_token">Verify Email</a>';
        
                $mail->send();
                echo "<script>alert('Registration successful. Please verify your email.'); window.location.href='../../login.php';</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Passwords do not match!');window.location.href='../../register.php'</script>";
    }

}

?>