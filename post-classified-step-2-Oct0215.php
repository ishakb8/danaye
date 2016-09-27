<?php 

ob_start();

session_start();

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







</head>

<body>



<!-- Header Starts here -->

<?php include('includes/post-header.php');?>

<!-- Ends here -->



<!-- Menu Starts here -->

<div class="menuDiv">







</div>

<!-- Ends here -->



<!-- steps Div Starts here -->

<div class="stepsDiv">

please limit each posting to a single area and category, once per <span>48 hours</span>

<img src="images/step-2.jpg" height="112" width="935" border="0" />

</div>

<!-- Ends here -->



<!-- Grey Content Starts here -->

<div class="greyDivPost">

<div class="postContDiv">

	<div class="postContDiv-row1">

    <form action="post-classified-step-3.php" method="post" name="firststep">



    please choose a category
  <fieldset class="feildsetBorder">

    <legend>Pricing info</legend>


    <input name="city_id" type="hidden" value="<?php echo $city_id; ?>" class="textBox" />
    <input name="categories_id" value="<?php echo $categories_id; ?>" type="hidden" class="textBox" />
<?php
$pricing_query = mysql_query("SELECT * FROM `price` WHERE city_id = '$city_id' AND category_id = '$categories_id'"); 

while($price_res = mysql_fetch_assoc($pricing_query)){?>

<?php if($price_res['category_id']== 12 || $price_res['category_id']== 11){?>
	<h2 style="color:#0C3;">Price: $<?php echo $price_res['price'];?> USD per category selected [?]</h2>
	<?php }?>
<?php }?>


    
    </fieldset>

    <ul>

    <?php

	$sub_categories_query = mysql_query("SELECT * FROM sub_categories WHERE categories_id='".$categories_id."'");

	 while($sub_categories_res=mysql_fetch_assoc($sub_categories_query)){?>

     







<li><input type="radio" name="sub_categories_id" value="<?php echo $sub_categories_res['sub_categories_id'];?>"> <?php echo $sub_categories_res['sub_categories_name'];?></li>

    <?php }?>

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









    <input type="submit" name="secondbtn" value="Next" class="upload" style="background-color: #F00;
border: 1px solid #F00;
color: #FFF;
border-radius: 5px;
padding: 10px; width:20%;" />

</div>

    </form>



<?php include('includes/footer.php') ?>





</body>

</html>

<?php }else{

	header('Location:  login.php?msg=Please enter your User name and Password.');

}

?>