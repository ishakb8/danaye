<?php 
ob_start();
session_start();
if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>

<!-------------->
<?php 
$edit_id=$_GET['edit_id'];
if(isset($_POST['submit'])){
	
	@$pagetitle= $_POST['pagetitle'];
	 @$product_content= $_POST['product_content'];
	
	 $querypage = mysql_query("UPDATE pages SET page_title='".$pagetitle."',page_content='".$product_content."' WHERE page_id='".$edit_id."'");


if($querypage){
   header('Location: cms_edit_page.php?msg=true');
}
	}
?>
<!-------------->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="../font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>

<!-- header Starts here -->
<?php include('includes/header.php') ?>
<!-- Ends here --> 

<!-- Wrapper Container Starts Here -->
<div class="container">
  <div class="wrapperDiv">
    <?php 
	  if($_GET['msg']=="true"){?>
    <h4 style="color:#093;"><?php echo "Page data inserted"?></h4>
       <?php header('Location: cms_edit.php'); ?>

    <?php }?>
    <?php 


$sql = "SELECT * FROM pages WHERE page_id = '".$edit_id."' ";
$res = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

while($pager = mysql_fetch_assoc($res)){?>
    <form name="" method="post">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="20%" align="right" valign="middle">Page Title :</td>
          <td width="80%" align="left" valign="middle"><input type="text" name="pagetitle" class="textBox" style="width:50%;" value="<?php  echo $pager['page_title'];?>"  required="required"/></td>
        </tr>
        <tr>
          <td width="20%" align="right" valign="top">Description :</td>
          <td width="80%" align="left" valign="middle"><textarea name="product_content" id="product_desc" class="ckeditor" cols="30" rows="15" > <?php  echo $pager['page_content'];?>
</textarea></td>
        </tr>
        <tr>
          <td width="20%" align="right" valign="middle">&nbsp;</td>
          <td width="80%" align="left" valign="middle"><input type="submit" name="submit" value="Save Page" class="submitBtn" /></td>
        </tr>
      </table>
    </form>
    <?php }
?>
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