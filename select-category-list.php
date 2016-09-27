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
<script src="jquery-1.8.2.min.js"></script>
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

<script type="text/javascript">
function changeImageFunction()
{
	if(document.getElementById("iamge_id").checked==true)
	{
		
	}
	else
	{
		
	}
	
}


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
      <div class="boxDiv2"> Select City
        <div id="Accordion1" class="Accordion" tabindex="0" style="margin:10px 0px 0px 0px;">
          <?php $territory = mysql_query("SELECT * FROM territory ORDER BY territory_name");
		  $m = 1;
    		while($row1 = mysql_fetch_assoc($territory)) {?>
          <div class="AccordionPanel">
            <div class="AccordionPanelTab"> <?php echo $row1['territory_name']?> </div>
            <div class="AccordionPanelContent">
              <div id="scrollbar1" class="scrollbar_Y">
                <div class="scrollbar">
                  <div class="track">
                    <div class="thumb">
                      <div class="end"></div>
                    </div>
                  </div>
                </div>
                <div class="viewport">
                  <div class="overview">
                    <div class="categoriesDiv">
                      <ul>
                        <?php  $city = mysql_query("SELECT * FROM city WHERE territory_id= '".$row1['territory_id']."' ORDER BY city_name");

    while($row3 = mysql_fetch_assoc($city)) {?>
                        <li><a href="select-category-gallery.php?city_id=<?php echo $row3['city_id'];?>&categoty_id=<?php echo $_GET['categoty_id'];?>&sub_categories_id=<?php echo $_GET['sub_categories_id']; ?>"> <?php echo $row3['city_name'];?></a></li>
                        <?php }?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <?php $m++; }?>
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

}?>
          </ul>
        </div>
      </div>
      <!-- Ends here -->
    </div>
  </div>
  <!-- Left Content Ends here -->
  <!-- Right Div starts Here -->
  <div class="col-xs-2">
    <div class="righthdngDiv" style="font-size:26px;"> <span class="redtxt"><a href="javascript:void();">
      <?php

$cityname_query =mysql_query("SELECT * FROM city WHERE city_id='".$city_id."' ");

while($cityname = mysql_fetch_assoc($cityname_query)){

echo $cityname['city_name'];

}?>
      </a></span> > <span class="greentxt"><a href="javascript:void();">
      <?php

$country_query =mysql_query("SELECT * FROM categories WHERE category_id	='".$categoty_id."' ");

while($country_name = mysql_fetch_assoc($country_query)){

echo $country_name['category_name'];

}?>
      </a></span> > <span class="blacktxt"><a href="javascript:void();">
      <?php

$territory_query =mysql_query("SELECT * FROM sub_categories WHERE sub_categories_id='".$sub_categories_id."' ");

while($territory_name = mysql_fetch_assoc($territory_query)){

echo ucfirst($territory_name['sub_categories_name']);

}?>
      </a></span> </div>
    <div class="selectTabDiv">
      <div  class="selectviewDiv">
        <ul>
    	<li class="active"><a href="select-category-list.php?city_id=<?php echo $city_id;?>&categoty_id=<?php echo $categoty_id;?>&sub_categories_id=<?php echo $sub_categories_id;?>"><i class="fa fa-bars"></i> List</a></li>

        <li><a href="select-category-thumbs.php?city_id=<?php echo $city_id;?>&categoty_id=<?php echo $categoty_id;?>&sub_categories_id=<?php echo $sub_categories_id;?>"><i class="fa fa-th-list"></i> Thumbs</a></li>

        <li><a href="select-category-gallery.php?city_id=<?php echo $city_id;?>&categoty_id=<?php echo $categoty_id;?>&sub_categories_id=<?php echo $sub_categories_id;?>"><i class="fa fa-th-large"></i> Gallery</a></li>

    </ul>
      </div>
      <div class="arrowDiv"><img src="images/arrow-img.png" width="24" height="50" border="0" /></div>
      <div class="selectLeftTab">
        <ul>
         <li>
            <input name="" type="checkbox" value="1" id="iamge_id" checked="checked"  onclick="return displayRecords('5','0');" />
            Has image</li>
          <li>
            <input name="" type="checkbox" value="" />
            Posted today</li>
        </ul>
      </div>
    </div>
    <!-- Category List Starts here -->
    <div class="gallery_description_list">
      <ul id="freewall">
      </ul>
      <div id="loader_image"><img src="images/loader.gif" alt="" width="322" height="268"></div>
      <div class="margin10"></div>
      <div id="loader_message"></div>
      <script src="jquery-1.9.0.min.js"></script>
      <script type="text/javascript">
      var busy = false;
      var limit = 5
      var offset = 0;

      function displayRecords(lim, off) {
		  if(document.getElementById("iamge_id").checked==true)
			{
				var hasimage = 1;
			}
			else
			{
				var hasimage = 0;
			}
			
        $.ajax({
          type: "GET",
          async: false,
          url: "getrecords_list.php",
          data: "limit=" + lim + "&offset=" + off+ "&city_id=" +<?php echo $city_id; ?>+ "&categoty_id=" + <?php echo $categoty_id; ?>+ "&sub_categories_id=" + <?php echo $sub_categories_id; ?>+ "&hasimage=" + hasimage,
          cache: false,
          beforeSend: function() {
            $("#loader_message").html("").hide();
            $('#loader_image').show();
          },
          success: function(html) {
		  	$("#freewall").append(html);
            $('#loader_image').hide();
            if (html == "") {
              document.getElementById("loader_image").style.display = 'none';
            } else {
             document.getElementById("loader_image").style.display = '';
            }
            window.busy = false;


          }
        });
      }

      $(document).ready(function() {
        // start to load the first set of data
        if (busy == false) {
          busy = true;
          // start to load the first set of data
          displayRecords(limit, offset);
        }


        $(window).scroll(function() {
          // make sure u give the container id of the data to be loaded in.
          if ($(window).scrollTop() + $(window).height() > $("#freewall").height() && !busy) {
            busy = true;
            offset = limit + offset;

            // this is optional just to delay the loading of data
            setTimeout(function() { displayRecords(limit, offset); }, 500);

            // you can remove the above code and can use directly this function
            // displayRecords(limit, offset);

          }
        });

      });

    </script>
    </div>
    <!-- Ends here -->
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
<script type="text/javascript" src="jquery-latest.js"></script> 
<script type="text/javascript" src="jquery.tinyscrollbar.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('.scrollbar_Y').tinyscrollbar();
});
</script>
</body>
</html>
