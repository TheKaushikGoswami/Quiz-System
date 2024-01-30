<?php
include 'includes/header.php';
include 'admin/config/config.php';

$quiz_id = $_SERVER['QUERY_STRING'];
$quiz_id = substr($quiz_id, 8);

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
    $sql = "SELECT * FROM `$pool` ORDER BY RAND() LIMIT $num_questions";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $questions[$pool] = array();
        while($row = $result->fetch_assoc()) {
            array_push($questions[$pool], $row);
        }
    }
}
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center my-4">Quiz Management System</h1>
            <div class="card col-md-6 m-auto bg-dark text-light">
                <div class="card-header">
                    <h1 class="text-center"><?php echo $quiz_name ?></h1>
                </div>
                <div class="card-body">
                    <form action="quiz.php?quiz_id=<?php echo $quiz_id ?>" method="post">
                        <?php
                        $i = 1;
                        foreach($questions as $pool => $question) {
                            foreach($question as $ques) {
                                echo '<div class="form-group mb-5">';
                                echo '<h3>' . $i . " " . $ques['question'] . '</h3>';
                                echo '<div class="form-check">';
                                echo '<input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option1'] . '"> ' . $ques['option1'] . '<br>';
                                echo '<input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option2'] . '"> ' . $ques['option2'] . '<br>';
                                echo '<input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option3'] . '"> ' . $ques['option3'] . '<br>';
                                echo '<input type="radio" class="my-2" name="ques'. $i .'" value="' . $ques['option4'] . '"> ' . $ques['option4'] . '<br>';
                                echo '<input type="hidden" name="ans'. $i .'" value="' . $ques['answer'] . '">';
                                echo '</div>';
                                echo '</div>';
                                $i++;
                            }
                        }
                        ?>
                        <input class="btn btn-outline-success" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include 'includes/footer.php';
?>