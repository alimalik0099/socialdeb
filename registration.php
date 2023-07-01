<?php include 'header.php';?>
<?php
if(isset($_POST['submit'])){
  $user_name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $c_pass=$_POST['c_pass'];
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

  if ($password==$c_pass) {

$query_chck_email = mysqli_query($conn,"SELECT * FROM users WHERE contact='$phone' OR email='$email'") or die(mysqli_error($conn)); 

  if(mysqli_num_rows($query_chck_email)>0){
    ?>
 <script type="text/javascript">
   alert('Sorry User Already Exists');
   window.location.href="";
 </script>
    <?php
  }
  else{

    $name = $image["name"];
    $type = $image["type"];
    $blob = addslashes(file_get_contents($image["tmp_name"]));

    $user_id=rand(0,100000);

    $password=md5($password);

    $sql1="INSERT INTO users(user_id,name,contact,email,password,profile) 
  VALUES('$user_id','$user_name','$phone','$email','$password','$blob')";
   if(mysqli_query($conn,$sql1)){
    $_SESSION['user_id']=$user_id;

    ?>
 <script type="text/javascript">
   alert('Account register succesffully.');
   window.location.href="index.php";
 </script>
    <?php


   }
  }


}

else{
    ?>
 <script type="text/javascript">
   alert('Please enter same password');
   window.location.href="";
 </script>
    <?php
  }
}
}
  ?>
<body class="vh-100 bg-image"
style="background-image:
url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
<?php include 'navbar.php';?>
<section class="py-5">
  <div class="mask d-flex align-items-center h-100
  gradient-custom-3">
  <div class="container h-100">
    <div class="row d-flex
    justify-content-center
    align-items-center h-100">
    <div class="col-12 col-md-9 col-lg-7
    col-xl-6">
    <div class="card"
    style="border-radius:
    15px;">
    <div class="card-body p-5">
        <h2
        class="text-uppercase
        text-center mb-5">Create
        an account
    </h2>
    <form action="" method="POST" enctype="multipart/form-data">
     <div class="form-outline mb-4">
      <label class="form-label" for="form3Example1cg">Your Name</label>
   
    <input type="text" required name="name" id="form3Example1cg" class="form-control form-control-lg">
</div>
<div
class="form-outline
mb-4">
<label class="form-label" for="form3Example1cg">Your
Contact</label>
<input type="number" required name="phone" required id="form3Example1cg" class="form-control form-control-lg" placeholder="0x xx xx xx xx">
</div>
<div class="form-outline mb-4">
<label class="form-label" for="form3Example3cg">Your Email</label> 
<input type="email" name="email" required id="form3Example3cg" class="form-control form-control-lg"
/>
</div>
<div class="form-outline mb-4">
<label
class="form-label" for="form3Example4cg">Password</label>
<input type="password" name="password" required id="form3Example4cg" class="form-control form-control-lg" />
</div>
<div class="form-outline mb-4">
<label
class="form-label" for="form3Example4cdg">Confirm password</label>
<input type="password" name="c_pass" required id="form3Example4cdg" class="form-control form-control-lg" />
</div>

<div class="form-outline mb-4">
<label
class="form-label" for="form3Example4cdg">Profile Picture</label>
<input type="file" name="image" required id="form3Example4cdg" class="form-control form-control-lg" />
</div>
<div class="form-check d-flex justify-content-center mb-5">
<input required class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
<label class="form-check-label" for="form2Example3g"> I agree all statements in <a href="#!" class="text-body"><u>Terms   of service</u></a>
</label>
</div>

<div class="d-flex justify-content-center">
<button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-white">Register</button>
</div>
<p class="text-center text-muted mt-5 mb-0">Have already an account?
 <a href="./login.php" class="fw-bold text-body"><u>Login here</u></a>
</p>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
</body>
</html>