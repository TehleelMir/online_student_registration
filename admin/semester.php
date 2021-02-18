<?php
session_start();
include("queries.php");
if(strlen($_SESSION['admin_name'])==0){
  header('location: ../illegal_request.php');
}
if(isset($_POST['submit_semester'])){
  addSemester($_POST['name']);
  $message = "New Semester added";
echo "<script type='text/javascript'>alert('$message');</script>";
header("location: semester.php?del=0");
}

if($_REQUEST['del']==12){
  deleteSemester($_REQUEST['row']);
//   $message = "department deleted";
// echo "<script type='text/javascript'>alert('$message');</script>";
// $_REQUEST['del']=0;
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
              <li class="active" ><a href="semester.php?del=0">Semester</a></li>
              <li><a href="course.php?del=0">Course</a></li>
              <li><a href="manage_student.php?del=0">Manage Student</a></li>
              <li><a href="registration.php">Password</a></li>
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
        <h1 class="text-green">Add Semester</h1>
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Example: 1st Semester" required />

      <div class="mb-3">

      </div>

      <div class="text-center"><button type="submit" name="submit_semester">Add new Semester</button></div>
    </form>


<br>
    <h1 class="text-green">Manage</h1>

  <?php
  $arr = getAllSemesters();
  while($row=mysqli_fetch_assoc($arr)){
  $rowid = $row['id'];
  echo "<div class='info mt-4'>";
  echo "<h5 style='float:left;text-transform: capitalize;'>" . $row['name'] . "</h5>";
  echo "<a style='float:right' href='semester.php?row=$rowid & del=12 '>Delete</a>";
  echo "<br>";
  echo "</div>";
}
  ?>


</div>
</section>

  </body>
</html>
