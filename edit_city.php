<?php ob_start();

session_start();

if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>
<?php 
$edit_id = $_GET['edit_id'];
if(isset($_POST['countrybtn'])){
	
	 $city_name = $_POST['city'];
	 
	 $update_query= mysql_query("UPDATE `city` SET `city_name`='$city_name ' WHERE city_id = '$edit_id'");
	 if($update_query){
		 header("Location: city.php?updated=true");
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

<!-- Add Country Popup -->

<div class="popup-container" style="display:none;">
  <div class="popup-white">
    <div class="popuphdngDiv">
      <label class="hdngTxt-popup">Update City</label>
      <div class="closeBtn-popup"><img src="images/close-btn.jpg" height="54" width="62" border="0" /></div>
    </div>
    
  </div>
</div>

<!-- Email to friend Popup --> 

<!-- header Starts here -->

<?php include('includes/header.php') ?>

<!-- Ends here --> 

<!-- Wrapper Container Starts Here -->

<div class="container">
  <div class="hdngDivInn">
    <label style="float:left;">
    <h1>Edit City</h1>
   
    </label>
    <label style="float:right;"></label>
  </div>

  <div class="wrapperDiv">

      <form action="" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">City Name</td>
      </tr>
      <?php $edit_query = mysql_query("SELECT * FROM `city` WHERE `city_id`='$edit_id'");
	  while($edit_res= mysql_fetch_assoc($edit_query)){?>
      
        <tr>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><input type="text" name="city" value="<?php echo $edit_res['city_name'];?>" class="textBox" />
        <input type="submit" name="countrybtn" value="Update" class="submitBtn" /></td>
      </tr>
	 <?php } ?>
    </table></form>
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