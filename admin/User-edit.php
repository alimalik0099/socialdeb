<?php include 'header.php';
$userid=$_GET['userid'];
if (isset($_POST['submit'])) {

	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$repost_query1="UPDATE users set name='$name',contact='$phone',email='$email',password='$password' WHERE user_id='$userid'";
   if(mysqli_query($conn,$repost_query1)){

   	?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

   }
	
}


$query = "SELECT * FROM users WHERE user_id='$userid'";
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
						<h4 class="page-title">Update User</h4>
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
									<div class="card-title">User Details</div>
								</div>
								<div class="card-body">
									<div class="form-group">
									<label for="squareInput">User Name</label>
										<input type="text" class="form-control input-square" name="name" id="squareInput" placeholder="User name" required value="<?php echo $row['name'];?>">
									</div>


									<div class="form-group">
									<label for="squareInput">User Phone</label>
										<input type="phone" class="form-control input-square" name="phone" id="squareInput" placeholder="User Phone" required value="<?php echo $row['contact'];?>">
									</div>	


									<div class="form-group">
									<label for="squareInput">User Email</label>
										<input type="email" class="form-control input-square" name="email" id="squareInput" placeholder="User Email" required value="<?php echo $row['email'];?>">
									</div>


									<div class="form-group">
									<label for="squareInput">User Password</label>
										<input type="" class="form-control input-square" name="password" id="squareInput" placeholder="User Password" required  value="<?php echo $row['password'];?>">
									</div>	


								</div>
								<div class="card-action text-center">
									<button type="submit" name="submit" class="btn btn-primary">Update</button>
								</div>
							</div>
						</form>
							


						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php include 'footer.php'; ?>	