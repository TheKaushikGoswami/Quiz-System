<?php

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
        $ques = $_POST['ques'.$i];
        if($ques == '' || $ques == null) {
            continue;
        }
        $ans = $_POST['ans'.$i];

        if($ques == $ans) {
            $score++;
        }
    }
}

$final_score = ($score / $total_questions) * 100;
// want to store also the two points after the decimal
$final_score = number_format($final_score, 2);

$sql = "INSERT INTO `$quiz_name` (`user_id`, `marks`, `marks_per_pool`) VALUES ('{$_SESSION['user']}', '$final_score', '')";

$result = $conn->query($sql);

if($result) {
    echo "<script>alert('Quiz submitted successfully');window.location.href='index.php'</script>";
} else {
    echo $conn->error;
}