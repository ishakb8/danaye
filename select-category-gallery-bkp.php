<?php

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

    

    <!--  Start Categories -->

    <div class="boxDiv2"> Select Categories

      <div id="Accordion1" class="Accordion" tabindex="0" style="margin:10px 0px 0px 0px;">

       

                    <?php 

    include('includes/connect.php');

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

						   include('includes/connect.php');

						

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

<div id="freewall" class="free-wall">

	

    <?php 

	$data_query=mysql_query("SELECT * FROM postings WHERE city_id = '".$city_id."' AND  categories_id = '".$categoty_id."' AND sub_categories_id = '".$sub_categories_id."'");

	$row_count = mysql_num_rows($data_query);

	if($row_count > 0){

while($data_res = mysql_fetch_assoc($data_query)){?>



	<div class="brick">

        <div class="galleryBoxs">

        	<div class="galleryImgDiv">

			

			<?php 



$image_query = mysql_query("SELECT * FROM postings_images WHERE posting_id= '".$data_res['posting_id']."' LIMIT 1 ");

while($image_res=mysql_fetch_assoc($image_query)) {?>



 <a  href="category-description.php?city_id=<?php echo $city_id;?>&categoty_id=<?php echo $categoty_id;?>&sub_categories_id=<?php echo $sub_categories_id;?>&posting_id=<?php echo $data_res['posting_id'];?>"><img src="posting_uploads/<?php echo $image_res['posting_paths'];?>" width="275" height="150"/> </a>



   <?php }?>





</div>

            <div class="galleryCnt">

            <a  href="category-description.php?city_id=<?php echo $city_id;?>&categoty_id=<?php echo $categoty_id;?>&sub_categories_id=<?php echo $sub_categories_id;?>&posting_id=<?php echo $data_res['posting_id'];?>"><i class="fa fa-star" style="color:#bdbdbd;"></i> <?php echo $data_res['posting_title'];?> </a>

     <span class="postTxt">Posted on : <small><?php echo $data_res['time'];?></small></span>

            </div>

        </div>

	</div>  

    

<?php }

	}else{

		

		$territory_query =mysql_query("SELECT * FROM sub_categories WHERE sub_categories_id='".$sub_categories_id."' ");

while($territory_name = mysql_fetch_assoc($territory_query)){?>

<h3 style="text-align:center"><?php echo "Sorry! No data availble on ". ucfirst($territory_name['sub_categories_name']); ?></h3>

<?php }

		}

?>

    

    





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

