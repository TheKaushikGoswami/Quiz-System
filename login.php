<?php

include 'admin/config/config.php';
include 'includes/header.php';

if (isset($_SESSION['admin'])) {
    header('location: admin/index.php');
}

else if (isset($_SESSION['user'])) {
    header('location: index.php');
}

?>

<div class="container-fluid" style="height:100vh;display:flex;align-items:center">
    <div class="card col-md-4 m-auto bg-dark text-light">
        <div class="card-header mt-2 mb-4">
            <h1 class="text-center">Login here</h1>
        </div>
        <div class="card-body mb-4">
            <form action="admin/handlers/login_handler.php" method="post">
                <input type="email" name="email" placeholder="Enter Your Email" class="form-control bg-dark text-light mb-3">
                <input type="password" name="password" placeholder="Enter Your Password" class="form-control bg-dark text-light mb-3">
                <span class="badge badge-success">Don't have an Account? <a href="register.php">Sign up</a> here</span><br>
                <button class="btn btn-outline-success" name="submit" type="submit">Sign In</button>

            </form>
        </div>
    </div>
</div>