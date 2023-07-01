<?php include 'header.php';

$get_post_id=$_GET['post-id'];



if (isset($_POST['reply_btn'])) {
    if ($user_session=="yes") {
    
    $reply_post_id=$_POST['reply_post_id'];
    $reply=$_POST['reply'];

   $reply_query="INSERT INTO post_reply(post_id,user_id,reply) 
  VALUES('$reply_post_id','$user_id','$reply')";
   mysqli_query($conn,$reply_query);

   ?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

}
else{
    ?>
   <script type="text/javascript">
      window.location.href="login.php";
   </script>
   <?php
}
}


if (isset($_POST['del_btn'])) {
    // code...
    $del_id=$_POST['del_id'];
    $trend_word_trace=$_POST['trend_word_trace'];

$query = "SELECT * FROM posts WHERE post_id='$del_id' AND created_user_id='$user_id'";
$result = mysqli_query($conn, $query);  
if ($result->num_rows > 0) {
{
    $del_post="DELETE FROM posts WHERE post_id='$del_id' AND created_user_id='$user_id'";
    mysqli_query($conn,$del_post);

    $del_post1="DELETE FROM like_post WHERE post_id='$del_id'";
    mysqli_query($conn,$del_post1);
    if ($trend_word_trace!="") {
      $update_trendq="UPDATE trend SET count=count-1 WHERE word='$trend_word_trace'";
    mysqli_query($conn,$update_trendq);

    }
   ?>
   <script type="text/javascript">
      window.location.href="index.php";
   </script>
   <?php
}

}
}
?>
   <body>
      <?php include 'navbar.php';?>
      <div class="container-fluid py-3">
         <div class="row">
            <div class="col-md-12">
              
              <?php
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


if(isset($_POST['unfollow_btn'])){
  $follow_id=$_POST['follow_id'];
  $sql_unfollow="DELETE FROM followers WHERE user_one='$follow_id' AND user_two='$user_id' OR user_one='$user_id' AND user_two='$follow_id'";
  mysqli_query($conn,$sql_unfollow);
  ?>
 <script type="text/javascript">
   window.location.href="";
 </script>
<?php
}

if(isset($_POST['repost_btn'])){
  $post_id=$_POST['post_id'];

$repost_user_query = "SELECT * FROM posts WHERE post_id='$post_id'";
$repost_user_result = mysqli_query($conn, $repost_user_query);  
$repost_user_row = mysqli_fetch_array($repost_user_result);

  $repost_question_heading=$repost_user_row['question_heading'];
  $repost_content=$repost_user_row['content'];
  $repost_type=$repost_user_row['type'];
  $trending_word=$repost_user_row['trending_word'];
  $trending_check=$repost_user_row['trending_check'];
  $created_user_id=$repost_user_row['created_user_id'];

  $repost_query1="UPDATE posts set reposts=reposts+1 WHERE post_id='$post_id' AND created_user_id!='$user_id'";
   mysqli_query($conn,$repost_query1);

    $post_id_n=rand(0,1000);

  $repost_query="INSERT INTO posts(post_id,created_user_id,content,likes,reposts,type,question_heading,trending_word,trending_check) 
  VALUES('$post_id_n','$user_id','$repost_content',0,0,'$repost_type','$repost_question_heading','$trending_word','$trending_check')";
   mysqli_query($conn,$repost_query);

   if ($created_user_id!=$user_id AND $trending_check=="Yes") {
   $update_trend="UPDATE trend SET count=count+1 WHERE word='$trending_word'";
   mysqli_query($conn,$update_trend);
   }


   ?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

}

if(isset($_POST['like_btn'])){
  $post_id=$_POST['post_id'];

  $like_query="INSERT INTO like_post(post_id,user_id) 
  VALUES('$post_id','$user_id')";
   mysqli_query($conn,$like_query);

  $like_query1="UPDATE posts set likes=likes+1 WHERE post_id='$post_id'";
   mysqli_query($conn,$like_query1);

   ?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

}


if(isset($_POST['unlike_btn'])){
  $post_id=$_POST['post_id'];

  $like_query="DELETE FROM like_post WHERE post_id='$post_id' AND '$user_id'";
   mysqli_query($conn,$like_query);

  $like_query1="UPDATE posts set likes=likes-1 WHERE post_id='$post_id'";
   mysqli_query($conn,$like_query1);


   ?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php

}
$query = "SELECT * FROM posts WHERE post_id='$get_post_id'";
$result = mysqli_query($conn, $query);  
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_array($result))  
{

   $created_user_id=$row['created_user_id'];

$created_user_query = "SELECT * FROM users WHERE user_id='$created_user_id'";
$created_user_result = mysqli_query($conn, $created_user_query);  
$created_user_row = mysqli_fetch_array($created_user_result);

?> 
<style type="text/css">
   #time_linecard{
     background-color: rgb(223, 232, 240);
   }


</style>
 <div class="rounded p-3 border-1 my-3 px-4" id="time_linecard">
   <div class="d-flex justify-content-between align-items-center p-0">
   <div><a href="user.php?user-id=<?php echo $created_user_id;?>" style="color: black;text-decoration: none;">
      <?php echo '<img  style="clip-path: circle(37.6% at 50% 41%);width:40px;height:40px" alt="" src="data:image/jpeg;base64,'.base64_encode($created_user_row['profile']).'"/>';?>
      <span id="user_name"><?php echo $created_user_row['name'];?></span></a>
   </div>
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
<div>
   <?php
   if ($row['type']=="Question") { ?>
   <h2><?php echo $row['question_heading'];?></h2>
   <?php 
}?>
   <p><?php echo $row['content'];?></p>

<?php if ($row['trending_check']=="Yes") {
   ?>
   <p style="font-weight: bold;"><?php echo'#'.$row['trending_word'];?></p>
   <?php 
}
?>
</div>
<div class="d-flex justify-content-between align-items-center">
   <?php if ($user_session=="yes") { ?>
   <div class="left">

      <form action="" method="POST" style="display: inline;">
      <input type="hidden" value="<?php echo $post_id=$row['post_id'];?>" name="post_id">
   <?php
       $query_like = "SELECT * FROM like_post WHERE post_id='$post_id' AND user_id='$user_id'";
         $result_like = mysqli_query($conn, $query_like);  
          if ($result_like->num_rows < 1) { ?>
      <button class="btn btn-primary" type="submit" name="like_btn"> Like</button>
   <?php }
   else{
      ?>
      <button class="btn btn-dark" type="submit" name="unlike_btn"> Unlike</button>
      <?php
   }
    ?>
      </form>

      <form action="" method="POST" style="display: inline;">
      <input type="hidden" value="<?php echo $row['post_id'];?>" name="post_id">
      <button class="btn btn-primary" type="submit" name="repost_btn"> Repost</button>
      </form>
      

   </div>
<?php }
else{
   ?>
   <div class="left">
      <button onclick="window.location.href='login.php'" class="btn btn-primary"> Like</button>
      <button onclick="window.location.href='login.php'" class="btn btn-primary" name="repost_btn"> Repost</button>
   </div>
   <?php
}

 ?>
   <?php
   if ($user_session=="yes") {
       // code...
   if ($row['created_user_id']==$user_id) { ?>
   <div class="right">
<form action="" method="POST" style="display: inline;" onsubmit="return confirm('Are u sure you want to delete this post.?');">
    <input type="hidden" value="<?php echo $row['trending_word'];?>" name="trend_word_trace">
    <input type="hidden" value="<?php echo $get_post_id;?>" name="del_id">
      <button type="submit" class="btn btn-danger" name="del_btn"> Delete</button>
  </form> 
     
   </div>
<?php } }?>
</div>
</div>

<?php 
}
}
else{
   echo '<b style="text-align:center">No Post Available</b>';
}
?>
            </div>
         </div>
      </div>
 


 <?php 
$query = "SELECT * FROM posts WHERE post_id='$get_post_id' AND question_heading!=''";
$result = mysqli_query($conn, $query);  
if ($result->num_rows > 0) {
?>
<div class="rounded p-3 border-1 my-3 px-4" id="time_linecard">
     <h3>Leave your reply</h3><br>
     <form action="" method="POST">
         <div class="row text-center">
             <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                 <div class="form-group">
                     <input type="" class="form-control" placeholder="Enter your reply" name="reply">
                     <input type="hidden" value="<?php echo $get_post_id;?>" name="reply_post_id">
                 </div>
             </div>

             <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                 <div class="form-group">
                     <button type="submit" class="btn btn-primary mt-1" name="reply_btn">Submit</button>
                 </div>
             </div>
         </div>
     </form>
   </div>

<?php

 $query_reply = "SELECT * FROM post_reply WHERE post_id='$get_post_id' ORDER BY id DESC";
$result_reply = mysqli_query($conn, $query_reply);  
if ($result_reply->num_rows > 0) {
   while($row = mysqli_fetch_array($result_reply)){
  
$created_user_id=$row['user_id'];

$created_user_query = "SELECT * FROM users WHERE user_id='$created_user_id'";
$created_user_result = mysqli_query($conn, $created_user_query);  
$created_user_row = mysqli_fetch_array($created_user_result);

?>
 <div class="rounded p-3 border-1 my-3 px-4" id="time_linecard" onclick="window.location.href='Post-View.php?post-id=<?php echo $row['post_id'];?>'">
   <div class="d-flex justify-content-between align-items-center p-0">
   <div><a href="user.php?user-id=<?php echo $created_user_id;?>" style="color: black;text-decoration: none;">
      <?php echo '<img  style="clip-path: circle(37.6% at 50% 41%);width:40px;height:40px" alt="" src="data:image/jpeg;base64,'.base64_encode($created_user_row['profile']).'"/>';?>
      <span id="user_name"><?php echo $created_user_row['name'];?></span></a>
   </div>
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
<div>
   <p class="ml-4"><?php echo $row['reply'];?></p>
</div>


</div>
<?php 

}

}
}
 ?>
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
         crossorigin="anonymous"></script>
   

   </body>
</html>