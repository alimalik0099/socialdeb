<?php include 'header.php';

if(isset($_POST['follow_btn'])){
  $follow_id=$_POST['follow_id'];
  $sql_follow="INSERT INTO followers(user_one,user_two) 
  VALUES('$user_id','$follow_id')";
  mysqli_query($conn,$sql_follow);
  ?>
 <script type="text/javascript">
   window.location.href="";
 </script>
<?php
}

?>
<body>
    <?php include 'navbar.php';?>



 <div class="container py-3">
    <h3>
    <span class="badge bg-secondary px-5">Message</span></h3>
<div class="row">

<div class="col-md-4">
<div class="card pt-3" style="background-color:rgb(223, 178,240);">
<h3>
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
    <a href="Chat-Box.php?user-id=<?php echo $created_user_id;?>"><button type="button" class="btn btn-primary btn-sm" style="padding: 4px;">Message</button> </a>
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
</div>
<div class="col-md-8">
<div class="rounded p-3 border-1 mb-4" style="background-color: rgb(223,232, 240);">
 

    <div id="msgarea" class="my-3">
        <h4 class="my-3">Follow to user and then click to Message Button for Chat.</h4>
    </div>


    </div>
</div>
</div>
</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>


</body>
</html>