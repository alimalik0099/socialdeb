<?php include 'header.php';
$word=$_GET['word'];
?>
   <body>
      <?php include 'navbar.php';?>
      <div class="container-fluid py-3">
         <h3> <span class="badge bg-secondary px-5">Timeline</span></h3>
         <div class="row">
          <?php include 'Follow-Group-Left.php';?>
            <div class="col-md-5">
              
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
$query = "SELECT * FROM posts WHERE trending_word='$word' AND trending_check='Yes' ORDER BY id DESC";
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

   #time_linecard:hover{
      cursor: pointer;
      background-color: #DC3545;
      color: white;
   }

   #time_linecard:hover #user_name{
      color: white;
   }

</style>
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
   <?php
   if ($row['type']=="Question") { ?>
   <h2><?php echo $row['question_heading'];?></h2>
   <?php 
}?>
   <p><?php $content=$row['content'];
   $content_count=strlen($content);

   if ($content_count>150) {
   echo substr($content,0,150).'... <b>Read More</b>';
  }
  else{
   echo $content;
  }

?></p>

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
   if ($row['type']=="Question") { ?>
   <div class="right">
      <button class="btn btn-primary"> Reply</button>
   </div>
<?php } ?>
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
         <?php include 'trends.php';?>
      </div>
 
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
         crossorigin="anonymous"></script>
  

   </body>
</html>