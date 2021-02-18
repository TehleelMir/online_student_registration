<?php
session_start();
include("queries.php");
if(strlen($_SESSION['admin_name'])==0){
  header('location: ../illegal_request.php');
}
if(isset($_POST['submit_update'])){

  $temp = isPassVaild($_POST['pass1']);
  if($temp == 0){
    $message = "Incorret Password";
    echo "<script type='text/javascript'>alert('$message');</script>";
      header("location: registration.php");
  }

  else if($_POST['pass2'] != $_POST['pass3']){
    $message = "Password Mismatch";
    echo "<script type='text/javascript'>alert('$message');</script>";
      header("location: registration.php");
  }

  else{
  $_POST['pass2'];
  upDatePassword($_POST['pass2']);
  $message = "Admin Password Updated";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header("location: registration.php");
}
}


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Admin Panel</title>


  <style>
.row {
 display: flex;
 flex-wrap: wrap;
}

.row > div[class*='col-'] {
display: flex;
}

body {
background-image: url('images/background_for_dashboard_admin.jpg');
background-repeat: no-repeat;
background-size:cover;
}
.card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
max-width: 300px;
text-align: center;
}

.title {
color: grey;
font-size: 18px;
}

button {
border: none;
outline: 0;
display: inline-block;
padding: 8px;
color: white;
background-color: #000;
text-align: center;
cursor: pointer;
width: 100%;
font-size: 18px;
}

a {
text-decoration: none;
font-size: 22px;
color: black;
}

button:hover, a:hover {
opacity: 0.7;
}

#footer {
  position: fixed;
  bottom: 0;
  width: 100%;
}
</style>


<meta content="width=device-width, initial-scale=1.0" name="viewport">


<meta content="" name="descriptison">
<meta content="" name="keywords">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../assets/vendor/aos/aos.css" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">
</head>
  <body>
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container">
        <div class="header-container d-flex align-items-center">
          <div class="logo mr-auto">
            <h1 class="text-light"><a href="index.html"><span>Admin Panel</span></a></h1>
          </div>

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li><a href="dashboard_for_admin.php">Profile</a></li>
              <li><a href="department.php?del=0">Department</a></li>
              <li><a href="semester.php?del=0">Semester</a></li>
              <li><a href="course.php?del=0">Course</a></li>
              <li><a href="manage_student.php?del=0">Manage Student</a></li>
              <li class="active" ><a href="registration.php">Password</a></li>
              <li><a href="contact.php?mes=0">Contact</a></li>

              <li class="get-started"><a href="session.php">Log out</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
<br>

    <section id="contact" class="contact">
      <div class="container">

    <form method="post" class="php-email-form mt-4">
        <h1 class="text-green">Change Password</h1>
        <div class="form-group">
          <input type="text" class="form-control" name="pass1" placeholder="Current Password" required />
<br>
        <div class="form-row">
          <div class="col-md-6 form-group">
              <input type="text" class="form-control" name="pass2" placeholder="New Password" required  />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="pass3" placeholder="Confirm Password" required />
            <div class="validate"></div>
          </div>
        </div>

      <div class="mb-3">

      </div>

      <div class="text-center"><button type="submit" name="submit_update">Update Password</button></div>
    </form>

</div>
</section>
  </body>
</html>
