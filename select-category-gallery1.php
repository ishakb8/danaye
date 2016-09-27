<?php ob_start();
extract($_GET);
extract($_POST);
include('includes/connect.php');
$city_id = $_GET['city_id'];

$categoty_id = $_GET['categoty_id'];

$sub_categories_id = $_GET['sub_categories_id'];



 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Danaye-Classified Directory Online</title>

<link href="styles.css" rel="stylesheet" type="text/css" />

<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />

<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>

<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />



<!-- Pinterest Script -->

<link rel="stylesheet" type="text/css" href="css/pinterest-style.css" />

<script src="jquery-1.8.2.min.js"></script>	

<script type="text/javascript" src="js/freewall.js"></script>

<!-- Pinterst Script Ends -->



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
<style>
.question {font-weight:bold;background-color:#FFF;padding:7px 0px  0px 15px;}
.answer{font-style:italic;background-color:#FFF;padding:0px 0px 7px 15px;}
#faq-result{margin: -10px auto 0px;width:50%;line-height:30px;border-radius:5px;min-height:300px;}
#loader-icon {position: fixed;top: 50%;width:100%;height:100%;text-align:center;display:none;}
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.2.6.pack.js"></script>
<script>
$(document).ready(function(){
	function getresult(url) {
		$.ajax({
			url: url,
			type: "GET",
			data:  {rowcount:$("#rowcount").val()},
			beforeSend: function(){
			$('#loader-icon').show();
			},
			complete: function(){
			$('#loader-icon').hide();
			},
			success: function(data){
			$("#faq-result").append(data);
			},
			error: function(){} 	        
	   });
	}
	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			if($(".pagenum:last").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				var city_id = document.getElementById("city_id").value;
				var categoty_id = document.getElementById("categoty_id").value;
				var sub_categories_id = document.getElementById("sub_categories_id").value;
				getresult('getresult.php?page='+pagenum+'&city_id='+city_id&'&categoty_id='+categoty_id+'&sub_categories_id='+sub_categories_id);
			}
		}
	}); 
});
</script>
</head>

<body>



<?php include('includes/header.php');?>


<!-- Container Starts here -->

<div class="container clear">



<!-- Left Content Starts here -->



<div class="col-xs-1">

  <div class="paddingDiv">

    <div class="boxDiv"> Select Language

      <select class="languageTxtBox" style="width:100%;">

        <option>English</option>

      </select>

    </div>

    <input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id; ?>" />
      <input type="hidden" name="categoty_id" id="categoty_id" value="<?php echo $categoty_id; ?>" />
        <input type="hidden" name="sub_categories_id" id="sub_categories_id" value="<?php echo $sub_categories_id; ?>" />

    <!--  Start Categories -->

    <div class="boxDiv2"> Select Categories

      <div id="Accordion1" class="Accordion" tabindex="0" style="margin:10px 0px 0px 0px;">

                    <?php 

  
    $territory = mysql_query("SELECT * FROM territory ORDER BY territory_name");

    while($row1 = mysql_fetch_assoc($territory)) {?>

        <div class="AccordionPanel">

          <div class="AccordionPanelTab"> <?php echo $row1['territory_name']?> </div>

          <div class="AccordionPanelContent">

            <div class="categoriesDiv" style="min-height:100px; max-height:350px; overflow:auto;">

              <ul>

              <?php  $city = mysql_query("SELECT * FROM city WHERE territory_id= '".$row1['territory_id']."' ORDER BY city_name");

    while($row3 = mysql_fetch_assoc($city)) {?>

              

                <li><a href="select-category-gallery.php?city_id=<?php echo $row3['city_id'];?>&categoty_id=<?php echo $_GET['categoty_id'];?>&sub_categories_id=<?php echo $_GET['sub_categories_id']; ?>"> <?php echo $row3['city_name'];?></a></li>



              <?php }?>

              </ul>

            </div>

          </div>

        </div>

        <?php }?>

      </div>

    </div>

    <!-- Ends here --> 


    <!--  Start Quick Links -->

    <div class="boxDiv2"> Quick Links

      <div class="categoriesDiv" style="background:#ffffff; margin:10px 0px 0px 0px;">

        <ul>

          <?php 
	

						$page = mysql_query("SELECT * FROM pages");

						

						

						if (mysql_num_rows($page) > 0) {

    // output data of each row

    while($row = mysql_fetch_assoc($page)) {?>

          <li><a href="page1.php?page_id=<?php echo $row['page_id']?>"><?php echo $row['page_title']?></a></li>

          <?php   }

}

                        ?>

        </ul>

      </div>

    </div>

    <!-- Ends here --> 

  </div>

</div>



<!-- Left Content Ends here -->



<!-- Right Div starts Here -->

<div class="col-xs-2">



<div class="righthdngDiv" style="font-size:26px;">

<span class="redtxt"><a href="javascript:void();"><?php

$cityname_query =mysql_query("SELECT * FROM city WHERE city_id='".$city_id."' ");

while($cityname = mysql_fetch_assoc($cityname_query)){

echo $cityname['city_name'];

}?></a></span> - <span class="blacktxt"><a href="javascript:void();"><?php

$country_query =mysql_query("SELECT * FROM categories WHERE category_id	='".$categoty_id."' ");

while($country_name = mysql_fetch_assoc($country_query)){

echo $country_name['category_name'];

}?></a></span> - <span class="greentxt"><a href="javascript:void();"><?php

$territory_query =mysql_query("SELECT * FROM sub_categories WHERE sub_categories_id='".$sub_categories_id."' ");

while($territory_name = mysql_fetch_assoc($territory_query)){

echo ucfirst($territory_name['sub_categories_name']);

}?>

</a></span>

    

</div>

<div class="selectTabDiv">

<div  class="selectviewDiv">

	<!--<ul>

    	<li><a href="select-category-list.php"><i class="fa fa-bars"></i> List</a></li>

        <li><a href="select-category-thumbs.php"><i class="fa fa-th-list"></i> Thumbs</a></li>

        <li class="active"><a href="select-category-gallery.php"><i class="fa fa-th-large"></i> Gallery</a></li>

    </ul>-->

</div>

<div class="arrowDiv"><img src="images/arrow-img.png" width="24" height="50" border="0" /></div>

<div class="selectLeftTab">

    <ul>

        <li><input name="" type="checkbox" value="" /> Search titles only</li>

        <li><input name="" type="checkbox" value="" /> Has image</li>

        <li><input name="" type="checkbox" value="" /> Posted today</li>

    </ul>

</div>

</div>



<!-- Category List Starts here -->

<div class="categoryListDiv" style="padding:10px 0px;">


<div id="faq-result">
<?php include('getresult.php'); ?>
</div>

<div id="loader-icon"><img src="LoaderIcon.gif" /><div>
    

    





</div>

</div>

<!-- Ends here -->



</div>

<!-- Ends here -->









</div>

<!-- Ends here -->



<!-- Footer Starts Here -->

<?php include('includes/footer.php');?>

<!-- Footer Ends here -->



<script type="text/javascript">

<!--

var Accordion1 = new Spry.Widget.Accordion("Accordion1");

//-->

</script>

<script type="text/javascript">

var wall = new freewall("#freewall");

wall.reset({

selector: '.brick',

animate: true,

cellW: 300,

cellH: 'auto',

onResize: function() {

wall.fitWidth();

}

});

wall.container.find('.brick img').load(function() {

wall.fitWidth();

});

</script>

</body>

</html>

