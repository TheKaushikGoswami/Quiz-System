<?php

include 'admin/config/config.php';
include 'includes/header.php';

?>


<div class="container1" id="container1">
      <div class="form-container sign-in1">
        <form action="admin/handlers/register_handler.php" method="POST">
          <h1>Quiz System</h1>
          <input type="text" name="name" placeholder="Enter Your name" />
          <input
            type="number"
            name="roll"
            placeholder="Enter Your Roll Number"
          />
          <input type="email" name="email" placeholder="Enter Your Email" />
          <input
            type="password"
            name="password"
            placeholder="Enter Your Password"
          />
          <input
            type="password"
            name="cnf_password"
            placeholder="Confirm Your Password"
          />
          <select name="course">
            <option>Select Your Course</option>
            <option value="B.Tech">B.Tech</option>
            <option value="M.Tech">M.Tech</option>
            <option value="B.Sc">B.Sc</option>
            <option value="BCA">BCA</option>
            <option value="MCA">MCA</option>
            <option value="MBA">MBA</option>
          </select>
          <select name="year">
            <option>Select Your Year</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            <option value="4th">4th</option>
          </select>
          <a href="login.php">Already have an Account? Login here</a>
          <button name="submit" type="submit">Register</button>
        </form>
      </div>
    </div>
<?php include 'includes/footer.php'; ?>