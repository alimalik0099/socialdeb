<?php include 'header.php'; ?>

<?php
if (isset($_POST['delete'])) {
 $del_id=$_POST['del_id'];

 $query="DELETE FROM users WHERE user_id='$del_id'";
 if(mysqli_query($conn, $query)){

 $query1="DELETE FROM followers WHERE user_one='$del_id' OR user_two='$del_id'";
 if(mysqli_query($conn, $query1)){
 
 $query2="DELETE FROM like_post WHERE user_id='$del_id'";
 if(mysqli_query($conn, $query2)){	

 $query3="DELETE FROM posts WHERE created_user_id='$del_id'";
 if(mysqli_query($conn, $query3)){	

 $query4="DELETE FROM post_reply WHERE user_id='$del_id'";
 if(mysqli_query($conn, $query4)){		
  ?>
  <script type="text/javascript">
    alert("A User has been delete successfully.");
    window.location.href = "";
  </script>

  <?php
 }
}
}
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
               <h4 class="page-title">Categories</h4>
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
                     <a href="#">All Categories</a>
                  </li>
               </ul>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">All Categories</h4>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="basic-datatables" class="display table table-striped table-hover" >
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                   <?php
                   $query = "SELECT * FROM categories ORDER BY id DESC";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>
                        <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><?php echo $row['name'];?></td>
                           <td>
                           	<a href="Category-edit.php?catid=<?php echo $row['id'];?>">
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