<!-- this file will work both for index page as well as student login page. -->
<?php
session_start();
include("queries.php");

if(strlen($_SESSION['session_for_student'])==0){
  header('location: ../illegal_request.php');
}

if(isset($_POST['student_login_submit'])){
  $username = mysqli_real_escape_string( $db , $_POST['student_login_username'] );
  $password = md5( mysqli_real_escape_string( $db , $_POST['student_login_password'] )  );  //md5 add

  $temp = isStudentVaild($username,$password);
    if($temp == 1){
      $id = getStudentId($username,$password);
      $_SESSION['student_id']=$id;
      $_SESSION['student_name']=$username;
      header("location: dashboard_for_student.php?course=");
 }else{
      $message = "Invalid username or password";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Login As student</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style_for_login/style_for_login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="style_for_login/css/main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In As a student
					</span>
				</div>

				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="student_login_username" placeholder="Enter username" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="student_login_password" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

					</div>

					<div class="container-login100-form-btn">
						<button name="student_login_submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
