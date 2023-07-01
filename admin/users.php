<?php include 'header.php'; ?>



<?php
if (isset($_POST['tick_btn'])) {
 $tick_untick_id=$_POST['tick_untick_id'];

 $repost_query1="UPDATE users set blue_tick='Tick' WHERE user_id='$tick_untick_id'";
   if(mysqli_query($conn,$repost_query1)){

      ?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

   }

}
?>

<?php
if (isset($_POST['untick_btn'])) {
 $tick_untick_id=$_POST['tick_untick_id'];

 $repost_query1="UPDATE users set blue_tick='Untick' WHERE user_id='$tick_untick_id'";
   if(mysqli_query($conn,$repost_query1)){

      ?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

   }

}
?>
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
               <h4 class="page-title">Users</h4>
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
                     <a href="#">All Users</a>
                  </li>
               </ul>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">All Users</h4>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="basic-datatables" class="display table table-striped table-hover" >
                              <thead>
                                 <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Bio</th>
                                    <th>Blue Tick/Untick</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                   <?php
                   $query = "SELECT * FROM users ORDER BY id DESC";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>
                        <tr>
                           <td><?php echo $row['user_id'];?></td>
                           <td><?php echo $row['name'];?></td>
                           <td><?php echo $row['contact'];?></td>
                           <td><?php echo $row['email'];?></td>
                           <td><?php echo $row['password'];?></td>
                           <td><?php echo $row['bio'];?></td>
                           <td><?php echo $blue_tick=$row['blue_tick'];
                           if ($blue_tick=="Untick") {
                           ?><br>
                        <form action="" method="POST"style="display: inline;">
                        <input type="hidden" value="<?php echo $row['user_id'];?>" name="tick_untick_id">
                        <button class="btn btn-danger btn-sm" type="submit" name="tick_btn">Click For Tick</button>
                        </form>

                           <?php
                           }
                           else{
                              ?>

                        <form action="" method="POST"style="display: inline;">
                        <input type="hidden" value="<?php echo $row['user_id'];?>" name="tick_untick_id">
                        <button class="btn btn-danger btn-sm" type="submit" name="untick_btn">Click For Untick</button>
                        </form>

                              <?php
                           }
                        ?></td>
                           <td>
                           	<form action="" method="POST" onsubmit="return confirm('Are u sure you want to delete this user.?');" style="display: inline;">
                           		<input type="hidden" value="<?php echo $row['user_id'];?>" name="del_id">
                           		<button class="btn btn-danger btn-sm" type="submit" name="delete">Delete</button>
                           	</form>
                           	<a href="User-edit.php?userid=<?php echo $row['user_id'];?>">
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