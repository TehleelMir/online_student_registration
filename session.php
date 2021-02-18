<?php
session_start();

if($_REQUEST['value']==1){
  $_SESSION['session_for_admin']="yes";
  header("location: admin/index.php");
}

if($_REQUEST['value']==2){
  $_SESSION['session_for_student']="yes";
  header("location: student/index.php");
}


 ?>
