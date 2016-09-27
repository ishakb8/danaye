<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>404 Not Found</title> 

<link href="styles.css" rel="stylesheet" type="text/css" />

<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />

</head>

<body>


<h1 align="center" style="background:red;">404 Not Found</h1>


<!-- Container Starts here -->

<div class="container clear">

  <?php include('includes/connect.php');?>

  <?php 

$territory_query=mysql_query("SELECT * FROM territory ORDER BY territory_name");

while($territory = mysql_fetch_assoc($territory_query)){?>

  <div class="contentDiv">

    <h1><?php echo $territory['territory_name']?></h1>

    <div class="greyCntDiv"> 

      <!------------------------Country Start-----------------------------------------------------> 

      <!------------------------------------------------------------------------------------------> 

      <!------------------------------------------------------------------------------------------>

      

      <?php $country_query=mysql_query("SELECT * FROM country WHERE territory_id='".$territory['territory_id']."' ORDER BY country_name");

while($country = mysql_fetch_assoc($country_query)){?>

      <!-- Box1 Starts here -->

      <div class="blocksDiv">

        <div> <span class="countyTxthdng"> <?php echo $country['country_name']?></span>

          <?php $city_query=mysql_query("SELECT * FROM city WHERE country_id='".$country['country_id']."' and territory_id='".$territory['territory_id']."' ORDER BY city_name");

while($city = mysql_fetch_assoc($city_query)){?>

          <ul>

            <li> <a href="select-cities.php?territory_id=<?php echo $territory['territory_id']?>&country_id=<?php echo $country['country_id']; ?>&city_id=<?php echo $city['city_id'];?>"><i class="fa fa-angle-double-right iconarow"></i> <?php echo $city['city_name'];?></a> </li>

          </ul>

          <?php }?>

        </div>

      </div>

      <!-- Ends here -->

      <?php }?>

      <!------------------------Country End-----------------------------------------------------> 

      <!------------------------------------------------------------------------------------------> 

      <!------------------------------------------------------------------------------------------> 

    </div>

  </div>

  <?php }?>

</div>

<!-- Ends here --> 



<!-- Footer Starts Here -->

<?php include('includes/index-footer.php');?>

<!-- Footer Ends here -->



</body>

</html>

