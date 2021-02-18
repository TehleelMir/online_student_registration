<?php
session_start();
include("queries.php");

if(strlen($_SESSION['student_name'])==0){
  header('location: ../illegal_request.php');
}

if(isset($_REQUEST['submit_skill'])){
    $regis = getRegistrationNumber($_SESSION['student_id']);
  addNewSkill($_REQUEST['skill'],$regis);
  header("location: dashboard_for_student.php?course=");
}

  if( strlen( $_REQUEST['course']) != 0){
    $regis = getRegistrationNumber($_SESSION['student_id']);
      $temp = alreadyEnrolled($regis,$_REQUEST['course']);

      if($temp == 1){

    enroll($regis , $_REQUEST['course']);
    $message = "New course enrolled";
    echo "<script type='text/javascript'>alert('$message');</script>";
  header("location: dashboard_for_student.php?course=");
   }
   else{
     $message = "Already Enrolled";
     echo "<script type='text/javascript'>alert('$message');</script>";
       header("location: dashboard_for_student.php?course=");
   }
  }

  if(isset($_REQUEST['submit_pass'])){
    $p = md5( $_POST['pass1'] );
    $temp = isPassVaild($p,$_SESSION['student_id']);
    if($temp == 0){
      $message = "Incorret Password";
      echo "<script type='text/javascript'>alert('$message');</script>";
        header("location: dashboard_for_student.php?course=");
    }

    else if($_POST['pass2'] != $_POST['pass3']){
      $message = "Password Mismatch";
      echo "<script type='text/javascript'>alert('$message');</script>";
        header("location: dashboard_for_student.php?course=");
    }

    else{
      $p2 = md5( $_REQUEST['pass2'] );
    upDatePassword($p2,$_SESSION['student_id']);
    $message = "You Password Updated";
    echo "<script type='text/javascript'>alert('$message');</script>";
      header("location: dashboard_for_student.php?course=");
  }
  }


 ?>

 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
         <meta name="description" content="" />
         <meta name="author" content="" />
         <title>Student Panel</title>
         <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
         <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
         <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
         <link href="style_for_dashboard/css/styles.css" rel="stylesheet" />
     </head>
     <body id="page-top">
         <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
             <a class="navbar-brand js-scroll-trigger" href="#page-top">
                 <span class="d-block d-lg-none">Student</span>
                 <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="style_for_dashboard/assets/img/profile.png" alt="" /></span>
             </a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav">
                     <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Profile</a></li>
                     <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Courses</a></li>
                     <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Enrolled</a></li>
                     <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                     <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Password</a></li>
                     <li class="nav-item"><a class="nav-link js-scroll-trigger" href="session.php">Logout</a></li>

                 </ul>
             </div>
         </nav>
         <div class="container-fluid p-0">
             <section class="resume-section" id="about">
                 <div class="resume-section-content">
                     <h1 class="mb-0">
                         Welcome
                         <span class="text-primary"><?php echo $_SESSION['student_name']; ?></span>
                     </h1>
                     <div class="subheading mb-5">
                       <?php
                       $mail = getMail($_SESSION['student_id']);
                      echo "   <a href='mailto:$mail'>$mail</a> ";
                         ?>
                     </div>
                     <p class="lead mb-5" style='text-transform: capitalize;'><b>Student Name</b><br> <?php echo $_SESSION['student_name'] ?></p>
                     <p class="lead mb-5" style='text-transform: capitalize;'><b>Registration Number</b><br> <?php echo getRegistrationNumber($_SESSION['student_id']); ?></p>
                     <p class="lead mb-5" style='text-transform: capitalize;'><b>Semester</b><br> <?php echo getSemester($_SESSION['student_id']); ?></p>
                     <p class="lead mb-5"style='text-transform: capitalize;'><b>Department</b><br> <?php echo getDepartment($_SESSION['student_id']); ?></p>
                     <p class="lead mb-5"style='text-transform: capitalize;'><b>Geneder</b><br> <?php echo getGeneder($_SESSION['student_id']); ?></p>
                     <p class="lead mb-5"style='text-transform: capitalize;'><b>Address</b><br> <?php echo getAdress($_SESSION['student_id']); ?></p>


                 </div>
             </section>
             <hr class="m-0" />
             <section class="resume-section" id="experience">
                 <div class="resume-section-content">
                     <h2 class="mb-5">Courses Available</h2>

                     <?php
                     $arr = getAllCourse();
                     while($row=mysqli_fetch_assoc($arr)){

                  echo"<div class='d-flex flex-column flex-md-row justify-content-between mb-5'>";
                    echo"<div class='flex-grow-1'>";
                        echo"<h3 class='mb-0'>".$row['name']."</h3>";
                        $course = $row['name'];
                        echo "<p>".$row['description']."</p>";

                            echo"<div class='subheading mb-3'><a href='dashboard_for_student.php?course=$course'>enroll</a></div>";
                             echo"</div>";
                     echo"</div>";
                    }
                    ?>

                 </div>
             </section>
             <hr class="m-0" />
             <section class="resume-section" id="education">
                 <div class="resume-section-content">
                     <h2 class="mb-5">Courses Enrolled By You</h2>
                     <ul class="fa-ul mb-0">
                       <?php
                       $regis = getRegistrationNumber($_SESSION['student_id']);
                       $result = getAllEnrolledCourses($regis);
                       while($row = mysqli_fetch_assoc($result)){
                         echo "<li>";
                             echo "<span class='fa-li' ><i class='fas fa-check'></i></span>";
                             echo "<p style='text-transform: capitalize;'>".$row['course_name']."</p>";
                         echo "</li>";
                       }
                         ?>
                     </ul>

                 </div>
             </section>
             <hr class="m-0" />
             <section class="resume-section" id="skills">
                 <div class="resume-section-content">
                     <h2 class="mb-5">Skills</h2>
                     <div class="subheading mb-3">Add New Skill</div>
                     <form method="post">
                       <input type="text" name="skill" required>
                       <input type="submit" name="submit_skill">
                     </form>
                     <ul class="fa-ul mb-0">
                       <?php
                       $regis = getRegistrationNumber($_SESSION['student_id']);
                       $result = getAllSkill($regis);
                       echo "<br>";
                       while($row = mysqli_fetch_assoc($result)){
                         echo "<li>";
                            echo "<span class='fa-li'><i class='fas fa-trophy text-warning'></i></span>";
                              echo $row['skill'];
                             echo "</li>";
                           }
                             ?>
                     </ul>

                 </div>
             </section>
             <hr class="m-0" />
             <section class="resume-section" id="interests">
               <form method="post">
                  <h3 class="mb-0">Update Password</h3>
                  <input type="text" name="pass2" placeholder="New Password" required><br><br>
                   <input type="text" name="pass3" placeholder="Confirm Password" required><br><br>
                    <input type="text" name="pass1" placeholder="Current password" required><br><br>
                    <input type="submit" name="submit_pass">
               </form>
             </section>
             <hr class="m-0" />

         </div>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
         <script src="style_for_dashboard/js/scripts.js"></script>
     </body>
 </html>
