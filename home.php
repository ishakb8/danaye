<?php ob_start(); 

 include('includes/connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="jquery.mCustomScrollbar.css">

<!--<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "autosearch/readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>-->
</head>
<body>

<!-- Header Starts here -->
<?php include('includes/index-header.php');?><!-- Ends here -->

<!-- Container Starts here -->
<div class="container clear">
<?php
$territory_query=mysql_query("SELECT * FROM territory ORDER BY territory_name ASC");
while($territory_query_row = mysql_fetch_assoc($territory_query))
{
	?>

<h1 class="contentDiv"><?php echo $territory_query_row['territory_name']?></h1>

<div class="contentDiv">

<div class="greyCntDiv">
    <!-- Box1 Starts here -->
    <?php
	//$no_of_divs = 5;	
	$country_query = mysql_query("SELECT * FROM `country` WHERE `territory_id`='$territory_query_row[territory_id]' ORDER BY `country_name` ASC");
	$country_query_count = mysql_num_rows($country_query);
	$finalresultwithby = round($country_query_count /$no_of_divs);
	$finalresultwithpercent = $country_query_count % $no_of_divs;	
	?>    
    <div class="blocksDiv">
    <?php
    $sno = 1;
	$couu = mysql_num_rows($country_query);
	if($couu >0){
	while($country_query_row = mysql_fetch_assoc($country_query))
	{
	?>
        <div> <?php echo  $country_query_row['country_name']?>
     		<ul>
            <?php
			$city_query=mysql_query("SELECT * FROM city WHERE country_id='".$country_query_row['country_id']."' and territory_id='".$territory_query_row['territory_id']."' ORDER BY city_name");
			while($city_query_row = mysql_fetch_assoc($city_query))
			{?>
                <li> <a href="select-cities.php?territory_id=<?php echo $territory_query_row['territory_id']?>&country_id=<?php echo $country_query_row['country_id']; ?>&city_id=<?php echo $city_query_row['city_id'];?>"><i class="fa fa-angle-double-right iconarow"></i> <?php echo $city_query_row['city_name']; ?></a></li>
                <?php
			}
			?>
             </ul>
        </div>
         <?php 
		if($sno % $finalresultwithby ==0)
		{
			?>
			</div>
            <div class="blocksDiv">
			<?php
		}
		$sno++;
		}}else{?>
			
<?php $mmmm = "Danaye has no country or cities being served at this time."; ?>

			<?php }?>
    </div>
    <h3 align="center" style="text-align:center;"><?php echo  $mmmm;?></h3>

   
</div>

</div>
<?php  } ?>
</div>
<!-- Ends here -->


<!-- Footer Starts Here -->
<?php include('includes/index-footer.php'); ?>
<!-- Footer Ends here -->


</body>
</html>
