<?php
session_start();

include '../includes/header.php';
include 'config/config.php';


if (!isset($_SESSION['admin'])) {
    header('location: ../login.php');
}

?>
<style>
    input::placeholder,
    textarea::placeholder {
        color: white !important;
    }

    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;

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
    <div class="container-fluid">
        <div class="card col-md-5 bg-dark text-light m-auto mt-3">
            <div class="card-header">
                <h1 class="mb-0">Add New Quiz</h1>
            </div>
            <div class="card-body">
                <form class="" action="quiz.php" method="post">
                    <div class="input-group">
                        <input type="number" class="form-control bg-dark text-light" name="num_subjects"
                            id="num_subjects" placeholder="Enter Number of Subjects"><button
                            class="btn btn-outline-success" min="1" onclick="event.preventDefault();generateSubjects()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div id="subjects-div"></div>
                    <hr>
                    <input type="text" class="form-control bg-dark text-light mb-3" name="quiz_name" id="quiz_name"
                        placeholder="Enter Quiz Name">
                    <textarea class="form-control bg-dark text-light mb-3" name="quiz_rules" id="quiz_rules"
                        placeholder="Enter Quiz Rules" rows="3"></textarea>
                    <input type="number" class="form-control bg-dark text-light mb-3" name="quiz_time" id="quiz_time"
                        placeholder="Enter Quiz Time in Minutes">

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-light col-md-1" type="submit" name="submit">Add</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        let subjectsDiv = document.getElementById('subjects-div');
        if (subjectsDiv.innerHTML == '') {
            subjectsDiv.innerHTML = "<h5 class='text-center'><span class='badge rounded-pill bg-success'>First enter number of subjects above</span></h5>";
        }
        function generateSubjects() {
            
            let subjectsDiv = document.getElementById('subjects-div');
            let numSubjects = document.getElementById('num_subjects');
            let num = 0;

            num = numSubjects.value;
            subjectsDiv.innerHTML = '';
            for (let i = 0; i < num; i++) {
                let subjectDiv = document.createElement('div');
                subjectDiv.classList.add('mb-3');
                subjectDiv.innerHTML = `
                    <div class="input-group">
                    <select class="form-control bg-dark col-md-6 text-light" name="subject${i + 1}" id="">
                       <?php
                       $sql = "SELECT * FROM `question_pools`";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["name"] . '">' . str_replace('_', ' ', $row["name"]) . '</option>';
                        }
                       ?>
                    </select>
                    <input type="number" class="form-control col-md-6 bg-dark text-light" name="num_questions${i + 1}" id="num_questions" placeholder="Enter Number of Questions">
                    </div>
                    
                `;
                subjectsDiv.appendChild(subjectDiv);
            }
        }

    </script>
</div>

<?php
include '../includes/footer.php';
?>