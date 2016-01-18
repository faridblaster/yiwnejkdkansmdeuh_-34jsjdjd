<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title>Forgot Password</title>
  <!-- google fonts api, mmm -->

</head>
<!-- Start Css -->
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<!-- font style included here -->

<!-- End Css -->

<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<META NAME="KeyWords" CONTENT="Inventory - Disscusion,sharing,knowledge">
<META NAME="author" CONTENT="faridblaster developer">
<?php

include_once "include/config.inc.php";
include_once "include/Database.class.php"; // database//

$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); // create the $db object
$db->connect(); // connect to the server

error_reporting(E_ALL ^ E_NOTICE);

$get_code = htmlspecialchars($_GET['key']); //url key confirmation by database //

if (empty($get_code)) {

  if (isset($_POST['submit'])) {  //email user //
    $email = $_POST['email'];
    $email = htmlspecialchars($email); //clean from bas code

    if (empty($email)) {
      echo "";
    }
    if (!explode("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
      echo "<div class='error'>Sorry, The email address is invalid!</div>";
    } else {
      $sql = mysql_query("SELECT id,email,username FROM user WHERE email='$email'") or die (mysql_error());
      if (mysql_affected_rows() == 0) {
        echo "<div class='error'>No account with that email address exists.</div>"; //if the email address is not existed //
      } else {
        while ($row = mysql_fetch_object($sql)) {


          include_once "include/class.phpmailer.php";
          $mail = new PHPMailer();

          $mail->SMTPSecure = "ssl";  
          $mail->Host='smtp.gmail.com';  
          $mail->Port='465';   
          $mail->Username   = 'alangfc09@gmail.com'; // SMTP account username
          $mail->Password   = 'ackwbuznlghuqqdn';  
          $mail->SMTPKeepAlive = true;  
          $mail->Mailer = "smtp"; 
          $mail->IsSMTP(); // telling the class to use SMTP  
          $mail->SMTPAuth   = true;                  // enable SMTP authentication  
          $mail->CharSet = 'utf-8';  
          $mail->SMTPDebug  = 1;  
          $email = $row->email;
          $user = $row->id;
          $mail->From = "inventorySystem@gmail.com";
          $mail->FromName = "Inventory System Team ";
          $mail->AddAddress($email);
//$mail->AddBCC($email, '');
          $mail->WordWrap = 50;
          $mail->IsHTML(true);
          $mail->Subject = "Inventory Team password reset confirmation";

          $salt = sha1(uniqid()); //generate salt
          $now = time(); //get current time

//forgot key
          $forgot_key = sha1($user . $now . $salt);
//echo $forgot_key;

          $update['expire'] = $now;
          $update['reset'] = $forgot_key;
          $ip_connection = $_SERVER['SERVER_ADDR'];
          $db->query_update('user', $update, "email='$email'"); //update with password expiry time


// start comment out
          $mailer = "<div style='margin: 0 auto; background-color:f0e1ae; width:520px; padding:12px;'><img src='https://www.ipfw.edu/dotAsset/8bd267bd-44ed-46a2-878f-a4d6905a2337.jpg'><br><br>Hi " . $row->username . ",<br><br> There was recently a request to change the password on your account. If you requested this password change, please set a new password by following the link below:<br><br>
				<a href='" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME'] . "?key=" . $forgot_key . "'>" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME'] . "?key=" . $forgot_key . "</a><br>
<a>Ip Connection:</a>$ip_connection<br/>
<br>Please note that this link is valid only for 24 hours.<br><br>If you don't want to change your password, just ignore this message.<br><br>This is sent from a <a href='".$_SERVER['SERVER_NAME']."'/inventory/index.php'>Login Page</a> on Inventory. If you did not register by yourself let us know <br><br>Thanks,<br>Inventory System Team</div>"; // change/edit the confirmation in email user as comment for key activation
          $mail->Body = $mailer;

          if (!$mail->Send()) {
            echo "Message could not be sent.<p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
          }

          echo '<div class="success">An email has been sent to ' . $email . ' with further instructions.</div>';

        }
      }
    }


  }
  ?>
  <form id="form" method="post" action="#">
    <h1>Forgot your password?</h1>

    <h2>Enter your email to reset your password. You may need to unblock or check your
      spam folder.</h2>

    <div>
      <label for="email">Email:</label>
      <input type="text" name="email" id="email" class="field"/>
    </div>

    <div class="submit">
      <input class="button" name="submit" type="submit" value="Submit"/>
    </div>
  </form>

<?php } else {

  if (isset($_REQUEST['key'])) {

    if ($_REQUEST['key'] == $get_code) {

      $get_original_data = mysql_real_escape_string($_REQUEST['key']);

      $sql = mysql_query("SELECT id,email,username,reset,expire FROM user WHERE reset='$get_original_data'") or die (mysql_error());

      if (mysql_num_rows($sql) > 0) {
        $row = mysql_fetch_object($sql);
        $reset = $row->reset;
        $time = $row->expire;
        $salt = $salt;
        $email = $row->email;

        if (mysql_affected_rows() == 0) {
          echo "<script>window.location='index.php';</script>";
        } elseif (time() - $time > 86400 /* valid for 24 hours */) {

          //clear expiry time and reset code
          $update['expire'] = '';
          $update['reset'] = '';
          $db->query_update('user', $update, "reset='$reset'");
          echo "<div class='error'><h2>Sorry!</h2>Password reset link expired. Please try again!</div>";
        } else {

          if (isset($_POST['submit'])) {
            $apassword = htmlspecialchars($_POST['apassword']);
            $cpassword = htmlspecialchars($_POST['cpassword']);


            if (trim($apassword) == '') {
              echo '<div class="error">Please enter a password</div>';
              exit();
            } else if ($apassword != $cpassword) {
              echo '<div class="error">Password does not match!</div>';
              exit();
            } else {
              $update['password'] = md5($salt . $apassword);
              $update['expire'] = '';
              $update['reset'] = '';
              $db->query_update("user", $update, "reset='$get_code'");


              echo '<div class="success">Password Successfully Changed :) <br/><a href=../user/index.php>Login Page</a></div>';
              exit();
            }
          }


          ?>
          <form id="form" method="post" action="index.php?key=<?= $reset; ?>">
            <h1>Please enter a new password for your account</h1>

            <div>
              <label for="email">Email:</label>
              <input type="text" name="email" id="email" class="field" disabled="disabled" value="<?= $email; ?>"/>
            </div>

            <div>
              <label for="apassword">Password</label>
              <input type="password" name="apassword" id="apassword" class="field"/>
            </div>

            <div>
              <label for="cpassword">Confirm Password</label>
              <input type="password" name="cpassword" id="cpassword" class="field"/>
            </div>

            <div class="submit">
              <input class="button" name="submit" type="submit" value="Submit"/>
            </div>
          </form>
        <?php


        }
      } else {
        echo "<SCRIPT> alert('data not found');</SCRIPT>";
        echo "<script>window.location='index.php';</script>";
      }
    }
  } else {
    echo "increption data failed.";
  }


}

$db->close(); //closing connection
?>
<div class="clear"></div>
<h2><a href="../index.php">Login Page</a></h2>
</body>
</html>