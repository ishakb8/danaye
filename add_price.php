<?php ob_start();

session_start();

if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>
<?php 

if(isset($_POST['addprice'])){
	$continent=$_POST['continent'];
	$territory=$_POST['territory'];
	$country=$_POST['country'];
	$city=$_POST['city'];
	$catid=$_POST['catid'];
	//$subcat=$_POST['sub_cat'];
	$price=$_POST['price'];
	$success="false";
	$getSubCategoriesQry=" SELECT * FROM sub_categories WHERE categories_id ='".$catid."' ORDER BY sub_categories_name";
	$find=mysql_query($getSubCategoriesQry);
	while($row=mysql_fetch_array($find)){
		$subcat=$row['sub_categories_id'];
		$city_query ="INSERT INTO price 
		(continent_id,territory_id,country_id,city_id,category_id,sub_category_id,price,status,time)
		VALUES ('$continent','$territory','$country','$city','$catid','$subcat','$price','Active',now()) ";
		if(mysql_query($city_query)){
			$success="true";
		}
	}
	header('Location: add_price.php?msg='.$success);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="../font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
function fetch_select(val)
{
	$.ajax({
		type: 'post',
		url: '../fetch_data.php',
		data: {
		get_option:val
		},
		success: function (response) {
			document.getElementById("new_select").innerHTML=response; 
		}
	});
}
function fetch_territory(val)
{
    $.ajax({
    type: 'post',
    url: '../fetch_territory.php',
    data: {
    territory_id:val
    },

    success: function (response) {

    document.getElementById("new_territory").innerHTML=response; 

    }

    });

    }

		    function fetch_city(val)

    {

    

    $.ajax({

    type: 'post',

    url: '../fetch_city.php',

    data: {
city_id:val
},
success: function (response) {
document.getElementById("new_city").innerHTML=response; 
}
});
}
function fetch_subcat(val)
{
$.ajax({
type: 'post',
url: '../fetch_subcat.php',
data: {
cat_id:val
},
success: function (response) {
document.getElementById("sub_cat").innerHTML=response; 
}
});
}
 </script>
 <script type="text/javascript">
   <!--
function validateForm()
{
if(document.login.continent.selectedIndex==0)
{ alert("Please select  Continent");
document.login.continent.focus();
return false;
}
if(document.login.territory.selectedIndex==0)
{ alert("Please select Territory");
document.login.territory.focus();
return false;
}
if(document.login.country.selectedIndex==0)
{ alert("Please select Country");
document.login.country.focus();
return false;
}
if(document.login.city.selectedIndex==0)
{ alert("Please select City");
document.login.city.focus();
return false;
}
if(document.login.catid.selectedIndex==0)
{ alert("Please select Category");
document.login.catid.focus();
return false;
}
if( document.login.price.value == "" )
         {
            alert( "Please Enter Price" );
            document.login.price.focus() ;
            return false;
         }
return true;	
}

   //-->

function delProfile(id){
	var cnfrm = confirm("Are you sure you want to delete?");
	if(cnfrm==true){
	$('#pageLoading').css('display','block');
	//alert(dataString);
	$.ajax({
		type: "POST",
		url: "delete_price.php",
		data: {id:id},
		cache: false,
		success: function(html){
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
<div class="container" style="overflow:scroll; height:600px;">
  <div class="hdngDivInn">
    <label style="float:left;">
    <h1>Add Price</h1>
   	</label>
    <form name="login" method="post" action="" onsubmit="return validateForm();">
	<div style="width:80%; overflow:hidden; float:right; text-align:right;">
   		<select name="continent" id="continent" onchange="fetch_select(this.value);" class="textBoxnew selectBox">
            <option> Continent </option>
            <?php $select=mysql_query("select * from continent");
			while($row=mysql_fetch_array($select)){?>
            <option value="<?php echo $row['continent_id'];?>"><?php echo $row['continent_name'];?></option>
            <?php }?>
          </select>
          
          <select name="territory" id="new_select" onchange="fetch_territory(this.value);" class="textBoxnew selectBox">
            <option>Territory</option>
          </select>
          
          <select name="country" id="new_territory" onchange="fetch_city(this.value);" class="textBoxnew selectBox">
            <option>Country</option>
          </select>
          
          <select name="city" id="new_city" class="textBoxnew selectBox">
            <option>City</option>
          </select>
          
          <select name="catid" id="catid" class="textBoxnew selectBox">
            <option>Category</option>
            <?php 
			  $catetch_query=mysql_query("SELECT * FROM categories");
		
			  while($catcat = mysql_fetch_assoc($catetch_query)){?>
            <option value="<?php echo $catcat['category_id'];?>"><?php echo $catcat['category_name'];?></option>
            <?php }  ?>
          </select>
          
         <!-- <select name="sub_cat" id="sub_cat" class="textBoxnew selectBox">
            <option>Sub Category</option>
          </select>-->
          <input type="text" name="price" id="price" placeholder="Enter Price(Ex: 10)" class="textBoxnew"/>          
          <input name="addprice" type="submit" value="Add Price" style="font-size:14px;" class="submitBtn" />
          
    </div>
 	 </form>
  </div>
  
   <?php 

if($_GET['msg']=="true"){?>
    <h3 style="color:#093;" align="center">Price List Added </h3>
    <?php }

if($_GET['del']=="true"){?>
    <h3 style="color:red" align="center">Price Deleted </h3>
    <?php }
	
	if($_GET['updated']=="true"){?>
    <h3 style="color:green" align="center">Price Updated </h3>
    <?php }
	?>
  <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
         <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Territory </td>
          <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Country </td>
          <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">City </td>
           <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Category </td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Price </td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $country_fetch_query = mysql_query("SELECT p.price_id, p.price, tr.territory_name, cn.country_name, cat.category_name, ct.city_name
FROM price p
LEFT OUTER JOIN country cn ON cn.country_id = p.country_id
LEFT OUTER JOIN  categories cat ON cat.category_id = p.category_id
LEFT OUTER JOIN territory tr ON tr.territory_id = p.territory_id
LEFT OUTER JOIN city ct ON ct.city_id = p.city_id");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>
      <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
         <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['territory_name']; ?></td>
          <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['country_name']; ?></td>
           <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['city_name']; ?></td>
           <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['category_name']; ?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">$<?php echo $country_res['price']; ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_add_price.php?price_id=<?php echo $country_res['price_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
         <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $country_res['price_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
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
