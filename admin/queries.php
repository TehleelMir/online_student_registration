<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "osr_db";

$db = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName) or die("error occured in querys.php file line 8");


function isAdminVaild($username , $password){
  global $db;
  $query = "SELECT * FROM admin WHERE name='$username' and password='$password'" or die("error occured on line 12");
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  if(is_array($row) && !empty($row)){
    return 1;
 }else{
    return 0;
      }
}

function isPassVaild($password){
  global $db;
  $query = "SELECT * FROM admin WHERE id='1' " or die("error occured on line 12");
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  if(is_array($row) && !empty($row)){
    if($password == $row['password']){
      return 1;
    }else
    return 0;
 }
}


function addDepartment($departmentName,$description){
  global $db;
  $query = "INSERT INTO department (department_name, description) VALUE('$departmentName','$description')" or die("error on line 25, query admin");
  mysqli_query($db,$query) or die("error on line 26, query file admin");
}

function getAllDepartments(){
  global $db;
  $query = "SELECT * FROM department" or die("error on line 31 queries file admin");
  $arr = mysqli_query($db,$query);
  return $arr;
}

function deleteDepartment($id){
  global $db;
  $query = "DELETE FROM department WHERE id='$id'" or die("erron on line 38 queries admin");
  mysqli_query($db,$query);
}

function addCourse($courseName,$units,$seats,$description){
  global $db;
  $query = "INSERT INTO course (name,units,seats,description) VALUE('$courseName','$units','$seats','$description')" or die("error on line 44, query admin");
  mysqli_query($db,$query) or die("error on line 45, query file admin");
}

function getAllCourse(){
  global $db;
  $query = "SELECT * FROM course" or die("error on line 50 queries file admin");
  $arr = mysqli_query($db,$query);
  return $arr;
}

function deleteCourse($id){
  global $db;
  $query = "DELETE FROM course WHERE id='$id'" or die("erron on line 57 queries admin");
  mysqli_query($db,$query);
}

function addSemester($name){
  global $db;
  $query = "INSERT INTO semester (name) VALUE('$name')" or die("error on line 44, query admin");
  mysqli_query($db,$query) or die("error on line 45, query file admin");
}

function getAllSemesters(){
  global $db;
  $query = "SELECT * FROM semester" or die("error on line 50 queries file admin");
  $arr = mysqli_query($db,$query);
  return $arr;
}

function deleteSemester($id){
  global $db;
  $query = "DELETE FROM semester WHERE id='$id'" or die("erron on line 57 queries admin");
  mysqli_query($db,$query);
}

//students

function addStudent($name,$password,$email,$registration,$address,$geneder,$semester,$department){
  global $db;
  $query = "INSERT INTO students (name,password,email,registration_number,adress,gender,semester,department) VALUE('$name','$password','$email',$registration,'$address','$geneder','$semester','$department')" or die("error on line 44, query admin");
  mysqli_query($db,$query) or die("error on line 45, query file admin");
}
function updateStudent($name,$password,$email,$registration,$address,$geneder,$semester,$department,$id){
  global $db;
  $query = "UPDATE students SET name='$name', password='$password',email='$email',registration_number='$registration',adress='$address',gender='$geneder',semester='$semester',department='$department' WHERE students.id='$id'" or die("error on line 44, query admin");
  mysqli_query($db,$query) or die("error on line 45, query file admin");
  $query = "UPDATE admin SET password= '$password' WHERE admin.id=1";
}

function getAllStudents(){
  global $db;
  $query = "SELECT * FROM students" or die("error on line 50 queries file admin");
  $arr = mysqli_query($db,$query);
  return $arr;
}

function deleteStudent($id){
  global $db;
  $query = "DELETE FROM students WHERE id='$id'" or die("erron on line 57 queries admin");
  mysqli_query($db,$query);
}

function upDatePassword($password){
  global $db;
  $query = "UPDATE admin SET password= '$password' WHERE admin.id=1";
  mysqli_query($db,$query);
}

function getEmail($id){
  global $db;
  $query = "SELECT * FROM students WHERE id='$id'" or die("error on line 123");
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  if(is_array($row) && !empty($row)){
    return $row['email'];
 }
}

function getStudent($id){
   global $db;
   $query = "SELECT * FROM students WHERE id='$id'" or die("erron on line 31");
   $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);
   return $row;
}
 ?>
