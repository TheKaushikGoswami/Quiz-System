<?php

include 'admin/config/config.php';
include 'includes/header.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <style>
      label {
        font-weight: 600;
        color: #666;
      }
      body {
        background: #f1f1f1;
        height: 100vh;
        display: flex;
        align-items: center;
      }
      .box8 {
        box-shadow: 0px 0px 5px 1px #999;
        border-radius: 10px;
      }
      h2{
        font-weight: 600;
        color: #666;
        font-family: 'Roboto', sans-serif;
      }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      <form action="admin/handlers/register_handler.php" method="POST">
        <div class="row jumbotron box8">
          <div class="col-sm-12 form-group">
            <h2 class="text-center">Register</h2>
          </div>
          <div class="col-sm-6 form-group">
            <label for="name-f">Name:</label>
            <input
              type="text"
              class="form-control"
              name="name"
              id="name-f"
              placeholder="Enter your name."
              required
            />
          </div>
          <div class="col-sm-6 form-group">
            <label for="name-l">Roll Number:</label>
            <input
              type="text"
              class="form-control"
              name="roll"
              id="name-l"
              placeholder="Enter your roll number."
              required
            />
          </div>
          <div class="col-sm-6 form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              class="form-control"
              name="email"
              id="email"
              placeholder="Enter your email."
              required
            />
          </div>
          <div class="col-sm-6 form-group">
            <label for="name-l">Course:</label>
            <input
              type="text"
              class="form-control"
              name="course"
              id="name-l"
              placeholder="Enter your course."
              required
            />
          </div>
          <div class="col-sm-6 form-group">
            <label for="name-l">Year:</label>
            <input
              type="text"
              class="form-control"
              name="year"
              id="name-l"
              placeholder="Enter your year."
              required
            />
          </div>
          <div class="col-sm-6 form-group">
            <label for="name-l">Semester:</label>
            <input
              type="text"
              class="form-control"
              name="semester"
              id="name-l"
              placeholder="Enter your semester."
              required
            />
          </div>
          <div class="col-sm-6 form-group">
            <label for="pass">Password</label>
            <input
              type="Password"
              name="password"
              class="form-control"
              id="pass"
              placeholder="Enter your password."
              required
            />
          </div>
          <div class="col-sm-6 form-group">
            <label for="pass2">Confirm Password</label>
            <input
              type="Password"
              name="cnf_password"
              class="form-control"
              id="pass2"
              placeholder="Re-enter your password."
              required
            />
          </div>
          <div class="col-sm-12 form-group mb-2 mt-4">
            <button class="btn btn-primary float-right" name="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
