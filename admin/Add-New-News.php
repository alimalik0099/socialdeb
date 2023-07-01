<?php include 'header.php';
if (isset($_POST['submit'])) {

	$tittle=$_POST['tittle'];
	$category=$_POST['category'];
	$detail=$_POST['detail'];
	$image = $_FILES["image"];
   $info = getimagesize($image["tmp_name"]);
  if(!$info){
    ?>
    <script type="text/javascript">
      alert('Select valid image');
    </script>
    <?php
  }
  else{
  	$name = $image["name"];
   $type = $image["type"];
   $blob = addslashes(file_get_contents($image["tmp_name"]));

	$sql1="INSERT INTO news(tittle,category,detail,image) 
  VALUES('$tittle','$category','$detail','$blob')";
   if(mysqli_query($conn,$sql1)){

   	?>
 <script type="text/javascript">
   alert('Add New News Added Successfully.');
   window.location.href="";
 </script>
    <?php

   }
	
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
						<h4 class="page-title">Add New News</h4>
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
									<div class="card-title">News Details</div>
								</div>
								<div class="card-body">
									<div class="form-group">
									<label for="squareInput">News Tittle</label>
										<input type="text" class="form-control input-square" name="tittle" id="squareInput" placeholder="Enter News Tittle" required>
									</div>

									<div class="form-group">
									<label for="squareInput">News Category</label>
										<select required class="form-control" name="category" required>
											<option value="">Select News Category</option>
						<?php
                   $query = "SELECT * FROM categories ORDER BY id DESC";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>
                      <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                      <?php 
                   }
                }
                ?>

										</select>
									</div>

								<div class="form-group">
									<label for="squareInput">News Detail</label>
										<textarea class="form-control" required placeholder="Enter News Detail/Description" rows="5" name="detail"></textarea>
								</div>

								<div class="form-group">
									<label for="squareInput">News Image</label>
									<input type="file" class="form-control input-square" name="image" required>
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