<?php include 'header.php';
$postid=$_GET['postid'];
if (isset($_POST['submit'])) {

	$question_heading=$_POST['question_heading'];
	$question=$_POST['question'];

	$repost_query1="UPDATE posts set question_heading='$question_heading',content='$question' WHERE post_id='$postid'";
   if(mysqli_query($conn,$repost_query1)){

   	?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

   }
	
}


$query = "SELECT * FROM posts WHERE post_id='$postid'";
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
						<h4 class="page-title">Update Question</h4>
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
									<div class="card-title">Question Details</div>
								</div>
								<div class="card-body">
									<div class="form-group">
									<label for="squareInput">Question Heading</label>
										<input type="" class="form-control" id="question_heading" placeholder="Write Question heading" name="question_heading" value="<?php echo $row['question_heading'];?>">
									</div>


									<div class="form-group">
									<label for="squareInput">Question Description</label>
										<textarea class="form-control mt-1" name="question" id="question" rows="4" placeholder="Write Question here"><?php echo $row['content'];?></textarea>
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