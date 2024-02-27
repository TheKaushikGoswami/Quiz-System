<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./assets/login.css" />
    <style>
      body,html{
        overflow-x: hidden;
      }
    </style>
    <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap'); */
@import url("https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Quicksand:wght@400;500;600;700&family=Raleway:wght@400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Quicksand", sans-serif;
}

body {
  background-color: #c9d6ff;
  background: linear-gradient(to right, #e2e2e2, #89abe3ff);
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.navbar {
  position: relative;
  background: #ffffff;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
  font-size: 15px;
  font-weight: 600;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
}

.navbar li {
  color: #567aef;
  padding: 0px 10px;
}

.container {
  background-color: #fff;
  border-radius: 30px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
  position: relative;
  overflow: hidden;
  width: 450px;
  max-width: 90%;
  min-height: 480px;
  display: flex;
  justify-content: center;
  align-items: center;
  top: 12%;
}

.container span {
  font-size: 14px;
}

form h1 {
  font-size: 30px;
  font-weight: 600;
}

.container a {
  color: #333;
  font-size: 13px;
  text-decoration: none;
  margin: 15px 0 10px;
}

.container button {
  background-color: black;
  color: #ffffff;
  font-size: 15px;
  letter-spacing: 5px;
  padding: 15px 100px;
  border: 1px solid transparent;
  border-radius: 8px;
  font-weight: 600;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  margin-top: 15px;
  cursor: pointer;
}
.container button:hover {
  background-color: #89abe3ff;
  color: #ffffff;
  transition: 0.5s all ease-in-out;
  transform: translateY(-2px) scale(1);
}

.container form {
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  height: 100%;
}

.container input {
  background-color: #eee;
  border: none;
  margin: 8px 0;
  padding: 15px 15px;
  font-size: 13px;
  border-radius: 8px;
  width: 255px;
  outline: none;
  color: #567aef;
  font-size: 15px;
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
}

.sign-in {
  width: 100%;
  z-index: 2;
}

.social-icons {
  margin: 20px 0;
}

.social-icons a {
  border-radius: 20%;
  border: 1px solid #89abe3ff;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 3px;
  width: 40px;
  height: 40px;
}

.social-icons a:hover {
  background-color: #89abe3ff;
  color: #ffffff;
  transition: 0.5s all ease;
}


@media (max-width:500px)
{

.container button 
{
font-size: 11px;
letter-spacing: 1px;

}

}

/* register page  */

.body {
  background-color: #c9d6ff;
  background: linear-gradient(to right, #e2e2e2, #89abe3ff);
  align-items: center;
  justify-content: center;
  height: 100vh;
}
.container1 {
  background-color: #fff;
  border-radius: 30px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
  position: relative;
  overflow: hidden;
  width: 450px;
  max-width: 80%;
  min-height: 600px;
  display: flex;
  justify-content: center;
  align-items: center;
  top: 5%;
  margin: 0 auto;
}

.container1 span {
  font-size: 14px;
}

form h1 {
  font-size: 30px;
  font-weight: 600;
}

.container1 a {
  color: #333;
  font-size: 13px;
  text-decoration: none;
  margin: 15px 0 10px;
}

.container1 button {
  background-color: black;
  color: #ffffff;
  font-size: 15px;
  letter-spacing: 5px;
  padding: 13px 90px;
  border: 1px solid transparent;
  border-radius: 8px;
  font-weight: 600;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  margin-top: 15px;
  cursor: pointer;
}
.container1 button:hover {
  background-color: #89abe3ff;
  color: #ffffff;
  transition: 0.5s all ease-in-out;
  transform: translateY(-2px) scale(1);
}

.container1 form {
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  height: 100%;
}

.container1 input ,.container1 select {
  background-color: #eee;
  border: none;
  margin: 8px 0;
  padding: 10px 18px;
  font-size: 13px;
  border-radius: 8px;
  width: 255px;
  outline: none;
  color: #567aef;
  font-size: 15px;
}

.container1 select 
{
    color: grey;
    cursor: pointer;


}


.form-container1 {
  position: absolute;
  top: 0;
  height: 100%;
}

.sign-in1 {
  width: 100%;
  z-index: 2;
}

.social-icons {
  margin: 20px 0;
}

.social-icons a {
  border-radius: 20%;
  border: 1px solid #89abe3ff;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 3px;
  width: 40px;
  height: 40px;
}

.social-icons a:hover {
  background-color: #89abe3ff;
  color: #ffffff;
  transition: 0.5s all ease;
}


@media (max-width:500px)
{
    form h1 {
        font-size: 25px;
        font-weight: 600;
      }
      
.container1 button 
{
font-size: 11px;
letter-spacing: 1px;

}

}

</style>
  </head>
  <body class="bg-primary-subtle">