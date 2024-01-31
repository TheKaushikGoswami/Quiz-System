<?php

include 'admin/config/config.php';
include 'includes/header.php';

?>

<style>
  input::placeholder{
    color: #fff!important;
  }
</style>

<div class="container-fluid">
  <form action="admin/handlers/register_handler.php" method="POST">
    <div class="card m-auto col-md-6 mt-5 bg-dark text-light">
      <div class="card-header">
        <h2 class="text-center">Register</h2>
      </div>
      <div class="card-body">
        <input type="text" name="name" placeholder="Enter Your name" class="form-control bg-dark text-light mb-2">
        <input type="number" name="roll" placeholder="Enter Your Roll Number" class="form-control bg-dark text-light mb-2">
        <input type="email" name="email" placeholder="Enter Your Email" class="form-control bg-dark text-light mb-2">
        <input type="text" name="course" placeholder="Enter Your Course" class="form-control bg-dark text-light mb-2">
        <input type="text" name="year" placeholder="Enter Your Year" class="form-control bg-dark text-light mb-2">
        <input type="text" name="semester" placeholder="Enter Your Semester" class="form-control bg-dark text-light mb-2">
        <input type="password" name="password" placeholder="Enter Your Password" class="form-control bg-dark text-light mb-2">
        <input type="password" name="cnf_password" placeholder="Confirm Your Password" class="form-control bg-dark text-light mb-2">
        <div class="d-flex justify-content-end">
          <input type="submit" name="submit" value="Register" class="btn btn-outline-success"> 
        </div> 
      </div>    
    </div>
  </form>
</div>

<?php include 'includes/footer.php'; ?>