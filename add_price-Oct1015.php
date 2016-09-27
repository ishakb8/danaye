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

$subcat=$_POST['sub_cat'];

$price=$_POST['price'];







$city_query =mysql_query("INSERT INTO price (continent_id,territory_id,country_id,city_id,category_id,sub_category_id,price,status,time)

VALUES ('$continent','$territory','$country','$city','$catid','$subcat','$price','Active',now());");

if($city_query){

	sleep(1);	

	header('Location: add_price.php?msg=true');

	//echo "addred";

	}

}

?>
<?php

$delte_id = $_GET['delte_id'];

if(isset($_GET['delte_id'])){

	$delte_query=mysql_query("DELETE FROM price WHERE price_id = '".$delte_id."'");

	if($delte_query){

		header('Location: add_price.php?del=true');

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
    </label>
    <label style="float:right;"></label>
  </div>
      <form name="" method="post" action="">
    <table width="60%" border="0" cellspacing="0" cellpadding="5">
          <tr>
        <td><select name="continent" onchange="fetch_select(this.value);" class="textBox">
            <option> Select Continent </option>
            <?php

$select=mysql_query("select * from continent");

while($row=mysql_fetch_array($select)){?>
            <option value="<?php echo $row['continent_id'];?>"><?php echo $row['continent_name'];?></option>
            <?php }?>
          </select></td>
        <td><select name="territory" class="textBox" id="new_select" onchange="fetch_territory(this.value);">
            <option>Select Territory</option>
          </select></td>
        <td><select name="country" class="textBox" id="new_territory" onchange="fetch_city(this.value);">
            <option>Select Country</option>
          </select></td>
        <td><select name="city" class="textBox" id="new_city">
            <option>Select Country</option>
          </select></td>
      </tr>
          <tr>
        <td><select name="catid" class="textBox"  onchange="fetch_subcat(this.value);">
            <option>Category</option>
            <?php 

	  $catetch_query=mysql_query("SELECT * FROM categories");

	  while($catcat = mysql_fetch_assoc($catetch_query)){?>
            <option value="<?php echo $catcat['category_id'];?>"><?php echo $catcat['category_name'];?></option>
            <?php }

	  ?>
          </select></td>
        <td><select name="sub_cat" class="textBox" id="sub_cat">
            <option>Select Sub Category</option>
          </select></td>
        <td><input type="text" name="price" placeholder="Enter Price(Ex:10)" class="textBox"  /></td>
        <td><input name="addprice" type="submit" value="Add Price" style="font-size:14px;" class="submitBtn" /></td>
      </tr>
        </table>
  </form>
      <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
          <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Price </td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
          <?php $country_fetch_query = mysql_query("SELECT * FROM price");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>
          <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;">$<?php echo $country_res['price']; ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_add_price.php?price_id=<?php echo $country_res['price_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
        <td width="15%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="add_price.php?delte_id=<?php echo $country_res['price_id']; ?>"><img src="images/delete-icn.png" width="20" height="24" /></a></td>
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