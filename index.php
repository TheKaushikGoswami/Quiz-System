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
    <nav class="navbar navbar-expand-lg col-md-12 navbar-dark bg-dark m-0 ">
        <form class="d-flex" method="post" role="search">
            <button class="btn btn-outline-danger" type="submit" name="logout">Logout</button>
        </form>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center my-4">Active Quizes</h1>
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
                    <div class="card m-auto bg-dark text-light mb-2" style="width:18rem">
                        <div class="card-header">
                            <h2><?php echo $row['name'] ?></h2>
                        </div>
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

<?php
include 'includes/footer.php';
?>