<?php
include '../includes/header.php';
include 'config/config.php';

// session_start();

// if (!isset($_SESSION['admin'])) {
//     header('location: login.php');
// }

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
                        <a class="nav-link active" aria-current="page" href="pools.php">Question Pools</a>
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
                <form class="d-flex" role="search"><!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Upload Questions
                    </button>

                    <!-- Modal -->
                    <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content  bg-dark text-light">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Questions to Pool</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="">Question Pool</label>
                                    <select name="question_pool" class="bg-dark text-light form-select mb-3" id="" class="form-control">
                                        <option value="">Operating System Development</option>
                                        <option value="">Computer Architecture and Structure</option>
                                        <option value="">Database Management System</option>
                                    </select>
                                    <label for="">Upload File</label>
                                    <input type="file" name="file" class="form-control bg-dark text-light mb-3" id="" placeholder="Upload CSV File">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-outline-success" type="submit">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <div class="row m-auto d-flex justify-content-center">
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
            <div class="card bg-dark text-light m-3" style="width: 20rem;">
                <span class="badge rounded-pill bg-primary" style="position: absolute;right: -11px;top: -7px;">400</span>
                <div class="card-body">
                    <h4 class="card-title mb-3">Operating System Development</h4>
                    <p class="card-text">Here you get all the questions of Operating System Development for your quiz you want to design for the students</p>
                    <div class="buttons d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-light">View Details</a>
                        <a href="#" class="btn btn-outline-danger">Delete Pool</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include '../includes/footer.php';
?>