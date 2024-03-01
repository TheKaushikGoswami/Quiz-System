<?php

include '../includes/header.php';
include 'config/config.php';

if (!isset($_SESSION['admin'])) {
    header('location: ../login.php');
}

$quiz_id = $_SERVER['QUERY_STRING'];
$quiz_id = substr($quiz_id, 8);

$sql = "SELECT * FROM `quiz` WHERE `id` = '$quiz_id'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $quiz_name = $row['name'];
    $allocated_to = $row['allocated_to'];
    if($allocated_to == '')
        $allocated_to = null;
    else
    $allocated_to = explode(',', $allocated_to);
}

?>


<style>
    @media screen and (max-width: 640px) {
        table{
            font-size: 10px;
        }

    }
</style>



<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-md bg-light m-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Quiz Manager</a>
            <button style="border:none"z class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pools.php">Question Pools</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Admin Action
                        </a>
                        <ul class="dropdown-menu bg-light" style="border-radius:25px;padding:20px">
                            <li><a class="dropdown-item" href="add_quiz.php">Create New Quiz</a></li>
                            
                            <li><a class="dropdown-item" href="all_quiz.php">All Quiz</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="add_pool.php">Add New Question Pool</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" method="post" role="search">
                    <button class="btn btn-outline-danger" type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0">
        
        <div class="card col-md-8 m-auto mt-5 p-4" style="border-radius:30px">
                <h1 class="text-center my-3"><?php echo "Quiz name: " . strtoupper(str_replace('_',' ',$quiz_name)); ?></h1>
            <div id="quiz-detail" class="card-body">
                <table class="table m-auto">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Roll No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Correct Questions</th>
                            <th scope="col">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `$quiz_name`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php 
                                    $user_id = $row['user_id'];
                                    $sql1 = "SELECT `name` FROM `users` WHERE `roll_no` = '$user_id'";
                                    $name = $conn->query($sql1); // Corrected variable name
                                    $user_name = $name->fetch_assoc();
                                    echo $user_name['name'];
                                    ?></td>
                                    <td><?php echo $row['marks']; ?></td>
                                    <td><?php echo $row['percentage']; ?>%</td>
                                </tr>
                        <?php
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
            <button id="generate-pdf" class="btn btn-outline-dark col-md-3">Generate PDF Report</button>
        </div>
        <div class="card col-md-8 m-auto mt-5 p-3" style="border-radius:30px">
                <h1 class="text-center my-3">Quiz Allocated to Students</h1>
            <div class="card-body">
                <table class="table col-md-5 m-auto">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Roll No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if($allocated_to != null){
                            $j = 1;
                            foreach ($allocated_to as $roll_no) {
                                $sql = "SELECT * FROM `users` WHERE `roll_no` = '$roll_no'";
                                $result = $conn->query($sql);
                                $i = 1;
                                $row = $result->fetch_assoc();
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $j; ?></th>
                                    <td><?php echo $row['roll_no']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['course']; ?></td>
                                    <td><?php echo $row['year']; ?></td>
                                </tr>
                            <?php
                                $j++;
                            }
                        }
                        ?>

                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
   
</div>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('generate-pdf').addEventListener('click', function () {
            var element = document.getElementById('quiz-detail');
            html2pdf(element);
        });
});
</script>




<?php
include '../includes/footer.php';
?>