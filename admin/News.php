<?php include 'header.php'; ?>

<?php
if (isset($_POST['delete'])) {
 $del_id=$_POST['del_id'];

 $query="DELETE FROM news WHERE id='$del_id'";
 if(mysqli_query($conn, $query)){
  ?>
  <script type="text/javascript">
    alert("A News has been delete successfully.");
    window.location.href = "";
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
               <h4 class="page-title">News</h4>
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
                     <a href="#">All News</a>
                  </li>
               </ul>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">All News</h4>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="basic-datatables" class="display table table-striped table-hover" >
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Tittle</th>
                                    <th>Category</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                   <?php
                   $query = "SELECT * FROM news ORDER BY id DESC";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>
                        <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><?php echo $row['tittle'];?></td>
                           <td><?php 
                        $category=$row['category'];
                      $query1 = "SELECT * FROM categories WHERE id='$category'";
                      $result1 = mysqli_query($conn, $query1);  
                      $row1 = mysqli_fetch_array($result1);
                      echo $row1['name']; ?></td>
                           <td><?php echo $row['detail'];?></td>
                           <td>
                              <form action="" method="POST" onsubmit="return confirm('Are u sure you want to delete this news.?');" style="display: inline;">
                                 <input type="hidden" value="<?php echo $row['id'];?>" name="del_id">
                                 <button class="btn btn-danger btn-sm" type="submit" name="delete">Delete</button>
                              </form>

                              <a href="Edit-News.php?id=<?php echo $row['id'];?>">
                              <button class="btn btn-dark btn-sm">Edit</button>
                              </a>
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