<?php include 'header.php';
$id=$_GET['id'];
if (isset($_POST['submit'])) {

	$tittle=$_POST['tittle'];
	$category=$_POST['category'];
	$detail=$_POST['detail'];

	$repost_query1="UPDATE news set tittle='$tittle',category='$category',detail='$detail' WHERE id='$id'";
   if(mysqli_query($conn,$repost_query1)){
   	?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

   }
	
}


$query = "SELECT * FROM news WHERE id='$id'";
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
						<h4 class="page-title">Update News</h4>
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
									<div class="card-title">News Details</div>
								</div>
								<div class="card-body">
								<div class="form-group">
									<label for="squareInput">News Tittle</label>
										<input type="text" class="form-control input-square" name="tittle" id="squareInput" placeholder="Enter News Tittle" required value="<?php echo $row['tittle'];?>">
								</div>

								<div class="form-group">
									<label for="squareInput">News Category</label>

							  <select required class="form-control" name="category" required>
                      <option value="<?php echo $row['category'];?>"><?php $category=$row['category'];
                      $query1 = "SELECT * FROM categories WHERE id='$category'";
                      $result1 = mysqli_query($conn, $query1);  
                      $row1 = mysqli_fetch_array($result1);
                      echo $row1['name']; ?></option>
                      <option value="">Select News Category</option>
						<?php
                   $query2 = "SELECT * FROM categories ORDER BY id DESC";
                   $result2 = mysqli_query($conn, $query2);  
                   if ($result2->num_rows > 0) {
                    while($row2 = mysqli_fetch_array($result2))  
                    {
                      ?>
                      <option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option>
                      <?php 
                   }
                }
                ?>
             </select>
				</div>

								<div class="form-group">
									<label for="squareInput">News Detail</label>
										<textarea class="form-control" required placeholder="Enter News Detail/Description" rows="5" name="detail"><?php echo $row['detail'];?></textarea>
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