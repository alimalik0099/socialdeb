<?php include 'header.php';
if (isset($_SESSION['code_verify'])) {

}
else{
  ?>
     <script type="text/javascript">
      window.location.href = " Forget-Password-Email.php";
    </script>
    <?php
}

if(isset($_POST['submit'])){
$email=$_SESSION['email'];
  $password = mysqli_real_escape_string($conn,$_POST['password']);
   $password=md5($password);
  $query="UPDATE users set password='$password' WHERE email='$email'";
    if(mysqli_query($conn, $query))  
    {
      session_unset();
      session_destroy();
       ?>
     <script type="text/javascript">
      window.location.href = "Forget-Success.php";
    </script>
    <?php


    }

}
?>


<style>
  .bg-image-vertical {
    position: relative;
    overflow: hidden;
    background-repeat: no-repeat;
    background-position: right center;
    background-size: auto 100%;
  }

  @media (min-width: 1025px) {
    .h-custom-2 {
      height: 100%;
    }
  }
</style>

<body class="vh-100" style="background-color: #9A616D;">
  <?php include 'navbar.php';?>


  <section >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="images/login.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="" method="POST">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x " style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0"><img src="./images/favicon.png" alt="" style="width: 65px;"></span>
                    </div>

                    <h5 class="mb-3 pb-3" style="letter-spacing: 1px;font-weight: bold;">Your Verification has been completed successfull. Please enter your new password.</h5>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">New Password</label>
                      <input type="number" name="password" required id="form2Example17" placeholder="Enter your New Password" class="form-control form-control-lg" />

                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Next</button>
                    </div>
                    </form>

                  </div>
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