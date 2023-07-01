<?php include 'header.php';
if (isset($_POST['submit'])) {

	$name=$_POST['name'];

$post_query="INSERT INTO categories(name) 
  VALUES('$name')";
   if(mysqli_query($conn,$post_query)){?>
      <script type="text/javascript">
      alert("Category Added Successfully.");
      window.location.href="";
   </script>
   <?php

   }
	
}
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
						<h4 class="page-title">Add New Category</h4>
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
										<input type="text" class="form-control input-square" name="name" id="squareInput" placeholder="Enter Category name" required>
									</div>

								</div>
								<div class="card-action text-center">
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
							


						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php include 'footer.php'; ?>	