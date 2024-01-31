<?php

session_start();

include "config/config.php";
include "add_quiz.php";

if (!isset($_SESSION['admin'])) {
    header('location: ../login.php');
}

if(isset($_POST['submit'])) {
    $num_subjects = $_POST['num_subjects'];
    $pools = '';
    for($i = 0; $i < $num_subjects; $i++) {
        $pools .= $_POST['subject' . ($i + 1)] . ',';
    }
    $num_questions = '';
    for($i = 0; $i < $num_subjects; $i++) {
        $num_questions .= $_POST['num_questions' . ($i + 1)] . ',';
    }
    $total_ques = 0;
    for($i = 0; $i < $num_subjects; $i++) {
        $total_ques += $_POST['num_questions' . ($i + 1)];
    }

    $quiz_name = $_POST['quiz_name'];
    $quiz_rules = $_POST['quiz_rules'];
    $quiz_time = $_POST['quiz_time'];

    // echo $pools . '<br>';
    // echo $num_questions . '<br>';
    // echo $total_ques . '<br>';

    $sql = "INSERT INTO `quiz` (`name`, `rules`, `time`, `pools`, `ques_per_pool`, `total_ques`) VALUES ('$quiz_name', '$quiz_rules', '$quiz_time', '$pools', '$num_questions', '$total_ques')";
    $result = $conn->query($sql);
    if($result) {
        // header('Location: add_quiz.php');
        echo "<script>alert('Quiz added successfully')</script>";
    } else {
        echo $conn->error;
    }
    

    
}