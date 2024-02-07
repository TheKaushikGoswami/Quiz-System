<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../config/config.php';
require '../../vendor/autoload.php';
require '../../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../../vendor/PHPMailer/PHPMailer/src/SMTP.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

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
            // Send verification email using Gmail SMTP
            $mail = new PHPMailer(true); // Passing `true` enables exceptions

            try {
                //Server settings
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = $_ENV['MAIL_USERNAME']; // SMTP username
                $mail->Password = $_ENV['MAIL_PASSWORD']; // SMTP password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587; // TCP port to connect to
    
                //Recipients
                $mail->setFrom($_ENV['MAIL_USERNAME'], 'Geeta University');
                $mail->addAddress($email, $name); // Add a recipient, Name is optional
    
                //Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Email Verification';
                $mail->Body    = 'Click <a href="http://localhost/quiz-system/admin/handlers/verify_email.php?token=' . $token . '">here</a> to verify your email for Quiz System.';
                $mail->AltBody = 'Click here to verify your email: http://localhost/quiz-system/admin/handlers/verify_email.php?token=' . $token;
    
                $mail->send();
                echo '<script>alert("Verification email sent to your email address. Please verify your email to login.");window.location.href="../../login.php";</script>';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
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