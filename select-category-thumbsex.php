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
<?php include('includes/left-side-row.php');?>
<!-- Left Content Ends here -->

<!-- Right Div starts Here -->
<div class="col-xs-2">

<div class="righthdngDiv" style="font-size:26px;">
<span class="redtxt"><a href="javascript:void();">Nairoba</a></span> - <span class="blacktxt"><a href="javascript:void();">Community</a></span> - <span class="greentxt"><a href="javascript:void();">Activites</a></span>
    <div style="clear:both;">
    <select class="languageTxtBox" style="width:25%;">
      <option>Bangalore</option>
    </select>
    <select class="languageTxtBox" style="width:25%;">
      <option>Community</option>
    </select>
    <select class="languageTxtBox" style="width:25%;">
      <option>Activites</option>
    </select>
    </div>
</div>

<div class="selectTabDiv">
<div  class="selectviewDiv">
	<ul>
    	 	<li><a href="select-category-list.php"><i class="fa fa-bars"></i> List</a></li>
        <li  class="active"><a href="select-category-thumbs.php"><i class="fa fa-th-list"></i> Thumbs</a></li>
        <li><a href="select-category-gallery.php"><i class="fa fa-th-large"></i> Gallery</a></li>
    </ul>
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
<div class="categoryListDiv">
<ul>
	<li>
    <div class="thumbsDiv"><img src="images/thumbs.jpg" height="55" width="65" border="0" /></div>
     <i class="fa fa-star" style="color:#bdbdbd;"></i> Indian Texts Reading - <span>Bangalore</span> - <a href="javscript:void();">[x]</a>
     <span class="postTxt">Posted on : <small>Aug 28, 2015</small></span>
    </li>
    
    <li>
    <div class="thumbsDiv"><img src="images/thumbs.jpg" height="55" width="65" border="0" /></div>
     <i class="fa fa-star" style="color:#bdbdbd;"></i>  You are a career oriented gal juggling between kids, inlaws - <span>Bangalore</span> - <a href="javscript:void();">[x]</a>
     <span class="postTxt">Posted on : <small>Aug 28, 2015</small></span>
    </li>
    
    <li>
    <div class="thumbsDiv"><img src="images/thumbs.jpg" height="55" width="65" border="0" /></div>
     <i class="fa fa-star" style="color:#bdbdbd;"></i>   Hyderabad Events Promotes Your Upcoming Events Across the City - <span>Bangalore</span> - <a href="javscript:void();">[x]</a>
     <span class="postTxt">Posted on : <small>Aug 28, 2015</small></span>
    </li>
    
     <li>
    <div class="thumbsDiv"><img src="images/thumbs.jpg" height="55" width="65" border="0" /></div>
     <i class="fa fa-star" style="color:#bdbdbd;"></i>  Ajax training institute in Bangalore - <span>Bangalore</span> - <a href="javscript:void();">[x]</a>
     <span class="postTxt">Posted on : <small>Aug 28, 2015</small></span>
    </li>   
    
   
</ul>
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
</body>
</html>
