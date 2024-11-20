<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../config/config.php';
require '../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

if (isset($_POST['submit'])) {
    $roll = $conn->real_escape_string($_POST['roll']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $em_check = "SELECT * FROM `users` WHERE `email` = '$email'";
    $em_result = $conn->query($em_check);
    if ($em_result->num_rows > 0) {
        echo "<script>alert('User with this email is already registered'); window.location.href='../../register.php';</script>";
    } else {
        $course = $conn->real_escape_string($_POST['course']);
        $year = $conn->real_escape_string($_POST['year']);
        $password = $conn->real_escape_string($_POST['password']);
        $cnf_password = $conn->real_escape_string($_POST['cnf_password']);

        $sql = "SELECT * FROM `users` WHERE `roll_no` = '$roll'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<script>alert('User with this roll number is already registered!'); window.location.href='../../register.php';</script>";
        } elseif ($password == $cnf_password) {
            $token = bin2hex(random_bytes(50));
            $sql = "INSERT INTO `users` (`roll_no`, `name`, `email`, `course`, `year`, `password`, `token`) VALUES ('$roll', '$name', '$email', '$course', '$year', '$password', '$token')";
            if ($conn->query($sql) === TRUE) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = $_ENV['MAIL_USERNAME'];
                    $mail->Password = $_ENV['MAIL_PASSWORD'];
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom($_ENV['MAIL_USERNAME'], 'Geeta University');
                    $mail->addAddress($email, $name);

                    $mail->isHTML(true);
                    $mail->Subject = 'Email Verification';
                    $mail->Body = 'Click <a href="http://qms.codetechbd.com/admin/handlers/verify_email.php?token=' . $token . '">here</a> to verify your email for Quiz System.';
                    $mail->AltBody = 'Click here to verify your email: http://qms.codetechbd.com/admin/handlers/verify_email.php?token=' . $token;

                    $mail->send();
                    echo "<script>alert('Verification email sent to your email address. Please verify your email to login.'); window.location.href='../../login.php';</script>";
                } catch (Exception $e) {
                    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.location.href='../../register.php';</script>";
                }
            } else {
                echo "<script>alert('Error: " . $conn->error . "'); window.location.href='../../register.php';</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match!'); window.location.href='../../register.php';</script>";
        }
    }
}

?>