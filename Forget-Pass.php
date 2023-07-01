<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'header.php';

if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $query_chck_email = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'") or die(mysqli_error($conn)); 

  if(mysqli_num_rows($query_chck_email)>0){
    $Verify_code=(rand(10,100000));

    $html='<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>

  <style type="text/css">
  a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_3 .v-src-width { width: auto !important; } #u_content_image_3 .v-src-max-width { max-width: 46% !important; } #u_content_text_6 .v-text-align { text-align: center !important; } #u_content_text_7 .v-text-align { text-align: center !important; } #u_content_text_8 .v-text-align { text-align: center !important; } }
  [owa] .u-row .u-col {
    display: table-cell;
    float: none !important;
    vertical-align: top;
  }

  .ie-container .u-row,
  [owa] .u-row {
    width: 600px !important;
  }

  .ie-container .u-col-33p33,
  [owa] .u-col-33p33 {
    width: 199.98px !important;
  }

  .ie-container .u-col-100,
  [owa] .u-col-100 {
    width: 600px !important;
  }


  @media only screen and (min-width: 620px) {
    .u-row {
      width: 600px !important;
    }
    .u-row .u-col {
      vertical-align: top;
    }

    .u-row .u-col-33p33 {
      width: 199.98px !important;
    }

    .u-row .u-col-100 {
      width: 600px !important;
    }

  }

  @media (max-width: 620px) {
    .u-row-container {
      max-width: 100% !important;
      padding-left: 0px !important;
      padding-right: 0px !important;
    }
    .u-row .u-col {
      min-width: 320px !important;
      max-width: 100% !important;
      display: block !important;
    }
    .u-row {
      width: calc(100% - 40px) !important;
    }
    .u-col {
      width: 100% !important;
    }
    .u-col > div {
      margin: 0 auto;
    }
    .no-stack .u-col {
      min-width: 0 !important;
      display: table-cell !important;
    }

    .no-stack .u-col-33p33 {
      width: 33.33% !important;
    }

    .no-stack .u-col-100 {
      width: 100% !important;
    }

  }
  body {
    margin: 0;
    padding: 0;
  }

  table,
  tr,
  td {
    vertical-align: top;
    border-collapse: collapse;
  }

  p {
    margin: 0;
  }

  .ie-container table,
  .mso-container table {
    table-layout: fixed;
  }

  * {
    line-height: inherit;
  }

  a[x-apple-data-detectors="true"] {
    color: inherit !important;
    text-decoration: none !important;
  }

  .ExternalClass,
  .ExternalClass p,
  .ExternalClass span,
  .ExternalClass font,
  .ExternalClass td,
  .ExternalClass div {
    line-height: 100%;
  }

  @media (max-width: 480px) {
    .hide-mobile {
      display: none !important;
      max-height: 0px;
      overflow: hidden;
    }
  }

  @media (min-width: 481px) {
    .hide-desktop {
      display: none !important;
      max-height: none !important;
    }
  }
  </style>



  </head>

  <body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff">
  <table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
  <tbody>
  <tr style="vertical-align: top">
  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">

  <div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="u-row">
  <div style="border-collapse: collapse;display: table;width: 100%;background-image: url("https://cdn.templates.unlayer.com/assets/1598976313622-two-step-authentication-mobile-phone_101884-545.png");background-repeat: no-repeat;background-position: center top;background-color: transparent;">
  <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
  <div style="width: 100% !important;">
  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">

  <table id="u_content_divider_1" class="u_content_divider" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:15px;font-family:arial,helvetica,sans-serif;" align="left">

  <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #236fa1;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
  <tbody>
  <tr style="vertical-align: top">
  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
  <span>&#160;</span>
  </td>
  </tr>
  </tbody>
  </table>

  </td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>

  </div>
  </div>
  </div>



  <div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="u-row">
  <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

  <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
  <div style="width: 100% !important;">
  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">

  <table id="u_content_image_2" class="u_content_image" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;" align="left">

  <table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
  <td style="padding-right: 0px;padding-left: 0px;" align="center">

  <img align="center" border="0" src="http://ecr.gmacl.cricket/assets/email%20images/image-5.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;width: 100%;max-width: 600px;" width="600" class="v-src-width v-src-max-width"/>

  </td>
  </tr>
  </table>

  </td>
  </tr>
  </tbody>
  </table>

  </div>
  </div>
  </div>


  </div>
  </div>
  </div>



  <div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="u-row">
  <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

  <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
  <div style="width: 100% !important;">
  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">

  <table id="u_content_image_5" class="u_content_image" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;" align="left">

  <table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
  <td style="padding-right: 0px;padding-left: 0px;" align="center">

  <img align="center" border="0" src="http://ecr.gmacl.cricket/assets/email%20images/image-4.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;width: 100%;max-width: 46px;" width="46" class="v-src-width v-src-max-width"/>

  </td>
  </tr>
  </table>

  </td>
  </tr>
  </tbody>
  </table>

  </div>
  </div>
  </div>


  </div>
  </div>
  </div>



  <div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="u-row">
  <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

  <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
  <div style="width: 100% !important;">
  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">

  <table id="u_content_text_1" class="u_content_text" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:25px 10px 10px 15px;font-family:arial,helvetica,sans-serif;" align="left">

  <div class="v-text-align" style="color: #094c54; line-height: 140%; text-align: left; word-wrap: break-word;">
  <p style="font-size: 14px; line-height: 140%;"><span style="font-family: helvetica, sans-serif; font-size: 30px; line-height: 42px;">Please Confirm Email</span></p>
  </div>

  </td>
  </tr>
  </tbody>
  </table>

  <table id="u_content_text_2" class="u_content_text" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:20px 10px 10px 15px;font-family:arial,helvetica,sans-serif;" align="left">

  <div class="v-text-align" style="color: #666666; line-height: 140%; text-align: left; word-wrap: break-word;">
  <p style="font-size: 14px; line-height: 140%;"><span style="font-family: helvetica, sans-serif; font-size: 16px; line-height: 22.4px;">Hi</span></p>
  </div>

  </td>
  </tr>
  </tbody></table>

  <table id="u_content_text_5" class="u_content_text" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 20px 15px;font-family:arial,helvetica,sans-serif;" align="left">

  <div class="v-text-align" style="color: #666666; line-height: 170%; text-align: left; word-wrap: break-word;">
  <p style="font-size: 14px; line-height: 170%;"><span style="font-family: helvetica, sans-serif; font-size: 16px; line-height: 27.2px;">Need to reset your password? No Problem! Enter this code on webpage. If you did not make this request, please ignore this email.</span></p>
  </div>

  </td>
  </tr>
  </tbody>
  </table>

  </div>
  </div>
  </div>


  </div>
  </div>
  </div>



  <div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;" class="u-row">
  <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">

  <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
  <div style="width: 100% !important;">
  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">

  <table id="u_content_button_1" class="u_content_button" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 10px 15px;font-family:arial,helvetica,sans-serif;" align="left">

  <div class="v-text-align" align="left">

  <button  class="v-size-width" style="box-sizing: border-box;display: inline-block;font-family:arial,helvetica,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #094c54; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
  <span class="v-padding" style="display:block;padding:13px 30px;line-height:120%;"><span style="font-size: 16px; line-height: 19.2px;">'. $Verify_code.'</span></span>
  </button>

  </div>

  </td>
  </tr>
  </tbody>
  </table>

  </div>
  </div>
  </div>


  </div>
  </div>
  </div>




  </div>
  </div>
  </div>


  <div class="u-row-container" style="padding: 0px;background-color: transparent">
  <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #efefef;" class="u-row">
  <div style="border-collapse: collapse;display: table;width: 100%;background-color: #efefef;">

  <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
  <div style="width: 100% !important;">
  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">

  <table id="u_content_divider_4" class="u_content_divider" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
  <tr>
  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">

  <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
  <tbody>
  <tr style="vertical-align: top">
  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
  <span>&#160;</span>
  </td>
  </tr>
  </tbody>
  </table>

  </td>
  </tr>
  </tbody>
  </table>

  </div>
  </div>
  </div>


  </div>
  </div>
  </div>

  </td>
  </tr>
  </tbody>
  </table>

  </body>

  </html>';

  include_once 'PHPMailerAutoload.php';
  $mail = new PHPMailer;
  try {
$mail->isSMTP();                                 
$mail->Host = 'premium18.web-hosting.com'; 
$mail->SMTPAuth = true;              
$mail->Username = 'info@gmacl.cricket';
$mail->Password = 'M@nChe$ter0161';    
$mail->SMTPSecure = 'ssl';       
$mail->Port = 465;            
$mail->setFrom('info@gmacl.cricket', 'Social Deb');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Forget Your Password';
$mail->Body    =  $html;
$mail->send();
    $_SESSION['Verify_code']= $Verify_code;
     $_SESSION['email']= $email;
    
    ?>
     <script type="text/javascript">
      window.location.href = "Forget-Password-Email.php";
    </script>
    <?php
 }
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


  }

  else{
    ?>
    <script type="text/javascript">
      alert('User does not exsist');
      window.location.href = "";
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

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forget your password account</h5>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Email address</label>
                      <input type="email" name="email" required id="form2Example17" placeholder="Enter your account email" class="form-control form-control-lg" />

                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Next</button>
                    </div>
                    <p class=" pb-lg-2" style="color: #393f81;">Don't have an account? <a href="./registration.php"
                      style="color: #393f81;">Register here</a></p>
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