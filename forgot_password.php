<?php
ob_start();
session_start(); // Starting Session

 include('../includes/connect.php');?>
<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {


// Define $username and $password
$username=$_POST['email'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$username = mysql_real_escape_string($username);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from super_admin where super_admin_email='$username' ", $connection);
$rows = mysql_num_rows($query);
$res_query = mysql_fetch_assoc($query);
$usernameid = $res_query['username'];
$password = $res_query['password'];
if ($rows == 1) {

 
 
 
$to = $username;
$subject = "Danaye Password";

$message = "
<html>
<head>
<title>Danaye</title>
</head>

<body>

<div style='width:700px; border-radius:6px; border:2px solid #efefef; overflow:hidden;'>
	<div style='padding:15px 0px; overflow:hidden; text-align:center;'>
    <img src='http://www.bestinciti.com/clients/danaye/images/logo-email.jpg' height='71' width='257' border='0' />
    </div>
    <div style='clear:both; padding:20px 35px; background:#efefef; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#333333; line-height:36px;'>
    <span style='font-size:20px; color:#000000; font-weight:bold;'><span style='color:#e31b23;'>Hi</span> Friends </span>
    <span style='display:block;'>Please do not disclose to others . Keep posting your adds to get better results. Thanks Danaye team.</span>
    <a href='http://bestinciti.com/clients/danaye/login.php' style='text-decoration:none; color:#ffffff;'>
    <span style='background:#e31b23; padding:10px; border-radius:4px; display:block; color:#ffffff;'>    
    Username: <strong style='color:#fff;'>$usernameid</strong> Password: <strong style='color:#fff;'>$password</strong>
	
    </span>
    </a>
    </div>
</div>

<div style='width:700px; overflow:hidden; clear:both; padding:10px 0px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#6d6d6d;'>
Copyrights © 2015 Danaye
</div>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <team@danaye.com>' . "\r\n";
$headers .= 'Cc: teamboss@danaye.com' . "\r\n";

$mail = mail($to,$subject,$message,$headers);



if($mail){

header("location: forgot_password.php?notindb=true");
}

} else {
header("location: forgot_password.php?notindb=fail");
}
mysql_close($connection); // Closing Connection
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="../styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<!-- Start WOWSlider.com HEAD section -->
<!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="../slider/style.css" />
<script type="text/javascript" src="../slider/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
</head>
<body>
<div class="loginMnDiv">
  <div class="loginDiv">
    <div class="box-login">
      <div>
        <a href="index.php"><label class="left logoTxt"><span>Dana</span>ye </label></a>
        <label class="right"><span class="homeIcn"><a href="index.php"><i class="fa fa-home"></i></a></span></label>
      </div>
      <!-- Members Login -->
      <div class="memberLogin"> Members Login
        <?php 
if($_GET['notindb']=="fail"){?>
        <span style="color: red; margin: 0px; padding: 5px 0px; font-size: 14px; font-weight: normal; display:block;"><?php echo "Sorry. This user not existing with us."?></span>
        <?php } ?>
                <?php 
if($_GET['notindb']=="true"){?>
        <span style="color: green; margin: 0px; padding: 5px 0px; font-size: 14px; font-weight: normal; display:block;"><?php echo "We have sent you password to registered email"?></span>
        <?php } ?>

        <ul>
          <form action="" name="login" method="post">
            <li>
              <div class="fieldDiv">
                <input name="email" type="email" style="width:80%;" placeholder="Email"  required="required"/>
              </div>
            </li>
           
            <li>
              <input name="submit" type="submit" class="defaultBtn" value="Request Password" />
            </li>
          </form>
     
        </ul>
      </div>
      <!-- End hers -->
    </div>
  </div>
</div>
<!-- Start WOWSlider.com BODY section -->
<!-- add to the <body> of your page -->
<div id="wowslider-container1">
  <div class="ws_images">
    <ul>
      <li><img src="../slider/images/1.jpg" alt="1" title="1" id="wows1_0"/></li>
      <li><img src="../slider/images/2.jpg" alt="2" title="2" id="wows1_1"/></li>
      <li><img src="../slider/images/3.jpg" alt="3" title="3" id="wows1_2"/></li>
    </ul>
  </div>
</div>
<script type="text/javascript" src="../slider/wowslider.js"></script>
<script type="text/javascript" src="../slider/script.js"></script>
<!-- End WOWSlider.com BODY section -->
</body>
</html>
