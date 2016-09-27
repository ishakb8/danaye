<?php 

ob_start();

session_start();

if($_SESSION['login_user']){ ?>

<?php  include('includes/connect.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Danaye-Classified Directory Online</title>

    <link href="styles.css" rel="stylesheet" type="text/css" />

    <link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script type="text/javascript">

    

    function fetch_select(val)

    {

    

    $.ajax({

    type: 'post',

    url: 'fetch_data.php',

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

    url: 'fetch_territory.php',

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

    url: 'fetch_city.php',

    data: {

    city_id:val

    },

    success: function (response) {

    document.getElementById("new_city").innerHTML=response; 

    }

    });

    }

    

    </script>

    </head>

    <body>



<!-- Header Starts here -->

<?php include('includes/post-header.php');?>

<!-- Ends here --> 



<!-- Menu Starts here -->

<div class="menuDiv"> </div>

<!-- Ends here --> 



<!-- steps Div Starts here -->

<div class="stepsDiv"> please limit each posting to a single area and category, once per <span>48 hours</span> <img src="images/step-1.png" height="114" width="935" border="0" /> </div>

<!-- Ends here --> 



<!-- Grey Content Starts here -->



<div class="greyDivPost">

<div class="postContDiv">

<div class="postContDiv-row1">

<form action="post-classified-step-2.php" method="post" name="firststep" enctype="multipart/form-data">

      <fieldset>

    <legend>Select Continent </legend>

    <ul>

          <li>

        <select name="continent" onchange="fetch_select(this.value);" class="textBox">

              <option> Select Continent </option>

              <?php

$select=mysql_query("select * from continent");

while($row=mysql_fetch_array($select)){?>

              <option value="<?php echo $row['continent_id'];?>"><?php echo $row['continent_name'];?></option>

              <?php }?>

            </select>

      </li>

          <li>

        <select name="territory" class="textBox" id="new_select" onchange="fetch_territory(this.value);">

              <option>Select Territory</option>

            </select>

      </li>

          <li>

        <select name="country" class="textBox" id="new_territory" onchange="fetch_city(this.value);">

              <option>Select Country</option>

            </select>

      </li>

          <li>

        <select name="city" class="textBox" id="new_city">

              <option>Select City</option>

            </select>

      </li>

        </ul>

  </fieldset>

      <fieldset>

    <legend> what type of posting is this </legend>

    <ul>

          <?php 



$categories_query = mysql_query("SELECT * FROM categories");



while($categories_res=mysql_fetch_assoc($categories_query)){?>

          <li>

        <input type="radio" name="categories" value="<?php echo $categories_res['category_id'];?>">

        <?php echo $categories_res['category_name'];?></li>

          <?php }?>
          
          

        </ul>
<?php 
if($categories_res['category_name'] =="Jobs"){
	echo "you have selected jobs group";
	}

?>
  </fieldset>

      </div>

      <div class="postContDiv-row2"><strong>posting guidelines for Housing</strong></div>

      <div class="postContDiv-row3"> please do include the following :

    <ul>

          <li><i class="fa fa-angle-double-right"></i> Specific description of role and responsibilities</li>

          <li><i class="fa fa-angle-double-right"></i> Compensation and benefit information</li>

          <li><i class="fa fa-angle-double-right"></i> Information about the employer</li>

        </ul>

  </div>

      <div class="postContDiv-row3"> please do include the following :

    <ul>

          <li><i class="fa fa-angle-double-right"></i> Business opportunities</li>

          <li><i class="fa fa-angle-double-right"></i> Unpaid internships, barters, deferred pay, etc</li>

          <li><i class="fa fa-angle-double-right"></i> Multilevel or referral marketing</li>

          <li><i class="fa fa-angle-double-right"></i> Jobs requiring upfront fees</li>

          <li><i class="fa fa-angle-double-right"></i> Ads for services or vocational training</li>

          <li><i class="fa fa-angle-double-right"></i> The same job to multiple areas or categories</li>

        </ul>

  </div>

      </div>

      </div>

      <!-- Ends here -->

      

      <div class="continueBtnDiv">

        



















    <input type="submit" name="firstbtn" value="Next" class="upload" style="background-color: #F00;
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

	header('Location: login.php?msg=Please enter your User name and Password.');

}

?>