
<div class="col-md-3">
<div class="card pt-3" style="background-color:rgb(223, 178,240);">
<h3>
 <span type="button" class="badge bg-secondary mx-4">People</span></h3>
   

<?php
if ($user_session=="yes") {
      $query_follow_r = "SELECT * FROM users WHERE user_id!='$user_id' ORDER BY id DESC LIMIT 5";

   }
   else{
       $query_follow_r = "SELECT * FROM users ORDER BY id LIMIT 5";
   }
      $result_follow_r= mysqli_query($conn, $query_follow_r);  
      if ($result_follow_r->num_rows > 0) {
      while($row_follow_r= mysqli_fetch_array($result_follow_r))  
      { 
         $created_user_id=$row_follow_r['user_id'];
         ?>   
   <div class="d-flex justify-content-around align-items-center p-0">
         <div>
            <a href="user.php?user-id=<?php echo $created_user_id;?>" style="color: black;text-decoration: none;">
             <?php echo '<img class="mt-3"  style="clip-path: circle(35.0% at 48% 34%);width:40px;height:50px" alt="" src="data:image/jpeg;base64,'.base64_encode($row_follow_r['profile']).'"/>';?>
            <span><?php echo $row_follow_r['name'];?></span>
            <?php 
      if ($row_follow_r['blue_tick']=='Tick') {?> 
      <img src="images/blue tick.png" style="width:18px;"alt="">
   <?php } ?>
         </a>
      </div>
         <div>
<?php if ($user_session=="yes") {
    if ($created_user_id!=$user_id) { 

$query_follow = "SELECT * FROM followers WHERE user_one='$created_user_id' AND user_two='$user_id' OR user_one='$user_id' AND user_two='$created_user_id'";
$result_follow = mysqli_query($conn, $query_follow);  
if ($result_follow->num_rows < 1) {
      ?>
   <form action="" method="POST">
    <input type="hidden" value="<?php echo $created_user_id;?>" name="follow_id">
    <button type="submit" name="follow_btn" class="btn btn-success btn-sm" style="padding: 4px;">Follow</button> 
   </form>
<?php } else{
   ?>
    <form action="" method="POST">
    <input type="hidden" value="<?php echo $created_user_id;?>" name="follow_id">
    <button type="submit" name="unfollow_btn" class="btn btn-danger btn-sm" style="padding: 4px;">Unfollow</button> 
   </form>
   <?php
} } }?>
         </div>
      </div>
      <?php 
   }
}
?>
</div>
               <!-- <div class="card pt-3 mt-2"
                  style="background-color:rgb(223, 178,
                  240);">
                  <h3> <span type="button"
                     class="badge
                     bg-secondary mx-4">Groups</span></h3>
                  <div class="d-flex
                     justify-content-around
                     align-items-center p-0">
                     <div>
                        <img src="./images/profile.jpg"
                           class="mt-3"
                           style="clip-path:
                           circle(35.0% at 48% 34%);"
                           alt="">
                        <span>Sports Info</span>
                     </div>
                     <div>
                        <span class="badge
                           bg-danger">Follow</span>
                     </div>
                  </div>
               </div> -->
            </div>