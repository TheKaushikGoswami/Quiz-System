<?php

error_reporting(E_ALL & ~E_WARNING);
ini_set('display_errors', 1);

include 'includes/header.php';
include 'admin/config/config.php';

$quiz_id = $_SERVER['QUERY_STRING'];
$quiz_id = substr($quiz_id, 8);

$sql = "SELECT * FROM `quiz` WHERE `id` = '$quiz_id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$quiz_name = $row['name'];
$total_questions = $row['total_ques'];

if(isset($_POST['submit'])) {
    $score = 0;
    for($i = 1; $i <= $total_questions; $i++) {
        if(!$_POST['ques'.$i] || !$_POST['ans'.$i]) {
            continue;
        }
        else{
            $ques = $_POST['ques'.$i];
            $ans = $_POST['ans'.$i];
            if($ques == $ans) {
                $score++;
            }
        }
    }
}

$final_score = ($score / $total_questions) * 100;
$final_score = number_format($final_score, 2);

$sql = "INSERT INTO `$quiz_name` (`user_id`, `marks`, `percentage`) VALUES ('{$_SESSION['user']}', '$score', '$final_score')";

$result = $conn->query($sql);

if($result) {
    echo "<script>alert('Quiz Submitted Successfully!'); window.location.href='index.php';</script>";
} else {
    echo $conn->error;
}

include 'includes/footer.php';