<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "osr_db";

$db = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName) or die("error occured in querys.php file line 8");

function isStudentVaild($username , $password){
  global $db;
  $query = "SELECT * FROM students WHERE name='$username' and password='$password'" or die("error occured on line 12");
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  if(is_array($row) && !empty($row)){
    return 1;
 }else{
    return 0;
      }
}

function getAllCourse(){
  global $db;
  $query = "SELECT * FROM course" or die("error on line 50 queries file admin");
  $arr = mysqli_query($db,$query);
  return $arr;
}

function getStudentId($name,$pass){
   global $db;
   $query = "SELECT * FROM students WHERE name='$name' and password='$pass'" or die("erron on line 31");
   $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);
   if(is_array($row) && !empty($row)){
     return $row['id'];
   }
}

function getRegistrationNumber($id){
   global $db;
   $query = "SELECT * FROM students WHERE id='$id' "or die("erron on line 41");
   $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);
   if(is_array($row) && !empty($row)){
     return $row['registration_number'];
   }
}

function enroll($regis,$course){
   global $db;
   $query = "INSERT INTO courseenrolled (registration_number,course_name) VALUE('$regis','$course')" or die("erron on line 51");
   mysqli_query($db,$query) or die("erron on line 52");
   }

function alreadyEnrolled($regis,$course){
   global $db;
   $query = "SELECT * FROM courseenrolled WHERE registration_number='$regis' and course_name='$course'" or die("erron on line 57");
   $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);
   if(is_array($row) && !empty($row)){
     return 0;
   }
   else return 1;
}

function getAllEnrolledCourses($regis){
   global $db;
   $query = "SELECT * FROM courseenrolled WHERE registration_number='$regis'" or die("erron on line 57");
   return mysqli_query($db,$query);
}

function addNewSkill($skill,$r){
   global $db;
   $query = "INSERT INTO skills (registration_number,skill) VALUE('$r','$skill')" or die("erron on line 51");
   mysqli_query($db,$query) or die("erron on line 75");
   }

   function getAllSkill($r){
      global $db;
      $query = "SELECT * FROM skills WHERE registration_number='$r'" or die("erron on line 80");
      return mysqli_query($db,$query);
      }

      function isPassVaild($password,$id){
        global $db;
        $query = "SELECT * FROM students WHERE id='$id' " or die("error occured on line 12");
        $result = mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($result);
        if(is_array($row) && !empty($row)){
          if($password == $row['password']){
            return 1;
          }else
          return 0;
       }
      }

      function upDatePassword($password,$id){
        global $db;
        $query = "UPDATE students SET password= '$password' WHERE students.id='$id'";
        mysqli_query($db,$query);
      }

      function getMail($id){
         global $db;
         $query = "SELECT * FROM students WHERE id='$id'" or die("erron on line 57");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_assoc($result);
         if(is_array($row) && !empty($row)){
           return $row['email'];
        }
      }

      function getAdress($id){
         global $db;
         $query = "SELECT * FROM students WHERE id='$id'" or die("erron on line 57");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_assoc($result);
         if(is_array($row) && !empty($row)){
           return $row['adress'];
        }
      }
      function getSemester($id){
         global $db;
         $query = "SELECT * FROM students WHERE id='$id'" or die("erron on line 57");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_assoc($result);
         if(is_array($row) && !empty($row)){
           return $row['semester'];
        }
      }
      function getDepartment($id){
         global $db;
         $query = "SELECT * FROM students WHERE id='$id'" or die("erron on line 57");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_assoc($result);
         if(is_array($row) && !empty($row)){
           return $row['department'];
        }
      }
      function getGeneder($id){
         global $db;
         $query = "SELECT * FROM students WHERE id='$id'" or die("erron on line 57");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_assoc($result);
         if(is_array($row) && !empty($row)){
           return $row['gender'];
        }
      }
 ?>
