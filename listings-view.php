<?php 
ob_start();
session_start();
if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php') ?>
<?php  $posting_id = $_GET['posting_id'];?>

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
<label style="float:left;"><h1>Listing Details</h1></label>
<label style="float:right;"><a href="listings.php"><input name="" type="button" value="Back" style="font-size:14px;" class="submitBtn" /></a></label>
</div>

<div class="wrapperDiv">
  <?php 
  $listing_query = mysql_query("
SELECT p.posting_id, p.posting_title, p.posting_description, p.posting_status, cn.country_name, cat.category_name, sc.sub_categories_name, tr.territory_name, ct.city_name
FROM postings p
LEFT OUTER JOIN country cn ON cn.country_id = p.country_id
LEFT OUTER JOIN sub_categories sc ON sc.sub_categories_id = p.sub_categories_id
LEFT OUTER JOIN categories cat ON cat.category_id = p.categories_id
LEFT OUTER JOIN territory tr ON tr.territory_id = p.territory_id
LEFT OUTER JOIN city ct ON ct.city_id = p.city_id 
WHERE posting_id = '".$posting_id ."'
");

while($list_res = mysql_fetch_assoc($listing_query)){?>
 

	<table width="100%" border="0" cellspacing="2" cellpadding="15">
  <tr>
    <td width="24%" height="30" align="right" valign="middle" bgcolor="#ffffff">Title :</td>
    <td width="76%" height="30" align="left" valign="middle" bgcolor="#ffffff" style="color:#6d6d6d;"><?php echo $list_res['posting_title'];?></td>
    </tr>
  <tr>
    <td width="24%" height="30" align="right" valign="top" bgcolor="#FFFFFF" >Description :</td>
    <td width="76%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['posting_description'];?> </td>
    </tr>
     <tr>
    <td width="24%" height="30" align="right" valign="top" bgcolor="#FFFFFF" >Territory :</td>
    <td width="76%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['territory_name'];?> </td>
    </tr>

   <tr>
    <td width="24%" height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Country :</td>
    <td width="76%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['country_name'];?></td>
    </tr>
     <tr>
    <td width="24%" height="30" align="right" valign="top" bgcolor="#FFFFFF" >City :</td>
    <td width="76%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['city_name'];?> </td>
    </tr>
   <tr>
    <td width="24%" height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Category :</td>
    <td width="76%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['category_name'];?></td>
    </tr>
   <tr>
     <td height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Sub Category :</td>
     <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['sub_categories_name'];?></td>
   </tr>
   <tr>
     <td height="30" align="right" valign="middle" bgcolor="#FFFFFF" >Images :</td>
     <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="color:#6d6d6d;">
   <?php 
$image_query=mysql_query("SELECT * FROM `postings_images` WHERE posting_id='".$posting_id."'");
while($images_res = mysql_fetch_assoc($image_query)){?>
 <img src="../posting_uploads/<?php echo $images_res['posting_paths'];?>" width="200" height="150"/><a href="#"><img src="../images/delete-icn.png" /></a> 
<?php } ?></td>




   </tr>
</table>
<?php }?>
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