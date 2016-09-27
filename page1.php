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
   <?php include('includes/connect.php');
	 $page_id=$_GET['page_id'];
    $page_result = mysql_query("SELECT * FROM pages WHERE page_id = $page_id");
	while($pagedata = mysql_fetch_assoc($page_result)){?>
  <div class="righthdngDiv"><?php echo $pagedata['page_title'];?></div>
 <div class="categoryListDiv pageContent"><?php echo $pagedata['page_content'];?></div>
 <?php } ?>
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
