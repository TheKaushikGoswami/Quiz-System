<?php
include '../includes/header.php';
include 'config/config.php';

// session_start();

// if (!isset($_SESSION['admin'])) {
//     header('location: ../login.php');
// }

?>

<style>
    input::placeholder,textarea::placeholder{
        color: grey!important;
    }
</style>
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
                            <li><a class="dropdown-item" href="remove_quiz.php">Remove Quiz</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="add_pool.php">Add New Question Pool</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card col-md-8 bg-dark text-light m-auto mt-3">
            <div class="card-header">
                <h1 class="mb-0">Add New Question Pool</h1>
            </div>
            <div class="card-body">
                <form class="" action="">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control bg-dark text-light mb-3" name="name" id="name" placeholder="Enter Subject Name">
                    <label for="name">Description</label>
                    <textarea class="form-control bg-dark text-light mb-3" name="description" id="description" cols="30" rows="10" placeholder="Enter Description"></textarea>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-light col-md-1" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>