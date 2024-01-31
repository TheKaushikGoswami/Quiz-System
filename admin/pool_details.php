<?php

session_start();
include "../includes/header.php";
include 'config/config.php';

if (!isset($_SESSION['admin'])) {
    header('location: ../login.php');
}

$pool_id = $_SERVER['QUERY_STRING'];
$pool_id = substr($pool_id, 8);

$sql = "SELECT name FROM `question_pools` WHERE `id` = '$pool_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$pool_name = $row['name'];

$sql = "SELECT * FROM `$pool_name`";
$result = $conn->query($sql);



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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pools.php">Question Pools</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">
                <div class="card bg-dark text-light p-4" style="padding-right:15px">
                    <div class="card-header">
                        <h1 class="text-center"><?php echo strtoupper(str_replace('_',' ',$pool_name)); ?></h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Question ID</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Option 1</th>
                                    <th scope="col">Option 2</th>
                                    <th scope="col">Option 3</th>
                                    <th scope="col">Option 4</th>
                                    <th scope="col">Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $row['id'] . "</th>";
                                echo "<td>" . $row['question'] . "</td>";
                                echo "<td>" . $row['option1'] . "</td>";
                                echo "<td>" . $row['option2'] . "</td>";
                                echo "<td>" . $row['option3'] . "</td>";
                                echo "<td>" . $row['option4'] . "</td>";
                                echo "<td>" . $row['answer'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>