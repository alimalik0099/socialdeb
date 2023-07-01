<?php
session_start();
include "db.php";

if(isset($_SESSION['user_id'])){
   $user_session="yes";
   $user_id=$_SESSION['user_id'];
}
else{
 $user_session="no";
}

$user_ip=$_SERVER['REMOTE_ADDR'];
$query_userip = "SELECT * FROM website_visitor WHERE ip_address='$user_ip'";
$result_userip = mysqli_query($conn, $query_userip);  
if ($result_userip->num_rows > 0) {
}
else{

date_default_timezone_set('Europe/Paris');
$date=date('d-m-Y');

 $userip_query="INSERT INTO website_visitor(ip_address,date) 
  VALUES('$user_ip','$date')";
  mysqli_query($conn,$userip_query);
}
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/x-icon" href="./images/favicon.png">
      <!-- Bootstrap CSS -->
      <!-- <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
         <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
         <script type="text/javascript" src="jquery.js"></script>
      <title>Home</title>
   </head>