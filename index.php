<?php
ob_start();
session_start(); // Starting Session
 include('../includes/connect.php');
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
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from super_admin where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['super_user']=$username; // Initializing Session
header("location: home.php"); // Redirecting To Other Page
} else {
$error = "Username or password is invalid";
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
<link href="../font-awesome.min.css" rel="stylesheet" type="text/css"  />
</head>

<body>

<!-- Logo Starts here -->
<div class="logoDiv logoTxt"><span>Dana</span>ye</div>
<!-- Ends here -->


<!-- Login Starts here -->
<div class="loginDiv">
<span style="color:red; text-align:center"><?php echo $error;?></span>

<?php
if($_GET['msg']=="Please enter your User name and Password."){?>
	<h4 style="color:#F30;"><?php echo "Session Expired. Please login again."?></h4>
	
	<?php }
 ?>
<ul><form action="" method="post" name="forml">
	<li><div class="fieldDiv"><input name="email" type="text" style="width:80%;" placeholder="Username"  required="required"/></div></li>
    <li><div class="fieldDiv"><input name="password" type="password" style="width:80%;" placeholder="Password"  required="required"/></div></li>
    <li><input name="submit" type="submit" class="defaultBtn" value="Login" /></li>
    <li><div class="forgotPasswrd"><a href="forgot_password.php">Forgot password?</a></div></li>
</form>
</ul>
</div>
<!-- Ends here -->

<!-- Copyright Div -->
<?php include('includes/footer.php') ?>
<!-- Ends here -->

</body>
</html>
