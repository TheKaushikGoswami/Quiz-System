<?php

include '../config/config.php';
include '../../includes/header.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        foreach($result as $row){
            if ($row['admin'] == 1) {
                if ($row['status'] == 0) {
                    echo "
                        <div class='alert m-auto col-md-6 alert-danger d-flex align-items-center alert-dismissible fade show' role='alert' style='height:20vh'>
                            <h1 class='text-center'>Email not verified!</h1>
                            <button type='button' onclick='backto()' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        <script> function backto() {
                            window.location.href='../../login.php';
                        }
                        </script>
                    ";
                }
                else{
                    $_SESSION['admin'] = $row['roll_no'];
                    echo "
                        <div class='alert m-auto col-md-6 alert-success d-flex align-items-center alert-dismissible fade show' role='alert' style='height:20vh'>
                            <h1 class='text-center'>Logged in successfully!</h1>
                            <button type='button' onclick='backto()' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        <script> function backto() {
                            window.location.href='../index.php';
                        }
                        </script>
                    ";
                }
            } else {
                if ($row['status'] == 0) {
                    echo "
                        <div class='alert m-auto col-md-6 alert-danger d-flex align-items-center alert-dismissible fade show' role='alert' style='height:20vh'>
                            <h1 class='text-center'>Email not verified!</h1>
                            <button type='button' onclick='backto()' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        <script> function backto() {
                            window.location.href='../../login.php';
                        }
                        </script>
                    ";
                }
                else{
                    $_SESSION['user'] = $row['roll_no'];
                    echo "
                        <div class='alert m-auto col-md-6 alert-success d-flex align-items-center alert-dismissible fade show' role='alert' style='height:20vh'>
                            <h1 class='text-center'>Logged in successfully!</h1>
                            <button type='button' onclick='backto()' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        <script> function backto() {
                            window.location.href='../../index.php';
                        }
                        </script>
                    ";
                }
            }
        }
    } else {
        echo "
            <div class='alert m-auto col-md-6 alert-danger d-flex align-items-center alert-dismissible fade show' role='alert' style='height:20vh'>
                <h1 class='text-center'>Invalid Credentials</h1>
                <button type='button' onclick='backto()' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            <script> function backto() {
                window.location.href='../../login.php';
            }
            </script>
        ";
    }
}

include '../../includes/footer.php';