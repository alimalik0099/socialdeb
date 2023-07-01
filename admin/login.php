<?php
session_start();
include "../db.php";
if(isset($_POST['login'])){
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $loginPassword = mysqli_real_escape_string($conn,$_POST['password']);

 $loginPassword=md5($loginPassword);
 $query_Admin = mysqli_query($conn,"SELECT * FROM admin WHERE email ='$email' AND binary password='$loginPassword'") or die(mysqli_error($query_Admin)); 
 if(mysqli_num_rows($query_Admin)>0){

 $_SESSION['Admin']= 'Admin';
      ?>
<script type="text/javascript">
window.location.href = "index.php";
</script>
<?php
    }
else{
  ?>

<script type="text/javascript">
alert('Please Enter Correct Details.');
window.location.href = "login.php";
</script>
<?php
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign In To Admin</h3>
			<form action="" method="POST">
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input  required id="username" name="email" type="email" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Email</label>
				</div>
				<div class="form-group form-floating-label">
					<input required id="password" name="password" type="password" class="form-control input-border-bottom" required>

					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="form-action mb-3">
					<button name="login" type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
				</div>
			</div>
		</form>
		</div>

	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>
</body>
</html>