<?php
session_start();
if(strlen($_SESSION['admin_name'])==0){
  header('location: ../illegal_request.php');
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin panel</title>


    <style>
.row {
   display: flex;
   flex-wrap: wrap;
}

.row > div[class*='col-'] {
  display: flex;
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
    bottom: 0px;
    width: 100%;
}

body {
background-image: url('images/background_for_dashboard_admin.jpg');
background-repeat: no-repeat;
background-size:cover;
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
            <h1 class="text-light"><a href="#"><span>Admin Panel</span></a></h1>
          </div>

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="dashboard_for_admin.php">Profile</a></li>
              <li><a href="department.php?del=0">Department</a></li>
              <li><a href="semester.php?del=0">Semester</a></li>
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
<br><br><br>
    <section id="about" class="about">
      <div class="container">
        <div class="row">


                      <div class="col-sm-3">
                          <div class="card">
                              <img class="card-img-top img-fluid" src="images/bg-01.jpg" alt="Card image cap"><br>
                              <div class="card-block">
                                  <h4 class="card-title">Hello <?php echo $_SESSION['admin_name'] ?></h4>
                                  <p style="text-align: justify; padding: 15px; " class="card-text">As an admin you can register a new student and also can add several
                                  new fields like new departement or another semester.</p><br>
                                  <p class="card-text"><small class="text-muted">Follow the navigation bar to explore more</small></p>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-3">
                          <div class="card">
                              <img class="card-img-top img-fluid" src="images/hyo.jpg" alt="Card image cap"><br>
                              <div class="card-block">
                                <h4 class="card-title">Student</h4>
                          <p style="text-align: justify; padding: 15px;"  class="card-text">You can choose and update particular student in manage-student section, you can either update them to a new Semester
                          or a new department or both</p>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-3">
                          <div class="card">
                              <img class="card-img-top img-fluid" src="images/third.jpg" alt="Card image cap"><br>
                              <div class="card-block">
                                <h4 class="card-title">Caution</h4>
                          <p style="text-align: justify; padding: 15px;"  class="card-text">While removing/deleting a semester or a courses, students who are
                            enrolled with that will be marked as pednding-intents</p>
                              </div>
                          </div>
                      </div>


        </div>
    </div>

    </section>
    <footer id="footer">
      <div class="container d-md-flex py-4">
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="../coming_soon.php" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="../coming_soon.php" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="../coming_soon.php" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="../coming_soon.php" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="../coming_soon.php" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </footer>



  </body>
</html>
