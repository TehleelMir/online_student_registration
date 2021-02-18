<!-- this file will work both for index page as well as admin login page. -->

<?php
session_start();
include("queries.php");

if(strlen($_SESSION['session_for_admin'])==0){
  header('location: ../illegal_request.php');
}

if(isset($_POST['admin_login_submit'])){
  $username = mysqli_real_escape_string( $db , $_POST['admin_login_username'] );
  $password = mysqli_real_escape_string( $db , $_POST['admin_login_password'] );  //md5 add

  $temp = isAdminVaild($username,$password);
    if($temp == 1){
      $_SESSION['admin_name']=$username;
      header("location: dashboard_for_admin.php");
 }else{
      $message = "Invalid username or password";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Login As Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="style_for_admin_login/css/main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						Sign In As Admin
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="admin_login_username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="admin_login_password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

          <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
						</span>

						<a href="#" class="txt2">
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button name="admin_login_submit" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">

						</span>

						<a href="#" class="txt3">

						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="style_for_admin_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="style_for_admin_login/vendor/animsition/js/animsition.min.js"></script>
	<script src="style_for_admin_login/vendor/bootstrap/js/popper.js"></script>
	<script src="style_for_admin_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="style_for_admin_login/vendor/select2/select2.min.js"></script>
	<script src="style_for_admin_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="style_for_admin_login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="style_for_admin_login/vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
