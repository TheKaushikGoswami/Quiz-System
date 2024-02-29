<?php

include 'includes/header.php';
include 'admin/config/config.php';

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
}

if (!isset($_SESSION['user'])) {
    header('location: login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
}

?>

<div class="container-fluid p-0">
    <img src="qms.png" alt="" style="height:150px;position:absolute">
    <nav class="navbar col-md-12  m-0 d-flex justify-content-end" style="height:150px">
        <form class="d-flex justify-content-end col-md-12" method="post" role="search">
            <button class="btn btn-outline-danger mx-3" type="submit" name="logout">Logout</button>
        </form>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center my-4 bg-kight" style="font-size:40px">Active Quizes</h1>
            <div class="row d-flex p-3 ">
            <?php
            $sql = "SELECT * FROM `quiz` WHERE `start` < NOW() + INTERVAL 2 HOUR";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // check if the quiz is allocated to the user or not
                    $allocated_to = explode(',', $row['allocated_to']);
                    // echo '<pre>';
                    // print_r($allocated_to);
                    if (!in_array($_SESSION['user'], $allocated_to)) {
                        continue;
                    }
                    ?>
                    <div class="card m-3 mb-2" style="width:20rem;border-radius:30px">
                            <h2 class="text-center my-2"><?php echo $row['name'] ?></h2>
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['rules'] ?></p>
                            <?php
                            $quiz_name = $row['name'];
                            $sql2 = "SELECT * FROM `$quiz_name` WHERE `user_id` = '$_SESSION[user]'";
                            $result2 = $conn->query($sql2);
                            if ($result2->num_rows > 0) {
                                ?>
                                <a class="btn btn-outline-primary disabled">Start Quiz</a> <span class="badge bg-success">Completed</span>
                                <?php
                            }
                            else if ($row['start'] > date('Y-m-d H:i:s')) {
                                echo '<a class="btn btn-outline-primary disabled">Start Quiz</a> <span class="badge bg-warning">Not Started</span>';
                            }
                            else if(strtotime($row['start'] . ' + ' . $row['time'] . ' minutes') < strtotime(date('Y-m-d H:i:s'))) {
                                echo '<a class="btn btn-outline-primary disabled">Start Quiz</a> <span class="badge bg-danger">Time Over</span>';
                            }
                            else {
                                echo '<a href="quiz.php?quiz_id=' . $row['id'] . '" class="btn btn-outline-primary">Start Quiz</a>';
                            }
                            ?>
                            
                        </div>
                    </div>
                    <?php
                }
            }
            else{
                echo "<div class='alert alert-danger text-center'>No active quizes</div>";
            }
            ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>