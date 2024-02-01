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

if(isset($_POST['logout'])){
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
            <h1 class="text-center my-4">Quiz Management System</h1>
            <div class="card col-md-6 m-auto bg-dark text-light">
                <div class="card-header">
                    <h2>Quiz</h2>
                </div>
                <div class="card-body">
                    <?php
                    $sql = "SELECT * FROM `quiz` where `start` > NOW()+ INTERVAL 2 HOUR";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $quiz_id = $row['id'];
                            $quiz_name = $row['name'];
                            $quiz_rules = $row['rules'];
                            $quiz_time = $row['time'];
                    ?>
                    <h1><a class="btn btn-light" href="quiz.php?quiz_id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></h1>
                    <?php
                        }
                    }   
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'includes/footer.php';
?>