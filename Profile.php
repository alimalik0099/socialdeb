<?php include 'header.php';?>
<?php 
if ($user_session=="no") {
   ?>
   <script type="text/javascript">
      window.location.href="login.php";
   </script>
   <?php
}
?>

<?php
if(isset($_POST['update_image'])){
    
    $image = $_FILES["image"];
    $info = getimagesize($image["tmp_name"]);

    if(!$info){
    ?>
    <script type="text/javascript">
      alert('Select valid image');
    </script>
    <?php
  }
  else{
       
    $name = $image["name"];
    $type = $image["type"];
    $blob = addslashes(file_get_contents($image["tmp_name"]));

    $query2="UPDATE users set profile='$blob' WHERE user_id='$user_id'";
      if(mysqli_query($conn, $query2)){
   ?>
 <script type="text/javascript">
   alert('Update successfully');
   window.location.href="";
 </script>
    <?php
      }



  }
}
?>
<?php
if(isset($_POST['update'])){
  $user_name=$_POST['name'];
  $bio=$_POST['bio'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];

  $query2="UPDATE users set name='$user_name',bio='$bio',contact='$phone',email='$email' WHERE user_id='$user_id'";
      if(mysqli_query($conn, $query2)){
   ?>
 <script type="text/javascript">
   alert('Update successfully');
   window.location.href="";
 </script>
    <?php
      }
  }
  ?>


  <?php
if(isset($_POST['update_password'])){
  
  $old_pass=$_POST['old_pass'];
  $new_pass=$_POST['new_pass'];
  $confirm_pass=$_POST['confirm_pass'];

 $old_pass=md5($old_pass);
  $query_chck_pass = mysqli_query($conn,"SELECT * FROM users WHERE password='$old_pass'") or die(mysqli_error($conn)); 
if(mysqli_num_rows($query_chck_pass)>0){

    if ($new_pass==$confirm_pass) {
   $new_pass=md5($new_pass);
  $query3="UPDATE users set password='$new_pass' WHERE user_id='$user_id'";
       if(mysqli_query($conn, $query3)){    

       ?>
        <script type="text/javascript">
            alert('Update Successfully.');
            window.location.href='';
        </script>
        <?php    

}
}
else{
?>
<script type="text/javascript">
    alert('Invalid same passwords.'); 
window.location.href='';
</script>
<?php
}
}
else{
?>
<script type="text/javascript">
    alert('Invalid Current password.'); 
window.location.href='';
</script>
<?php
}


}
?>
<style>
   @media screen and (max-width: 990px) {
      #search-bar {
         width: 90vw !important;
      }  
   }
</style>
<body>
   <?php include 'navbar.php';?>

   <?php
   $query = "SELECT * FROM users WHERE user_id='$user_id'";
   $result = mysqli_query($conn, $query);  
   if ($result->num_rows > 0) {
     $row = mysqli_fetch_array($result);
     ?>
     <div class="container-fluid py-3 my-4">
      <div class="row">
         <div class="col-md-12">
            <div class="card py-3 mb-3 position-relative" style="background-color:rgb(223, 178,
               240); ">
               <div class="d-flex flex-column justify-content-center align-items-center"><!-- 
                  <img src="./images/news.jpg" style="clip-path: circle(31.2% at 46% 43%); " class="img-fluid" alt=""> -->

                  <?php 
                  echo '<img style="clip-path: circle(31.2% at 46% 43%); width:525px;height:328px" class="img-fluid" alt="" src="data:image/jpeg;base64,'.base64_encode($row['profile']).'"/>';
                  ?>
                  <h3><?php echo $row['name'];?></h3>
                  <div class="d-flex justify-content-center align-items-center px-3" >
                     <p class="text-center"><?php echo $row['bio'];?></p>
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
                        <span><?php echo $row['contact'];?></span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>


<div class="row" style="padding: 10px;">
 <div class="col-md-12">

<form action="" method="POST" enctype="multipart/form-data">
      <h4>UPDATE YOUR PROFILE PICTURE</h4>
      <div class="row mt-3">
            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
               <div class="form-group">
           <input type="file" required class="form-control" name="image">
             </div>
          </div>

          <div class="col-lg-2 col-md-2 col-sm-12 col-12">
         <div class="form-group text-center">
           <button type="submit" class="btn btn-primary" name="update_image">UPDATE</button>
             </div>
          </div>
       </div>
    </form>
 </div>
 </div>  

<div class="row mt-5" style="border: 1px solid rgb(0, 0, 0,.2);padding: 10px;">
 <div class="col-md-12">
   <form action="" method="POST">
      <h4>UPDATE YOUR DETAILS</h4>
      <div class="row mt-3">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="form-group">
                  <input type="" required class="form-control" name="name" placeholder="Enter your name" value="<?php echo $row['name'];?>">
             </div>
          </div>


          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="form-group">
                  <input type="" class="form-control" name="bio" placeholder="Enter your Bio" value="<?php echo $row['bio'];?>">
             </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
               <div class="form-group">
                 <input type="number" required name="phone" required class="form-control" value="<?php echo $row['contact'];?>" placeholder="0x xx xx xx xx">
             </div>
          </div>


          <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
               <div class="form-group">
                  <input type="" value="<?php echo $row['email'];?>" required class="form-control" name="email">
             </div>
          </div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-4 text-center">
               <div class="form-group">
                 <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
             </div>
          </div>

               </div>
               
            </form>
         </div>
      </div>





<div class="row mt-5" style="border: 1px solid rgb(0, 0, 0,.2);padding: 10px;">
 <div class="col-md-12">
   <form action="" method="POST">
      <h4>CHANGE PASSWORD</h4>
      <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="form-group">
                  <input type="" required class="form-control" name="old_pass" placeholder="Enter Current Password">
             </div>
          </div>


          <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
               <div class="form-group">
                 <input type="" required class="form-control" name="new_pass" placeholder="Enter New Password">
             </div>
          </div>


          <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
               <div class="form-group">
                   <input type="" required class="form-control" name="confirm_pass" placeholder="Enter Confirm Password">
             </div>
          </div>

          <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-4 text-center">
               <div class="form-group">
                 <button type="submit" class="btn btn-primary" name="update_password">UPDATE</button>
             </div>
          </div>

               </div>
               
            </form>
         </div>
      </div>

   </div>

<?php } ?>
</body>
</html>