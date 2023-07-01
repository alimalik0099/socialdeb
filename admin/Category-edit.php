<?php include 'header.php';
$catid=$_GET['catid'];
if (isset($_POST['submit'])) {

	$name=$_POST['name'];

	$repost_query1="UPDATE categories set name='$name' WHERE id='$catid'";
   if(mysqli_query($conn,$repost_query1)){
   	?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

   }
	
}


$query = "SELECT * FROM categories WHERE id='$catid'";
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
						<h4 class="page-title">Update Category</h4>
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
									<div class="card-title">Category Details</div>
								</div>
								<div class="card-body">
									<div class="form-group">
									<label for="squareInput">Category Name</label>
										<input type="text" class="form-control input-square" name="name" id="squareInput" placeholder="Category name" required value="<?php echo $row['name'];?>">
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