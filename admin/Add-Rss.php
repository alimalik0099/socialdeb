<?php include 'header.php';
if (isset($_POST['submit'])) {

	$link=$_POST['link'];
	$sql1="INSERT INTO rss(link) 
  VALUES('$link')";
   if(mysqli_query($conn,$sql1)){

   	?>
 <script type="text/javascript">
   alert('Add New RSS News Added Successfully.');
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
						<h4 class="page-title">Add RSS News</h4>
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
							<form action="" method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">RSS Details</div>
								</div>
								<div class="card-body">

								<div class="form-group">
									<label for="squareInput">News RSS Link</label>
									<input class="form-control" required placeholder="Enter RSS Link" name="link">
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