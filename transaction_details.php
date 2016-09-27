<?php ob_start();

session_start();

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

<div class="container" style="overflow:scroll; height:600px;">
      <div class="hdngDivInn">
    <label style="float:left;">
    <h1>Add Price</h1>
  
    </label>
    <label style="float:right;"></label>
  </div>

      <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
          <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Price </td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
          
          <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">$<?php echo $country_res['price']; ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_add_price.php?price_id=<?php echo $country_res['price_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
        <td width="15%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="add_price.php?delte_id=<?php echo $country_res['price_id']; ?>"><img src="images/delete-icn.png" width="20" height="24" /></a></td>
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