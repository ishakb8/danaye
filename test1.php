<?php ob_start(); 

 include('includes/connect.php');
?>


<?php
echo "SELECT * FROM territory ORDER BY territory_name";
$territory_query=mysql_query("SELECT * FROM territory ORDER BY territory_name ASC");
while($territory_query_row = mysql_fetch_assoc($territory_query))
{
	?>

	<?php

	$no_of_divs = 5;
	$country_query = mysql_query("SELECT * FROM `country` WHERE `territory_id_fkey`='$territory_query_row[territory_id]' ORDER BY `country_name` ASC");
	$country_query_count = mysql_num_rows($country_query);
	
	echo $finalresult = $country_query_count % $no_of_divs;
	
	//while($country_query_row = mysql_fetch)
	?>


<?php  } ?>