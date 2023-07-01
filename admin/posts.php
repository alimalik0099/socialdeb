<?php include 'header.php'; ?>

<?php
if (isset($_POST['delete'])) {
 $del_id=$_POST['del_id'];

 $query="DELETE FROM like_post WHERE post_id='$del_id'";
 if(mysqli_query($conn, $query)){

 $query1="DELETE FROM posts WHERE post_id='$del_id'";
 if(mysqli_query($conn, $query1)){
 
 $query2="DELETE FROM post_reply WHERE post_id='$del_id'";
 if(mysqli_query($conn, $query2)){		
  ?>
  <script type="text/javascript">
    alert("A Post has been delete successfully.");
    window.location.href = "";
  </script>

  <?php
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
               <h4 class="page-title">Posts</h4>
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
                     <a href="#">All Posts</a>
                  </li>
               </ul>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">All Posts</h4>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="basic-datatables" class="display table table-striped table-hover" >
                              <thead>
                                 <tr>
                                    <th>User Name</th>
                                    <th>Post Type</th>
                                    <th>Question Heading</th>
                                    <th>Content</th>
                                    <th>Likes</th>
                                    <th>Repost</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                   <?php
                   $query = "SELECT * FROM posts ORDER BY id DESC";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>
                        <tr>
                           <td><?php $user_id=$row['created_user_id'];

                  $query1 = "SELECT * FROM users WHERE user_id='$user_id'";
                  $result1 = mysqli_query($conn, $query1);  
                  $row1 = mysqli_fetch_array($result1);
                  echo $row1['name'];?></td>
                           <td><?php echo $row['type'];?></td>
                           <td><?php echo $question_heading=$row['question_heading'];?></td>
                           <td><?php echo $row['content'];?></td>
                           <td><?php echo $row['likes'];?></td>
                           <td><?php echo $row['reposts'];?></td>
                           <td>
                           	<form action="" method="POST" onsubmit="return confirm('Are u sure you want to delete this post.?');" style="display: inline;">
                           		<input type="hidden" value="<?php echo $row['post_id'];?>" name="del_id">
                           		<button class="btn btn-danger btn-sm" type="submit" name="delete">Delete</button>
                           	</form>

                              <?php if ($question_heading!="") {
                                 ?>
                           <a href="question-edit.php?postid=<?php echo $row['post_id'];?>">
                              <button class="btn btn-dark btn-sm">Edit</button>
                           </a>
                                 <?php
                              }
                              else{
                                 ?>
                           <a href="post-edit.php?postid=<?php echo $row['post_id'];?>">
                              <button class="btn btn-dark btn-sm">Edit</button>
                           </a>
                                 <?php
                              }
                              ?>
                           	
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