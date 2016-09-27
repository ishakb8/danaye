<?php session_start();

if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>
<?php

$delte_id = $_GET['delte_id'];

if(isset($_GET['delte_id'])){

	$delte_query=mysql_query("DELETE FROM registration WHERE registration_id = '".$delte_id."'");

	if($delte_query){

		header('Location: userdetails.php?del=true');

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

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function delProfile(id){
	var cnfrm = confirm("Are you sure you want to delete?");
	if(cnfrm==true){
	$('#pageLoading').css('display','block');
	//alert(dataString);
	$.ajax({
		type: "POST",
		url: "delete_user.php",
		data: {id:id},
		cache: false,
		success: function(html){
				alert(html);
				if(html){		
					//alert('Profile deleted successfully.');
					window.location.reload();
				}
			}
	});
	}
}
</script>
</head>

<body>

<!-- header Starts here -->

<?php include('includes/header.php') ?>

<!-- Ends here --> 

<!-- Wrapper Container Starts Here -->

<div class="container">
  <div class="hdngDivInn">
    <label style="float:left;">
    <h1>Admin Details</h1>
    </label>
    <label style="float:right;">
      <input name="" type="button" value="Back" style="font-size:14px;" class="submitBtn" />
    </label>
  </div>
 <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="6%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="11%" height="30" align="left" valign="middle" bgcolor="#ffffff">User Name</td>
        <td width="23%" height="30" align="center" valign="middle" bgcolor="#ffffff">Email</td>
       
        <td width="16%" height="30" align="center" valign="middle" bgcolor="#ffffff">Contact Number</td>
         <td width="23%" height="30" align="center" valign="middle" bgcolor="#ffffff">Date</td>
        
        <td width="17%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $user_fetch_query = mysql_query("SELECT * from  registration");

	 $i=1;

	  while($user_res=mysql_fetch_assoc($user_fetch_query)){?>
      <tr>
        <td width="6%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
        <td width="11%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $user_res['name']; ?></td>
        <td width="23%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $user_res['email']; ?></td>
        
        <td width="16%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $user_res['contact']; ?></td>
        <td width="11%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $user_res['date']; ?></td>
        
      
        
         <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $user_res['registration_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
      </tr>
      <?php }?>
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