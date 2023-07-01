<?php
$user_ip=$_SERVER['REMOTE_ADDR'];

$query_userip = "SELECT * FROM website_visitor WHERE ip_address='$user_ip'";
$result_userip = mysqli_query($conn, $query_userip);  
if ($result_userip->num_rows > 0) {

}
else{
 $userip_query="INSERT INTO website_visitor(ip_address) 
  VALUES('$user_ip')";
  mysqli_query($conn,$userip_query);
}