<?php
include 'includes/header.php';
include 'admin/config/config.php';

if(isset($_POST['logout'])){
    session_destroy();
    header('location: login.php');
}

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

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg col-md-12 navbar-dark bg-dark m-0 ">
    <form class="d-flex" method="post" role="search">
        <button class="btn btn-outline-danger" type="submit" name="logout" >Logout</button>
    </form>
    </nav>

    <div class="row">
        <h2 class="text-center m-auto my-5"><span id="time" style="width:200px;font-size:50px;text-align:center" class="badge bg-success rounded-pill"></span></h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card col-md-6 m-auto bg-dark text-light">
                <div class="card-header">
                    <h1 class="text-center"><?php echo str_replace('_',' ',$quiz_name) ?></h1>
                </div>
                <div class="card-body">
                    <form id="main-quiz" name="main-quiz" action="quiz_submit.php?quiz_id=<?php echo $quiz_id ?>" method="post">
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
<script>
    // var form = document.getElementById('quiz');
    window.onload = function(){
        var finalTime = new Date(<?php $sql = "SELECT * FROM quiz WHERE id = $quiz_id"; 
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $time = strtotime($row['start'] . ' + ' . $row['time'] . ' minutes');
        $time = date('Y-m-d H:i:s', $time);
        echo json_encode($time);
        ?>);
        var now = new Date();
        var now = now.getTime();
        var final = finalTime.getTime();
        console.log(final);

        if(finalTime < now) {
            document.getElementById("main-quiz").submit();
        }
        else {
            var timeLeft = finalTime - now;
            var minutes = Math.floor(timeLeft / (1000 * 60));
            var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
            var time = minutes + ':' + seconds;
            document.getElementById('time').innerHTML = time;
            var x = setInterval(function() {
                timeLeft = timeLeft - 1000;
                minutes = Math.floor(timeLeft / (1000 * 60));
                seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                time = minutes + ':' + seconds ;
                document.getElementById('time').innerHTML = time;
                if(timeLeft < 0) {
                    document.getElementById("main-quiz").submit();
                    clearInterval(x);
                    // form.dispatchEvent(new Event('submit'));
                }
            }, 1000);
        }
    }
</script>

<?php
include 'includes/footer.php';
?>

<!--  Computer Organisation and Architecture is used to design your computer system. Computer Architecture is considered 

Computer Hardwares are the physical parts of computer that are tangible. Softwares are the set of programs and instructions that are used to operate the computer system.

1. It is the designing of the internal structure of the computer system.
2. Designing of the organisation of hardware.
3. Designing of the internal working including CPU.

PCI - Peripheral Component Interconnect

Difference b/w Architecture & Organisation:

    1. Architecture describes WHAT the computer does and Organisation describes HOW it does.
    2. Architecture deals with structural relationships and Organisation deals with functional relationships.
    3. Hardware is the part of Architecture and Performance is the part of Organisation.
    4. Architecture is 1st priority and Organisaiton comes later.
    5. Architecture is also called ISA and Organisation is also called Microarchitecture.
    6. Architecture is Objective and Organisation is subjective.
    
- Databus
- Address

Memory Types:

    - Cache
    - Primary/Main/Volatile
    - Secondary/Non-Volatile


-->