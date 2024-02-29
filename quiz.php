<?php

include 'includes/header.php';
include 'admin/config/config.php';

if(!isset($_SESSION['user'])) {
    header('location: login.php');
    exit;
}

$quiz_id = isset($_GET['quiz_id']) ? $_GET['quiz_id'] : '';
if(!$quiz_id) {
    header('location: index.php');
    exit;
}

// Validate if quiz is accessible
$sql = "SELECT * FROM `quiz` WHERE `id` = '$quiz_id'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentTime = strtotime(date('Y-m-d H:i:s'));
    $startTime = strtotime($row['start']);
    $endTime = strtotime($row['start'] . ' + ' . $row['time'] . ' minutes');
    
    $quizName = $row['name'];
    $sql2 = "SELECT * FROM `$quizName` WHERE `user_id` = '".$_SESSION['user']."'";
    $result2 = $conn->query($sql2);
    $completed = $result2->num_rows > 0;
    
    if($currentTime < $startTime || $currentTime > $endTime || $completed) {
        header('location: index.php');
        exit;
    }
} else {
    // If no such quiz exists
    header('location: index.php');
    exit;
}

$sql = "SELECT * FROM `quiz` WHERE `id` = '$quiz_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$quiz_name = $row['name'];

$pools = $row['pools'];
$pools = explode(',', $pools);
array_pop($pools);

$ques_per_pool = $row['ques_per_pool'];
$ques_per_pool = explode(',', $ques_per_pool);
array_pop($ques_per_pool);

// now i want to make a two dimensional array which contains the questions of each pool

$questions = array();
for($i = 0; $i < count($pools); $i++) {
    $pool = $pools[$i];
    $num_questions = $ques_per_pool[$i];
    $sql = "SELECT * FROM `$pool` ORDER BY RAND() LIMIT $num_questions ";
    $result = $conn->query($sql);   
    if($result->num_rows > 0) {
        $questions[$pool] = array();
        while($row = $result->fetch_assoc()) {
            array_push($questions[$pool], $row);
        }
    }
}
?>

<div class="container-fluid p-3">


    <div class="row" style="position:fixed;z-index:2000;top:10px;right:20px">
        <h2 class="text-center m-auto"><span id="time" style="width:130px;font-size:30px;text-align:center" class="badge bg-success rounded-pill"></span></h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card col-md-6 m-auto mt-5" style="border-radius:30px">
                <!-- <div class="card-header"> -->
                    <h1 class="text-center my-4"><?php echo strtoupper(str_replace('_',' ',$quiz_name)) ?></h1>
                <!-- </div> -->
                <div class="card-body col-md-11 m-auto">
                    <form id="main-quiz" name="main-quiz" action="quiz_submit.php?quiz_id=<?php echo $quiz_id ?>" method="post">
                        <?php
                        $i = 1;
                        foreach($questions as $pool => $question) {
                            foreach($question as $ques) {
                                echo '<div class="form-group mb-5">';
                                echo '<h3>' . $i . ". " . $ques['question'] . '</h3>';
                                echo '<div class="form-check">';
                                echo '<label style="font-size:20px; width:100%;padding:0 10px"><input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option1'] . '"> ' . $ques['option1'] . '</label><br>';
                                echo '<label style="font-size:20px; width:100%;padding:0 10px"><input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option2'] . '"> ' . $ques['option2'] . '</label><br>';
                                echo '<label style="font-size:20px; width:100%;padding:0 10px"><input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option3'] . '"> ' . $ques['option3'] . '</label><br>';
                                echo '<label style="font-size:20px; width:100%;padding:0 10px"><input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option4'] . '"> ' . $ques['option4'] . '</label><br>';
                                echo '<input type="hidden" name="ans'. $i .'" value="' . $ques['answer'] . '">';
                                echo '</div>';
                                echo '</div>';
                                $i++;
                            }
                        }
                        ?>
                        <div class="d-flex justify-content-end col-md-12">
                        <input class="btn btn-outline-success col-md-2" type="submit" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // var form = document.getElementById('quiz');
    document.addEventListener('DOMContentLoaded', function() {
    var finalTime = new Date(<?php 
        $sql = "SELECT * FROM quiz WHERE id = $quiz_id"; 
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $time = strtotime($row['start'] . ' + ' . $row['time'] . ' minutes');
        $time = date('Y-m-d H:i:s', $time);
        echo json_encode($time);
    ?>);
    
    var now = new Date().getTime();
    var final = finalTime.getTime();

    if(finalTime < now) {
        if (document.getElementById("main-quiz")) {
            document.getElementById("main-quiz").submit();
        } else {
            console.log("Form not found");
        }
    } else {
        var timeLeft = final - now;
        updateTimer(timeLeft); // Call updateTimer function to handle countdown and submission
    }
});

function updateTimer(timeLeft) {
    var x = setInterval(function() {
        timeLeft -= 1000;
        var minutes = Math.floor(timeLeft / (1000 * 60));
        var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
        var time = minutes + ':' + seconds;
        document.getElementById('time').innerHTML = time;

        if(timeLeft <= 1000) {
            clearInterval(x);
            document.getElementById('time').innerHTML = "0:0";
            var form = document.getElementById("main-quiz");
            if (form) {
                var submitButton = document.createElement("input");
                submitButton.type = "submit";
                submitButton.name = "submit";
                submitButton.style.display = "none"; // Hide the submit button
                form.appendChild(submitButton);
                submitButton.click();
                form.removeChild(submitButton); // Clean up if necessary
            } else {
                console.log("Form not found");
            }
        }
    }, 1000);
}

</script>

<?php
include 'includes/footer.php';
?>