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
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>

   function valueselect(sel) {

      var value = sel.options[sel.selectedIndex].value;

      window.location.href = "country.php?ct="+value;

   }

</script>
<script type="text/javascript">
function validateForm()
{
if(document.login.catid.selectedIndex==0)
{ alert("Please select  Categories");
document.login.catid.focus();
return false;
}
if( document.login.sub_cat_name.value == "" )
         {
            alert( "Please Enter Sub Categories" );
            document.login.sub_cat_name.focus() ;
            return false;
         }

return true;	
}

function delProfile(id){
	var cnfrm = confirm("Are you sure you want to delete?");
	if(cnfrm==true){
	$('#pageLoading').css('display','block');
	//alert(dataString);
	$.ajax({
		type: "POST",
		url: "delete_subcategory.php",
		data: {id:id},
		cache: false,
		success: function(html){
				alert(html);
				if(html){		
					alert('Profile deleted successfully.');
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
    <h1>Sub Categories</h1>
   </label>
    <label>
    <form name="login" method="post" action="" onsubmit="return validateForm();">
     <div style="width:70%; overflow:hidden; float:right; text-align:right;">
    <select name="catid" class="textBoxnew selectBox">
            <option>Category</option>
            <?php 

	  $catetch_query=mysql_query("SELECT * FROM categories");

	  while($catcat = mysql_fetch_assoc($catetch_query)){?>
            <option value="<?php echo $catcat['category_id'];?>"><?php echo $catcat['category_name'];?></option>
            <?php }

	  ?>
          </select>
          
          <input type="text" name="sub_cat_name" class="textBoxnew" placeholder="Enter SubCategory"   style="width:200px;"/>
          
          <input name="sucatbtn" type="submit" value="Add Sub Category" style="font-size:14px;" class="submitBtn" />
          </div>
  </form>
    </label>
  </div>
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
  
  <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Category Name</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Sub Category Name</td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $country_fetch_query = mysql_query("SELECT sub_categories.sub_categories_id, sub_categories.sub_categories_name, categories.category_name
FROM sub_categories
INNER JOIN categories ON sub_categories.categories_id = categories.category_id ORDER BY  category_name, sub_categories_name");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>
      <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
         <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo ucfirst($country_res['category_name']); ?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo ucfirst($country_res['sub_categories_name']); ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_sub_categories.php?sub_categories_id=<?php echo $country_res['sub_categories_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
        <td width="15%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $country_res['sub_categories_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
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
