<?php 
include 'header.php';
$second_userid=$_POST['second_user'];

$query_scnd_userdata = "SELECT * FROM users WHERE user_id='$second_userid'";
    $result_scnd_userdata = mysqli_query($conn, $query_scnd_userdata);  
    $row_scnd_userdata = mysqli_fetch_array($result_scnd_userdata);
    
$query_chat = "SELECT * FROM chat WHERE first_user='$user_id' AND second_user='$second_userid' OR first_user='$second_userid' AND second_user='$user_id'";
$result_chat = mysqli_query($conn, $query_chat);  
if ($result_chat->num_rows > 0) {

 while ($row_chat=mysqli_fetch_assoc($result_chat)) {  
     
     $first_chat_user=$row_chat['first_user'];
     $second_chat_user=$row_chat['second_user'];

  echo '<div class="rounded p-3 border-1 my-3 px-4" style="background-color: rgb(223,232, 240);">';
     if ($first_chat_user!="$user_id") {
  
 echo '<div class="d-flex justify-content-between align-items-center">
<div class="left">
<img class="mt-3"  style="clip-path: circle(35.0% at 48% 34%);width:40px;height:50px" alt="" src="data:image/jpeg;base64,'.base64_encode($row_scnd_userdata['profile']).'"/>';
     echo '<span>'.$row_scnd_userdata['name'].'</span>
    </div>
   <div class="right">
    <div class="d-flex justify-content-between align-items-center p-0"></div>
         <span>'. $row_chat['timedate'].'</span>
    </div>
   </div>';}
else{
   
  echo' <div class="d-flex justify-content-between align-items-center">
    <div class="left">
         <span>'. $row_chat['timedate'].'</span>
    </div>
    <div class="right">
        <div class="d-flex justify-content-between align-items-center p-0"><div>';
   $query_first_userdata = "SELECT * FROM users WHERE user_id='$user_id'";
    $result_first_userdata = mysqli_query($conn, $query_first_userdata);  
    $row_first_userdata = mysqli_fetch_array($result_first_userdata);
         
     echo '<img class="mt-3"  style="clip-path: circle(35.0% at 48% 34%);width:40px;height:50px" alt="" src="data:image/jpeg;base64,'.base64_encode($row_first_userdata['profile']).'"/>';
       echo' <span>'.$row_first_userdata['name'].'</span>
    </div>
   </div>
    </div>
</div>';
}

echo'    <div>
     <p><b>Message: </b>'.$row_chat['message'].'</p>
    </div>                                  
</div>';
}
}
?>
