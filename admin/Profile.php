<?php include 'header.php';
if (isset($_POST['submit'])) {

	$email=$_POST['email'];

	$repost_query1="UPDATE admin set email='$email'";
   if(mysqli_query($conn,$repost_query1)){
   	?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

   }
}

if(isset($_POST['update_password'])){
  
  $old_pass=$_POST['old_pass'];
  $new_pass=$_POST['new_pass'];
  $confirm_pass=$_POST['confirm_pass'];

 $old_pass=md5($old_pass);
  $query_chck_pass = mysqli_query($conn,"SELECT * FROM admin WHERE password='$old_pass'") or die(mysqli_error($conn)); 
if(mysqli_num_rows($query_chck_pass)>0){

    if ($new_pass==$confirm_pass) {
   $new_pass=md5($new_pass);
  $query3="UPDATE admin set password='$new_pass'";
       if(mysqli_query($conn, $query3)){    

       ?>
        <script type="text/javascript">
            alert('Update Successfully.');
            window.location.href='';
        </script>
        <?php    

}
}
else{
?>
<script type="text/javascript">
    alert('Invalid same passwords.'); 
window.location.href='';
</script>
<?php
}
}
else{
?>
<script type="text/javascript">
    alert('Invalid Current password.'); 
window.location.href='';
</script>
<?php
}


}


$query = "SELECT * FROM admin";
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_array($result);

 ?>
<body>
	<div class="wrapper">

		<?php include 'navbar.php'; ?>
		<!-- Sidebar -->

		<?php include 'sidebar.php'; ?>


		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Login Profile</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="" method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Login Email Details</div>
								</div>
								<div class="card-body">
									<div class="form-group">
									<label for="squareInput">Login Email</label>
										<input type="email" class="form-control input-square" name="email" id="squareInput" placeholder="Login Email" required value="<?php echo $row['email'];?>">
									</div>


								</div>
								<div class="card-action text-center">
									<button type="submit" name="submit" class="btn btn-primary">Update</button>
								</div>
							</div>
						</form>
							
						</div>
					</div>



					<div class="row">
						<div class="col-md-12">
							<form action="" method="POST">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Login Password Details</div>
								</div>
								<div class="card-body">
									<div class="form-group">
									<label for="squareInput">Current Password</label>
										<input type="password" class="form-control input-square" name="old_pass" id="squareInput" placeholder="Type current Password" required>
									</div>


									<div class="form-group">
									<label for="squareInput">New Password</label>
										<input type="password" class="form-control input-square" name="new_pass" id="squareInput" placeholder="Type New Password" required>
									</div>

									<div class="form-group">
									<label for="squareInput">Confirm Password</label>
										<input type="password" class="form-control input-square" name="confirm_pass" id="squareInput" placeholder="Type Confirm Password" required>
									</div>


								</div>
								<div class="card-action text-center">
									<button type="submit" name="update_password" class="btn btn-primary">Update</button>
								</div>
							</div>
						</form>
							
						</div>
					</div>
				</div>
			</div>
			
		</div>






		<?php include 'footer.php'; ?>	