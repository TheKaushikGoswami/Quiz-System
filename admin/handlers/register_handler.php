<?php

include '../config/config.php';
require_once '../../vendor/autoload.php'; // Include the Swift Mailer autoload file

// ini_set for sending mail
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "thekaushikgoswami@gmail.com");
ini_set("SMTPAuth", true);
ini_set("SMTPSecure", "tls");

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
            // Send verification email to the email provided
            $to = $email;
            $subject = "Email Verification";
            $message = "Hi " . $name . ",<br><br>Click <a href='http://localhost/verify.php?token=" . $token . "'>here</a> to verify your email.";
            $headers = "From: thekaushikgoswami@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $smtpConfig = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            $transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
            $transport->setUsername('thekaushikgoswami@gmail.com');
            $transport->setPassword('Googlemail@_TheKaushikG_@1');
            $transport->setStreamOptions($smtpConfig);

            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message($subject))
                ->setFrom(['thekaushikgoswami@gmail.com' => 'Your Name'])
                ->setTo([$to])
                ->setBody($message, 'text/html');

            $result = $mailer->send($message);

            if ($result) {
                echo "<script>alert('User registered successfully! Please verify your email to login.');</script>";
            } else {
                echo "Error sending email.";
            }

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Passwords do not match!');window.location.href='../../register.php'</script>";
    }

}

?>