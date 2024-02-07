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
    $allocated_to = explode(',', $allocated_to);
}



?>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark m-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quiz Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
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
                        <ul class="dropdown-menu bg-dark-subtle">
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
        
        <div class="card bg-dark text-light col-md-8 m-auto mt-5">
            <div class="card-header">
                <h1 class="text-center"><?php echo strtoupper(str_replace('_',' ',$quiz_name)); ?></h1>
            </div>
            <div class="card-body">
                <table class="table table-dark bg-dark text-light col-md-5 m-auto">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Roll No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Marks Per Pool</th>
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
                                    <td><?php echo $row['marks']; ?>%</td>
                                    <td>feature will be added soon</td>
                                </tr>
                        <?php
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="card bg-dark text-light col-md-8 m-auto mt-5">
            <div class="card-header">
                <h1 class="text-center">Quiz Allocated to Students</h1>
            </div>
            <div class="card-body">
                <table class="table table-dark bg-dark text-light col-md-5 m-auto">
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
                        foreach ($allocated_to as $roll_no) {
                            $sql = "SELECT * FROM `users` WHERE `roll_no` = '$roll_no'";
                            $result = $conn->query($sql);
                            $i = 1;
                            $row = $result->fetch_assoc();
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $row['roll_no']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['course']; ?></td>
                                <td><?php echo $row['year']; ?></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>

                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
   
</div>

<?php
include '../includes/footer.php';
?>