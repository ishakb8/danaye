<?php ob_start();

session_start();

if($_SESSION['super_user']){ ?>

<?php include('../includes/connect.php');?>

<?php 

if(isset($_POST['sucatbtn'])){

$sub_cat_name = $_POST['sub_cat_name'];



$catid =$_POST['catid'];



 $addcountry_query = mysql_query("INSERT INTO sub_categories (sub_categories_name, categories_id, status,time)

VALUES ('".$sub_cat_name."','".$catid."', 'Active',now() )");

if($addcountry_query){

	header('Location: sub_categories.php?msg=true');

	}



}

?>

<?php

$delte_id = $_GET['delte_id'];



if(isset($_GET['delte_id'])){





	$delte_query=mysql_query("DELETE FROM sub_categories

WHERE sub_categories_id = '".$delte_id."'");

	

	if($delte_query){

	 header('Location: sub_categories.php?del=true');

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

<script>

   function valueselect(sel) {

      var value = sel.options[sel.selectedIndex].value;

      window.location.href = "country.php?ct="+value;

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

    <h1>Sub Categories</h1>

    <?php 

if($_GET['msg']=="true"){?>

    <h3 style="color:#093;" align="center">Sub Category Added </h3>

    <?php }

if($_GET['del']=="true"){?>

    <h3 style="color:red" align="center">Sub Category Deleted </h3>

    <?php }
	if($_GET['updated']=="true"){?>

    <h3 style="color:green" align="center">Sub Category Updated </h3>

    <?php }
	?>

    </label>

    <label style="float:right;"></label>

  </div>

  <form name="from" method="post" action="">

    <table width="60%" border="0" cellspacing="0" cellpadding="5">

      <tr>

      

      <td> <select name="catid" class="textBox">

          <option>Category</option>

      <?php 

	  $catetch_query=mysql_query("SELECT * FROM categories");

	  while($catcat = mysql_fetch_assoc($catetch_query)){?>

		 

            <option value="<?php echo $catcat['category_id'];?>"><?php echo $catcat['category_name'];?></option>

       

		  

		  <?php }

	  ?>

         </select>

   

       <input type="text" name="sub_cat_name" class="textBox" style="width:50%;" placeholder="Enter Sub Category name"  required="required"/>

       <input name="sucatbtn" type="submit" value="Add Sub Category" style="font-size:14px;" class="submitBtn" /></td>

      </tr>

    </table>

  </form>

  <div class="wrapperDiv">

    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">

      <tr>

        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>

        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Sub Category Name</td>

        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>

        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>

      </tr>

      <?php $country_fetch_query = mysql_query("SELECT * FROM sub_categories");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>

      <tr>

        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>

        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo ucfirst($country_res['sub_categories_name']); ?></td>

        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_sub_categories.php?sub_categories_id=<?php echo $country_res['sub_categories_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>

        <td width="15%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="sub_categories.php?delte_id=<?php echo $country_res['sub_categories_id']; ?>"><img src="images/delete-icn.png" width="20" height="24" /></a></td>

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