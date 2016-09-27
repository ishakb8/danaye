<?php session_start();
if($_SESSION['super_user']){ ?>

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

<div class="hdngDivInn">
<label style="float:left;"><h1>User</h1></label>
</div>
<div class="wrapperDiv">
	<table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
  <tr>
    <td width="7%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
    <td width="15%" height="30" align="left" valign="middle" bgcolor="#ffffff">Name</td>
    <td width="22%" height="30" align="left" valign="middle" bgcolor="#ffffff">Email Id</td>
    <td width="16%" height="30" align="left" valign="middle" bgcolor="#ffffff">Phone</td>
    <td width="11%" height="30" align="left" valign="middle" bgcolor="#ffffff">Status</td>
    <td width="7%" height="30" align="center" valign="middle" bgcolor="#ffffff">View</td>
    <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
  </tr>
  <tr>
    <td width="7%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">1</td>
    <td width="15%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">Thais andrade</td>
    <td width="22%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">thaisandrade@gmail.com</td>
    <td width="16%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">4617863007212663</td>
    <td width="11%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#008540; ">New</td>
    <td width="7%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><img src="images/view-icn.png" width="20" height="22" /></td>
    <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><img src="images/delete-icn.png" width="20" height="24" /></td>
  </tr>
   <tr>
    <td width="7%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">1</td>
    <td width="15%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">Thais andrade</td>
    <td width="22%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">thaisandrade@gmail.com</td>
    <td width="16%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">4617863007212663</td>
    <td width="11%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#008540; ">New</td>
    <td width="7%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><img src="images/view-icn.png" width="20" height="22" /></td>
    <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><img src="images/delete-icn.png" width="20" height="24" /></td>
  </tr>
   <tr>
    <td width="7%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">1</td>
    <td width="15%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">Thais andrade</td>
    <td width="22%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">thaisandrade@gmail.com</td>
    <td width="16%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">4617863007212663</td>
    <td width="11%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#008540; ">New</td>
    <td width="7%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><img src="images/view-icn.png" width="20" height="22" /></td>
    <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><img src="images/delete-icn.png" width="20" height="24" /></td>
  </tr>
</table>

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