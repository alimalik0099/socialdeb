<?php include 'header.php'; ?>

<?php
if (isset($_POST['delete'])) {
 $del_id=$_POST['del_id'];
 $word=$_POST['word'];

 $query="DELETE FROM trend WHERE id='$del_id'";
 if(mysqli_query($conn, $query)){

 $update="UPDATE posts SET trending_check='No',trending_word='' WHERE trending_word='$word'";
 if(mysqli_query($conn, $update)){
  ?>
  <script type="text/javascript">
    alert("A Trend has been delete successfully.");
    window.location.href = "";
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
               <h4 class="page-title">Trends</h4>
               <ul class="breadcrumbs">
                  <li class="nav-home">
                     <a href="#">
                     <i class="flaticon-home"></i>
                     </a>
                  </li>
                  <li class="separator">
                     <i class="flaticon-right-arrow"></i>
                  </li>
                  <li class="nav-item">
                     <a href="#">All Trends</a>
                  </li>
               </ul>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">All Trends</h4>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="basic-datatables" class="display table table-striped table-hover" >
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Trending Word</th>
                                    <th>Count</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                   <?php
                   $query = "SELECT * FROM trend ORDER BY id DESC";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>
                        <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><?php echo $row['word'];?></td>
                           <td><?php echo $row['count'];?></td>
                           <td>
                           	<form action="" method="POST" onsubmit="return confirm('Are u sure you want to delete this user.?');" style="display: inline;">
                           		<input type="hidden" value="<?php echo $row['id'];?>" name="del_id">

                                 <input type="hidden" value="<?php echo $row['word'];?>" name="word">
                           		<button class="btn btn-danger btn-sm" type="submit" name="delete">Delete</button>
                           	</form>
                           </td>
                        </tr>
                    <?php 
                    }
                    }
                    ?>             
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php include 'footer.php'; ?>	
   <script >
      $(document).ready(function() {
      	$('#basic-datatables').DataTable({
      	});
      });			
   </script>