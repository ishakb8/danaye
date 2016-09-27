<?php
ob_start();
session_start(); // Starting Session

 include('includes/connect.php');?>
<?php
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
 $username=$_POST['email'];
 $password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
//$password = stripslashes($password);
//$username = $username;
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from registration where password='$password' AND email='$username' AND status = 'Active'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: user-admin/home.php"); // Redirecting To Other Page
} else {
header("location: login.php?magg=fail");
}
mysql_close($connection); // Closing Connection
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<!-- Start WOWSlider.com HEAD section -->
<!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="slider/style.css" />
<script type="text/javascript" src="slider/jquery.js"></script>
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
if($_GET['mag']=="fail"){?>
        <span style="color: #666666; margin: 0px; padding: 5px 0px; font-size: 14px; font-weight: normal; display:block;"><?php echo "Session Expired. Please login again."?></span>
        <?php } ?>
        <?php 
        if($_GET['magg']=="fail"){?>
        <span style="color:red; margin: 0px; padding: 5px 0px; font-size: 14px; font-weight: normal; display:block;"><?php echo "Email or Password wrong"?></span>
        <?php } ?>
        
        <?php
if($_GET['msg']=="Please enter your User name and Password."){?>
        <span style="color: #666666; margin: 0px; padding: 5px 0px; font-size: 14px; font-weight: normal;  display:block;"><?php echo "Session Expired. Please login again."?></span>
        <?php }
 ?>
        <ul>
          <form action="" name="login" method="post">
            <li>
              <div class="fieldDiv">
                <input name="email" type="email" style="width:80%;" placeholder="Email"  required="required"/>
              </div>
            </li>
            <li>
              <div class="fieldDiv">
                <input name="password" type="password" style="width:80%;" placeholder="Password" required="required"/>
              </div>
            </li>
            <li>
              <input name="submit" type="submit" class="defaultBtn" value="Login" />
            </li>
          </form>
          <li>
           <div class="forgotPasswrd" style=" overflow:hidden;"><label style="float:left;"><a href="signup.php">Create Account</a></label>
            <label style="float:right;"><a href="forgot_password.php">Forgot password?</a></label></div>
          </li>
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
      <li><img src="slider/images/1.jpg" alt="1" title="1" id="wows1_0"/></li>
      <li><img src="slider/images/2.jpg" alt="2" title="2" id="wows1_1"/></li>
      <li><img src="slider/images/3.jpg" alt="3" title="3" id="wows1_2"/></li>
    </ul>
  </div>
</div>
<script type="text/javascript" src="slider/wowslider.js"></script>
<script type="text/javascript" src="slider/script.js"></script>
<!-- End WOWSlider.com BODY section -->
</body>
</html>
