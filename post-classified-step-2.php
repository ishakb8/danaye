<?php 

ob_start();

session_start();
//print_r($_SESSION);
if($_SESSION['login_user']){ ?>
<?php  include('includes/connect.php');?>
<?php 

if(isset($_POST['firstbtn'])){

 $continent_id = $_POST['continent'];

 $territory_id= $_POST['territory'];

 $country_id= $_POST['country'];

 $city_id= $_POST['city'];

 $categories_id= $_POST['categories'];



	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript">
function totalFindFunction()
{//alert("hi");
	var countofrecords = document.getElementById("countofrecords").value;
	var i=0;
		
	for(var j=1; j<=countofrecords; j++)
	{
		var checkid = "sub_categories_id"+j;
		if(document.getElementById(checkid).checked==true)
		{
			i = Number(i)+1;
		}
		
	}
var actualprice = document.getElementById("actualprice").value;
	var price = document.getElementById("price").value;
	var finalresult = Number(actualprice) * Number(i);
	pricehtml
	document.getElementById("price").value = finalresult;
	document.getElementById("pricehtml").innerHTML ="$ "+ finalresult;
}

</script>
<script type="text/javascript"> 
function validate(form) { 
// Checking if at least one period button is selected. Or not. 
if (!document.firststep.sub_categories_id[0].checked && !document.firststep.sub_categories_id[1].checked){ 

alert("Please Check Options"); 
return false;}



return true;
}
</script>
</head>
<body>
<!-- Header Starts here -->
<?php include('includes/post-header.php');?>
<!-- Ends here --> 
<!-- steps Div Starts here -->
<div class="stepsDiv"> please limit each posting to a single area and category, once per <span>48 hours</span> <img src="images/step-2.jpg" height="112" width="935" border="0" /> </div>
<!-- Ends here --> 
<!-- Grey Content Starts here -->
<form action="post-classified-step-3.php" method="post" name="firststep" onsubmit="return validate(this);">
  <div class="greyDivPost">
    <div class="postContDiv">
      <div class="postContDiv-row1"> please choose a category
	  <?php if($categories_id == 11 || $categories_id == 12) {
		  
	  
?>
        <fieldset class="feildsetBorder">
          <legend>Pricing info</legend>
          <input name="city_id" type="hidden" value="<?php echo $city_id; ?>" class="textBox" />
          <input name="categories_id" value="<?php echo $categories_id; ?>" type="hidden" class="textBox" />
          <?php
$pricing_query = mysql_query("SELECT * FROM `price` WHERE city_id = '$city_id' AND category_id = '$categories_id'"); 
$price_res = mysql_fetch_array($pricing_query);
 ?>
          <h2 style="text-align:center; color:#333333;">Price: <span style="color:#cc0000;" id="pricehtml">$<?php echo $price_res['price'];?></span> per category selected [?]</h2>
          <input type="hidden" name="price" id="price" value="<?php echo $price_res['price'];?>" />
          <input type="hidden" name="actualprice" id="actualprice" value="<?php echo $price_res['price'];?>" />
	  </fieldset> <?php  } ?>
        <ul>
          <?php

	$sub_categories_query = mysql_query("SELECT * FROM sub_categories WHERE categories_id='".$categories_id."'");
	$sub_categories_query_records = mysql_num_rows($sub_categories_query);
?>
          <input type="hidden" name="countofrecords" id="countofrecords" value="<?php echo $sub_categories_query_records; ?>" />
          <?php
	$m = 1;
	 while($sub_categories_res=mysql_fetch_assoc($sub_categories_query)){?>
          <li>
            <input type="checkbox" name="sub_categories_id[]" id="sub_categories_id<?php echo $m; ?>" onclick="return totalFindFunction();" value="<?php echo $sub_categories_res['sub_categories_id'];?>">
            <?php echo $sub_categories_res['sub_categories_name'];?></li>
          <?php $m++; }?>
        </ul>
      </div>
    </div>
  </div>
  <!-- Ends here -->
  <div class="continueBtnDiv">
    <input type="hidden" name="continent_id" value="<?php echo $continent_id;?>">
    <input type="hidden" name="territory_id" value="<?php echo $territory_id;?>">
    <input type="hidden" name="country_id" value="<?php echo $country_id;?>">
    <input type="hidden" name="city_id" value="<?php echo $city_id;?>">
    <input type="hidden" name="categories_id" value="<?php echo $categories_id;?>">
    <input type="hidden" name="gallery_id" value="<?php echo $file_name_array;?>">
    <input type="submit" name="secondbtn" value="Next" class="defaulthBtn" onClick = "valthisform();"/>
  </div>
</form>
<?php include('includes/footer.php') ?>
</body>
</html>
<?php }else{

	header('Location:  login.php?msg=Please enter your User name and Password.');

}

?>
