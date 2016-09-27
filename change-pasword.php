<?php session_start();
if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="../font-awesome.min.css" rel="stylesheet" type="text/css"  />
</head>

<body>

<!-- header Starts here -->
<?php include('includes/header.php') ?>
<!-- Ends here -->

<!-- Wrapper Container Starts Here -->
<div class="container">
<div class="wrapperDiv">


  <?php
  if(isset($_POST['sav-new-password'])){
  
   $user_query = mysql_query("SELECT * FROM super_admin WHERE username = '".$_SESSION['super_user']."' LIMIT 1 ");
  $cupass= mysql_fetch_assoc($user_query);
   $cupass['password'];
   $currentpassword = $_POST['currentpassword'];
   $newpassword = $_POST['newpassword'];
   
   
   
   if($cupass['password'] == $currentpassword){
	  // echo "recard Found";
	   $update_query = mysql_query("UPDATE super_admin
SET password='$newpassword' WHERE username='".$_SESSION['super_user']."'");

if($update_query){?>
	<h3 align="left" style="color:#090;">Your New password has been updated...</h3>
	<?php }
	   }else{?>
   <h3 align="left" style="color:red;">Please enter valid current Password</h3>
	   <?php }
  }
   ?>
<form action="" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="20%" align="right" valign="middle">Current Password :</td>
   
    <td width="80%" align="left" valign="middle"><input type="password" name="currentpassword" class="textBox" style="width:50%;" required="required"/></td>
  </tr>
  <tr>
    <td width="20%" align="right" valign="middle">New Password :</td>
    <td width="80%" align="left" valign="middle"><input type="password" name="newpassword" class="textBox" style="width:50%;"  required="required"/></td>
  </tr>
  
  <tr>
    <td width="20%" align="right" valign="middle">&nbsp;</td>
    <td width="80%" align="left" valign="middle"><input type="submit" name="sav-new-password" value="Save New Password" class="submitBtn" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
</table>
</form>
</div>
</div>
<!-- Ends here -->

<!-- Copyright Div -->
<?php include('includes/footer.php') ?>
<!-- Ends here -->


</body>
</html>
<?php }else{
	header('Location: index.php?msg=Please enter your User name and Password.');
}
?>