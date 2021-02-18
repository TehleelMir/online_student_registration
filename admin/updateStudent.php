<?php
session_start();
include("queries.php");
if(strlen($_SESSION['admin_name'])==0){
  header('location: ../illegal_request.php');
}
if(isset($_POST['submit_student'])){
  $row = getStudent($_REQUEST['id']);
  $firstPass = $row['password'];
  $pass = $_POST['password'];

  if($firstPass == $_POST['password']){

    updateStudent($_POST['name'],$pass, $_POST['email'], $_POST['registration'] , $_POST['address'] , $_POST['geneder'] , $_POST['semester'] , $_POST['department'] , $_REQUEST['id']);
   }
   else{

     $temp = md5( $pass );
     updateStudent($_POST['name'],$temp, $_POST['email'], $_POST['registration'] , $_POST['address'] , $_POST['geneder'] , $_POST['semester'] , $_POST['department'] , $_REQUEST['id']);
   }

$message = "Student Updated";
echo "<script type='text/javascript'>alert('$message');</script>";
header("location: manage_student.php?del=0");
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


    <section id="contact" class="contact">
      <div class="container">

    <form method="post" class="php-email-form mt-4">
        <h1 class="text-green">Add Student</h1>
  <div class="form-group">
        <div class="form-row">
          <div class="col-md-6 form-group">
            <h5> Name </h5>
            <input type="text" name="name" class="form-control" placeholder="Student name" <?php $row=getStudent($_REQUEST['id']); $temp=$row['name']; echo "value='$temp'" ?>  />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <h5> Email </h5>
            <input type="email" class="form-control" name="email" placeholder="email" <?php $row=getStudent($_REQUEST['id']); $temp=$row['email']; echo "value='$temp'" ?>  />
            <div class="validate"></div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 form-group">
            <h5> Password </h5>
            <input type="password" name="password" class="form-control" placeholder="password"  <?php $row=getStudent($_REQUEST['id']); $temp=$row['password']; echo "value='$temp'" ?>/>
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <h5> Registration Number </h5>
            <input type="text" class="form-control" name="registration" placeholder="Registration Number"  <?php $row=getStudent($_REQUEST['id']); $temp=$row['registration_number']; echo "value='$temp'" ?> />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 form-group">
            <h5> Address </h5>
            <input type="text" name="address" class="form-control" placeholder="address" <?php $row=getStudent($_REQUEST['id']); $temp=$row['adress']; echo "value='$temp'" ?> />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <h5> Geneder </h5>
            <input type="text" name="geneder" class="form-control" placeholder="Geneder"  <?php $row=getStudent($_REQUEST['id']); $temp=$row['gender']; echo "value='$temp'" ?>/>
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <h5> Semester </h5>
            <input type="text" name="semester" class="form-control" placeholder="Semester" <?php $row=getStudent($_REQUEST['id']); $temp=$row['semester']; echo "value='$temp'" ?> />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <h5> Department </h5>
            <input type="text" class="form-control" name="department" placeholder="Department"  <?php $row=getStudent($_REQUEST['id']); $temp=$row['department']; echo "value='$temp'" ?>/>
            <div class="validate"></div>
          </div>
        </div>

      <div class="text-center"><button type="submit" name="submit_student">Update Student</button></div>

    </form>
</div>
</section>

  </body>
</html>
