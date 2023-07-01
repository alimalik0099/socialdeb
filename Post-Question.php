 <?php
if(isset($_POST['publish_btn'])){
  if ($user_session=="no") {
   ?>
   <script type="text/javascript">
      window.location.href="login.php";
   </script>
   <?php
}
else{
  $question=$_POST['question'];
  $post=$_POST['post'];
  $question_heading=$_POST['question_heading'];
  $post_trending_word=$_POST['post_trending_word'];
  $question_trending_word=$_POST['question_trending_word'];
 
  
  if ($post_trending_word!="" OR $question_trending_word!="") {
    $trend_word="Yes";
  }
  else{
   $trend_word="No";
  }
  $post_id=rand(0,1000);

  if ($post!="") {
   $type="Post";
  $trending_word = str_replace(' ','',$post_trending_word);
  $trending_word=strtolower($trending_word);
  }
  else{
   $type="Question";
   $trending_word = str_replace(' ','',$question_trending_word);
   $trending_word=strtolower($trending_word);
  }
  $content=$post.$question;
 $post_query="INSERT INTO posts(post_id,created_user_id,content,likes,reposts,type,question_heading,trending_check,trending_word) 
  VALUES('$post_id','$user_id','$content',0,0,'$type','$question_heading','$trend_word','$trending_word')";
   mysqli_query($conn,$post_query);

   if ($trending_word!="") {
      
   $query_chk_trending_word = "SELECT * FROM trend WHERE word='$trending_word'";
   $result_chk_trending_word = mysqli_query($conn, $query_chk_trending_word);  
   if ($result_chk_trending_word->num_rows > 0) {
     $update_trend="UPDATE trend SET count=count+1 WHERE word='$trending_word'";
     mysqli_query($conn,$update_trend);
   }
   else{
   $trend_insert="INSERT INTO trend(word,count) 
   VALUES('$trending_word',1)";
   mysqli_query($conn,$trend_insert);
   }
}
   ?>
   <script type="text/javascript">
      window.location.href="";
   </script>
   <?php
  }
}
?>


<div class="rounded p-3 border-1 mb-4" style="background-color: rgb(223,232, 240);">
   <div>
      <button class=" py-2 px-3 bg-primary text-white"  style="border-radius: 34px; border: none ;" id="post-btn" onclick="sharePost()">Post</button>
      <button style="border-radius: 34px; border: none;" id = "quesbtn" class="py-2 px-3" onclick="askQuestion()">Ask Question?</button>
   </div>
<form action="" method="POST">
   <div id="msgarea" class="my-3">
      <h4 class="my-3">Write Question which you want to Ask</h4>
      <input type="" class="form-control" id="question_heading" placeholder="Write Question heading" name="question_heading">
      <textarea class="form-control mt-1" name="question" id="question" rows="4" placeholder="Write Question here"></textarea>

      <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">#</span>
    </div>
    <input list="trends" placeholder="Enter your trending word (Optional)" class="form-control mb-1" name="question_trending_word" autocomplete="OFF" id="post_trending">
  </div>


      <datalist id="trends">
         <?php
      $query_trendss = "SELECT * FROM trend ORDER BY count DESC LIMIT 5";
      $result_trendss = mysqli_query($conn, $query_trendss);  
      if ($result_trendss->num_rows > 0) {
      while($row_trendss = mysqli_fetch_array($result_trendss))  
      {
         ?>
        <option value="<?php echo $row_trendss['word'];?>"><?php echo $row_trendss['word'];?></option>
         <?php 
      }
   }
   ?>
      </datalist>
   </div>
   <div id="postarea">
      <h4 class="my-3">Write Post which you want to Publish</h4>
      <textarea class="form-control my-2" name="post" id="post" rows="4" placeholder="Write post here"></textarea>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">#</span>
    </div>
    <input list="trends" placeholder="Enter your trending word (Optional)" class="form-control mb-1" name="post_trending_word" autocomplete="OFF" id="question_trending">
  </div>


      <datalist id="trends">
         <?php
      $query_trendss = "SELECT * FROM trend ORDER BY count DESC LIMIT 5";
      $result_trendss = mysqli_query($conn, $query_trendss);  
      if ($result_trendss->num_rows > 0) {
      while($row_trendss = mysqli_fetch_array($result_trendss))  
      {
         ?>
        <option value="<?php echo $row_trendss['word'];?>"><?php echo $row_trendss['word'];?></option>
         <?php 
      }
   }
   ?>
      </datalist>
   </div>
     
   <button class="btn btn-primary" type="submit" name="publish_btn" id="toggle-button">Publish</button>
</form>
</div>

<script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}
</script>

<script>
document.getElementById("post_trending").onkeypress = function(e) {
   var input =document.getElementById("post_trending");
   input.value=removeSpaces(input.value);
var chr = String.fromCharCode(e.which);

if ("#!@#$%^&*()_+}{:';/.,?><~`".indexOf(chr) >= 0){
   return false;
}
return true
};
</script>

<script>
document.getElementById("question_trending").onkeypress = function(e) {
   var input =document.getElementById("question_trending");
   input.value=removeSpaces(input.value);
var chr = String.fromCharCode(e.which);

if ("#!@#$%^&*()_+}{:';/.,?><~`".indexOf(chr) >= 0){
   return false;
}
return true
};
</script>

