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
        <select name="course" id="" class="form-select bg-dark text-light mb-2">
          <option disabled>Select Your Course</option>
          <option value="B.Tech">B.Tech</option>
          <option value="M.Tech">M.Tech</option>
          <option value="B.Sc">B.Sc</option>
          <option value="BCA">BCA</option>
          <option value="MCA">MCA</option>
          <option value="MBA">MBA</option>
        </select>
        <select name="year" id="" class="form-select bg-dark text-light mb-2">
          <option disabled>Select Your Year</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
        </select>
        <select name="semester" id="" class="form-select bg-dark text-light mb-2">
          <option disabled>Select Your Semester</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
          <option value="5th">5th</option>
          <option value="6th">6th</option>
          <option value="7th">7th</option>
          <option value="8th">8th</option>
        </select>
        <input type="password" name="password" placeholder="Enter Your Password" class="form-control bg-dark text-light mb-2">
        <input type="password" name="cnf_password" placeholder="Confirm Your Password" class="form-control bg-dark text-light mb-2">
        <span class="badge badge-success">Already have an Account? <a href="login.php">Login</a> here</span><br>
        <div class="d-flex justify-content-end">
          <input type="submit" name="submit" value="Register" class="btn btn-outline-success"> 
        </div> 
      </div>    
    </div>
  </form>
</div>

<?php include 'includes/footer.php'; ?>