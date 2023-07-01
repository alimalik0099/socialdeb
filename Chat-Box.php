<?php include 'header.php';
if ($user_session=="no") {
   ?>
   <script type="text/javascript">
      window.location.href="login.php";
   </script>
   <?php
}

$second_userid=$_GET['user-id'];

$query_chk_flr = "SELECT * FROM followers WHERE user_one='$second_userid' AND user_two='$user_id' OR user_one='$user_id' AND user_two='$second_userid'";
$result_follow = mysqli_query($conn, $query_chk_flr);  
if ($result_follow->num_rows < 1) {
?>
   <script type="text/javascript">
    alert("You need to follow first.");
      window.location.href="user.php?user-id=<?php echo $second_userid;?>";
   </script>
   <?php
}
else{

    $query_scnd_userdata = "SELECT * FROM users WHERE user_id='$second_userid'";
    $result_scnd_userdata = mysqli_query($conn, $query_scnd_userdata);  
    $row_scnd_userdata = mysqli_fetch_array($result_scnd_userdata);
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

?>
<body>
    <?php include 'navbar.php';?>



 <div class="container py-3">
    <h3>
    <span class="badge bg-secondary px-5">Message</span></h3>
<div class="row">

<div class="col-md-4" style="height: 500px !important;overflow-y: auto;">
<div class="card pt-3" style="background-color:rgb(223, 178,240);">
<h3>
<?php
if ($user_session=="yes") {
      $query_follow_r = "SELECT * FROM users WHERE user_id!='$user_id'";

   }
   else{
       $query_follow_r = "SELECT * FROM users";
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
<div class="rounded p-3 border-1 mb-4" style="border: 1px solid black; height: 450px;overflow-y: auto;" id="message_box">
   <div id="msgarea" class="my-3" style="background-color: black;padding: 4px;text-align: center;color: white;">
    <h4 class="my-3" >Chat With <?php echo $row_scnd_userdata['name'];?></h4>
    </div>
  <div id="messages">

</div>

</div>  
<form action="" method="POST">
    <div class="row">
    <div class="col-md-10">
        <input type="" placeholder="Enter Your Message Here" class="form-control" id="message" style="border: 1px solid black;" required>
        <input type="hidden" id="first_user" value="<?php echo $user_id;?>">
        <input type="hidden" id="second_user" value="<?php echo $second_userid;?>">
    </div>
    <div class="col-md-2">
        <button id="send_btn" class="btn btn-primary" type="">Send</button>
    </div>
    </div>
</form>

</div>
</div>
</div>




<script>


$(document).ready(function() {
$('#send_btn').on('click', function() {
$("#send_btn").attr("disabled", "disabled");

var message = $('#message').val();
var first_user = $('#first_user').val();
var second_user = $('#second_user').val();

if(message!="" && first_user!="" && second_user!=""){
   
    $.ajax({
    url: "Send-Message.php",
    type: "POST",
    data: {
      message: message,
      first_user: first_user,
      second_user: second_user
    },
    success: function(dataResult){
      var dataResult = JSON.parse(dataResult);
      if(dataResult.statusCode==200){
       $('#message').val('');
      $("#send_btn").removeAttr("disabled");      
      }
      else if(dataResult.statusCode==201){
        alert("Error occured !");
        $("#send_btn").removeAttr("disabled");
      }
      
    }
  });
   }
else{
    alert('Please type a message!');
    $("#send_btn").removeAttr("disabled"); 
  }

});
});
</script>


<script type="text/javascript">
    $('document').ready(function () {
 setInterval(function () {getRealData()}, 1000);
 setInterval(function () {Scrolldown()}, 500);
 }); 

function getRealData() {
var second_user = $('#second_user').val();

$.ajax({
    url: "Get-Message.php",
    type: "POST",
    data: {
      second_user: second_user
    },
    success: function(html){
       $('#messages').html(html)
}
}); 
}

function Scrolldown() {
   var message_box= document.getElementById('message_box');
     message_box.scroll(0,1000000); 
}
</script>
</body>
</html>