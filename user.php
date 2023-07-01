<?php include 'header.php';?>
<?php
   if (isset($_GET['user-id'])) {
     $view_user_id=$_GET['user-id'];
     if ($user_session=="yes") {
     }
     else{
       $user_id=0;
   }
   if ($user_id==$view_user_id) {
     header('Location: Profile.php');
   }
   else{
      $query = "SELECT * FROM users WHERE user_id='$view_user_id'";
      $result= mysqli_query($conn, $query);  
      if ($result->num_rows < 1) {
       header('Location: index.php');
   }
   } 
   }
   else{
       header('Location: index.php');
   }
   
   
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
?>  
<style>
   @media screen and (max-width: 990px) {
   #search-bar {
   width: 90vw !important;
   }  
   }
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
<body>
   <?php include 'navbar.php';?>
   <?php
      $query = "SELECT * FROM users WHERE user_id='$view_user_id'";
      $result = mysqli_query($conn, $query);  
      if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result);
         ?>
   <div class="container-fluid py-3 my-4">
      <div class="row">
         <div class="col-md-3">
            <div class="card py-3 mb-3 position-relative" style="background-color:rgb(223, 178,
               240); ">
               <!-- <h4> <span type="button" class="badge bg-primary mx-2 position-absolute end-0">Follow</span> -->
               <?php if ($user_session=="yes") {
                  if ($view_user_id!=$user_id) { 
                  
                      $query_follow = "SELECT * FROM followers WHERE user_one='$view_user_id' AND user_two='$user_id' OR user_one='$user_id' AND user_two='$view_user_id'";
                      $result_follow = mysqli_query($conn, $query_follow);  
                      if ($result_follow->num_rows < 1) {
                        ?>
               <form action="" method="POST">
                  <input type="hidden" value="<?php echo $view_user_id;?>" name="follow_id">
                  <button type="submit" name="follow_btn" class="btn btn-primary mx-2 position-absolute end-0" >Follow</button> 
               </form>
               <?php } else{
                  ?>
               <form action="" method="POST">
                  <input type="hidden" value="<?php echo $view_user_id;?>" name="follow_id">
                  <button type="submit" name="unfollow_btn" class="btn btn-danger mx-2 position-absolute end-0" >Unfollow</button> 
               </form>
               <?php
                  } } }?>
               </h4>
               <div class="d-flex flex-column justify-content-center align-items-center">
                  <?php 
                     echo '<img style="clip-path: circle(31.2% at 46% 43%); width:525px;height:300px" class="img-fluid" alt="" src="data:image/jpeg;base64,'.base64_encode($row['profile']).'"/>';
                     ?>
                  <h3><?php echo $row['name'];?></h3>
                  
                  <div class="d-flex justify-content-center align-items-center px-3" >
                     <p class="text-center " ><?php echo $row['bio'];?></p>
                  </div>
                  <div >
                     <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-envelope me-2" viewBox="0 0 16 16">
                           <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        <span><?php echo $row['email'];?></span>
                     </p>
                     <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-telephone-inbound me-2" viewBox="0 0 16 16">
                           <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        </svg> <span><?php echo $row['contact'];?></span>
                     </p>
                  </div>
                  <div>
                     <a href="Chat-Box.php?user-id=<?php echo $row['user_id'];?>"><button type="button" class="btn btn-primary" style="padding: 4px;">Message</button> </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-5">
<?php             
$query = "SELECT * FROM posts WHERE created_user_id='$view_user_id' ORDER BY id DESC";
$result = mysqli_query($conn, $query);  
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_array($result))  
{

   $created_user_id=$row['created_user_id'];

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
   </div>
   <?php } ?>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
   <script>
      document.getElementById('msgarea').style.display = "none";
      function askQuestion()
      {
          document.getElementById('post-btn').classList.remove("bg-primary");
          document.getElementById('post-btn').classList.remove("text-white");
      
      
          document.getElementById('msgarea').style.display = "block";
          document.getElementById('quesbtn').classList.add("bg-primary");
          document.getElementById('quesbtn').classList.add("text-white");
      
          document.getElementById('postarea').style.display = "none";
          document.getElementById('toggle-button').innerText = "Send Question"
      }
      function sharePost()
      {
          document.getElementById('post-btn').classList.add("bg-primary");
          document.getElementById('post-btn').classList.add("text-white");
      
      
          document.getElementById('msgarea').style.display = "none";
          document.getElementById('quesbtn').classList.remove("bg-primary");
          document.getElementById('quesbtn').classList.remove("text-white");
      
          document.getElementById('postarea').style.display = "block";
          document.getElementById('toggle-button').innerText = "Post Publish"
      }
   </script>
</body>
</html>