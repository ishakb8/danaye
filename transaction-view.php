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
<label style="float:left;">
<h1>Transaction Details</h1></label>
<label style="float:right;"><input name="" type="button" value="Back" style="font-size:14px;" class="submitBtn" /></label>
</div>

<div class="wrapperDiv">
	<table width="100%" border="0" cellspacing="2" cellpadding="15">
  <tr>
    <td width="24%" height="30" align="right" valign="middle" bgcolor="#ffffff">Total Price :</td>
    <td width="76%" height="30" align="left" valign="middle" bgcolor="#ffffff" style="color:#e31b23;"><strong>$513</strong></td>
    </tr>
  <tr>
    <td width="24%" height="30" align="right" valign="top" bgcolor="#FFFFFF" >Payment Method :</td>
    <td width="76%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">Credit Card - Visa </td>
    </tr>
 <tr>
    <td width="24%" height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Name on Card :</td>
    <td width="76%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;">Thais Andrade </td>
    </tr>
   <tr>
    <td width="24%" height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Card Number :</td>
    <td width="76%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;">4617863007212663</td>
    </tr>
   <tr>
    <td width="24%" height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Expiration Date :</td>
    <td width="76%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;">8/2019</td>
    </tr>
   <tr>
     <td height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Security Code :</td>
     <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;">994</td>
   </tr>
   <tr>
     <td height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Payment Status :</td>
     <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#008540;">Success</td>
   </tr>
   <tr>
     <td height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Payment Date :</td>
     <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;">09/05/2015 08:01 PM</td>
   </tr>
   <tr>
     <td height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Transaction Id :</td>
     <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;">7502264981</td>
   </tr>
   <tr>
     <td height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Paid amount :</td>
     <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#e31b23;"><strong>$513</strong></td>
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