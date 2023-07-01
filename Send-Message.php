<?php include 'db.php';

    $message=$_POST['message'];
    $first_user=$_POST['first_user'];
    $second_user=$_POST['second_user'];

    $sql1="INSERT INTO chat(message,first_user,second_user) 
  VALUES('$message','$first_user','$second_user')";
   if(mysqli_query($conn,$sql1)){
   echo json_encode(array("statusCode"=>200));

}
else{
   echo json_encode(array("statusCode"=>201)); 
}