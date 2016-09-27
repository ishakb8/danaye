<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.8.2.min.js"></script>	
<script type="text/javascript">
$(document).ready(function() {
  function setHeight() {
    windowHeight = $(window).innerHeight();
    $('.col-xs-1').css('min-height', windowHeight);
  };
  setHeight();
  $(window).resize(function() {
    setHeight();
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){ 	
	  function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
      });
    
}, 2000);}
	
    $("#response").hide();
	$(function() {
	$("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&update=update'; 
			$.post("updateList.php", order, function(theResponse){
				$("#response").html(theResponse);
				$("#response").slideDown('slow');
				slideout();
			}); 															 
		}								  
		});
	});

});	
</script>

<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
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
</script>

</head>
<body>

<?php include('includes/header.php');?>

<!-- Container Starts here -->
<div class="container clear">

<!-- Left Content Starts here -->
<?php include('includes/left-side-row.php');?>
<!-- Left Content Ends here -->

<!-- Right Div starts Here -->
<div class="col-xs-2">

<?php 

$territory_id=$_GET['territory_id'];
$country_id=$_GET['country_id'];
$city_id=$_GET['city_id'];

?>
<div class="righthdngDiv" style="color:red;">
<?php
$cityname_query =mysql_query("SELECT * FROM city WHERE city_id='".$city_id."' ");
while($cityname = mysql_fetch_assoc($cityname_query)){
echo $cityname['city_name'];
}?>
 <span> <small><</small> <a href="index.php" style="color:green;"> <?php
$country_query =mysql_query("SELECT * FROM country WHERE country_id='".$country_id."' ");
while($country_name = mysql_fetch_assoc($country_query)){
echo $country_name['country_name'];
}?></a> <small><</small> <a href="index.php" style="color:green;">
<?php
$territory_query =mysql_query("SELECT * FROM territory WHERE territory_id='".$territory_id."' ");
while($territory_name = mysql_fetch_assoc($territory_query)){
echo $territory_name['territory_name'];
}?></a>

</span>

<div style="width: 312px; float:right;margin: -10px 0px 0px 0px;">
<div id="suggesstion-box"></div>
<input name="" type="text" id="search-box" placeholder="Ex: Housing"/>
</span><span style="margin-left:-30px;"><i class="fa fa-search"></i></span>
</div>
   
</div>
<?php 
$catandsub_query =mysql_query("SELECT * FROM categories ORDER BY category_name ");
while($scatca = mysql_fetch_assoc($catandsub_query)){?>

<div class="citiesDiv">
<span class="categoriesTxthdng"><?php echo $scatca['category_name'];?></span>

<?php 
$subdata_query =mysql_query("SELECT * FROM sub_categories WHERE categories_id = '".$scatca['category_id']."' ORDER BY sub_categories_name ASC ");
while($sub = mysql_fetch_assoc($subdata_query)){?>
<ul>
    <li><a href="select-category-gallery.php?city_id=<?php echo $city_id;?>&categoty_id=<?php echo $scatca['category_id']; ?>&sub_categories_id=<?php echo $sub['sub_categories_id'];?>"><i class="fa fa-angle-double-right iconarow"></i> <?php echo ucfirst($sub['sub_categories_name']);?>
   <?php  
    $result = mysql_query("select count(1) FROM postings WHERE sub_categories_id = '".$sub['sub_categories_id']."' and country_id='$country_id' and city_id='$city_id'");
$row = mysql_fetch_array($result);

$total = $row[0];
echo "(".$total.")";
    ?>
    
     </a></li>
<?php }?>

</ul>
</div>

<?php }?>


</div>
<!-- Ends here -->

</div>
<!-- Ends here -->

<!-- Footer Starts Here -->
<?php include('includes/index-footer.php'); ?>
<!-- Footer Ends here -->

<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>
</body>
</html>
