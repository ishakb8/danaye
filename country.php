<?php ob_start();

session_start();

if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>
<?php 

if(isset($_POST['addcountry'])){
 
	 $country = $_POST['country'];

	 $contient = $_GET['ct'];

	  $territory = $_POST['teritory'];

 $addcountry_query = mysql_query("INSERT INTO country (country_name, continent_id, territory_id,status,time)

VALUES ('".$country."', '".$contient."', '".$territory."', 'Active',now() )");

if($addcountry_query){
	sleep(2);	
	header('Location: country.php?msg=true');
	}



}

?>
<?php

$delte_id = $_GET['delte_id'];
if(isset($_GET['delte_id'])){
$delte_query=mysql_query("DELETE FROM country WHERE country_id = '".$delte_id."'");
	if($delte_query){
	 header('Location: country.php?del=true');
	}}
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
function delProfile(id){
	var cnfrm = confirm("Are you sure you want to delete?");
	if(cnfrm==true){
	$('#pageLoading').css('display','block');
	//alert(dataString);
	$.ajax({
		type: "POST",
		url: "delete_country.php",
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

<!-- Add Country Popup -->

<div class="popup-container" style="display:none;">
  <div class="popup-white">
    <div class="popuphdngDiv">
      <label class="hdngTxt-popup">Add Country</label>
      <div class="closeBtn-popup"><img src="images/close-btn.jpg" height="54" width="62" border="0" /></div>
    </div>
    <div class="clear popupFormDiv">
      <ul>
        <li>Select Main Category<br />
          <select class="poptxtBox" style="width:91%;">
            <option>Services</option>
          </select>
        </li>
        <li>Select Sub Category<br />
          <input name="" type="text" placeholder="Environment" class="poptxtBox" style="width:86%;"/>
        </li>
        <li>
          <input name="" type="button" value="Submit" class="popbtn" style="width:90%;" />
        </li>
      </ul>
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
    <h1>Countries</h1>
    </label>
    <label>
    <form name="" method="post" action="">
    <div style="width:80%; overflow:hidden; float:right; text-align:right;">
    
    	<!----------------------Select Contient--------------------------------------->
         <select name="continent" id="enterprisebox" onchange="javascript:valueselect(this)" class="textBoxnew selectBox">
            <option>Continent</option>
            <?php $continet_query=mysql_query(" SELECT * FROM `continent`");
			while($contient=mysql_fetch_assoc($continet_query)){?>
            <option value="<?php echo $contient['continent_id']; ?>"><?php echo $contient['continent_name']; ?></option>
            <?php }?>
          </select>
          
          <select name="teritory" class="textBoxnew selectBox">
            <option> Territory</option>
            <?php $continent_id = $_GET['ct']; $territory_query=mysql_query(" SELECT * FROM `territory` WHERE continent_id ='".$continent_id."' ");
			while($territory=mysql_fetch_assoc($territory_query)){?>
            <option value="<?php echo $territory['territory_id']; ?>"><?php echo $territory['territory_name']; ?></option>
            <?php }?>
          </select>
          <input type="text" name="country" class="textBoxnew"  placeholder="Enter Country"  required="required"/>
          <input name="addcountry" type="submit" value="Add Country" style="font-size:14px;" class="submitBtn" />
 </div>
     </form>
    </label>
  </div>
  
  <?php 

if($_GET['msg']=="true"){?>
    <h3 style="color:#093;" align="center">Country List Added </h3>
    <?php }

if($_GET['del']=="true"){?>
    <h3 style="color:red" align="center">Country Deleted </h3>
    <?php }

if($_GET['updated']=="true"){?>
    <h3 style="color:green" align="center">Country Updated </h3>
    <?php }
?>
  
  
  <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Territory Name</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Country Name</td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $country_fetch_query = mysql_query("SELECT country.country_id, country.country_name, territory.territory_name
FROM country
INNER JOIN territory ON country.continent = territory.continent");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>
      <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
          <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['territory_name']; ?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['country_name']; ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_country.php?country_id=<?php echo $country_res['country_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
         <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $country_res['country_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
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