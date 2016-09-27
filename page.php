<?php include('includes/connect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
</head>
<body>
<!-- Header Starts here -->
<?php include('includes/post-header.php');?>
<!-- Ends here -->
<!-- Menu Starts here -->
<div class="menuDiv">
<label class="left">
<span><a href="select-category-gallery.php">Back</a></span> 
</label>
<label class="right">
<span><a href="login.php"><i class="fa fa-lock"></i> Login</a></span>
<span><a href="signup.php"><i class="fa fa-file-text"></i> Create Account</a></span>
</label>
</div>
<!-- Ends here -->
<!-- Grey Content Starts here -->
<div class="greyDivPost">
<div class="postContDiv">
  
    
    <div class="postContDiv-row3">
    
    <?php 
	$page_id=$_GET['page_id'];
    $page_result = mysql_query("SELECT * FROM Pages WHERE page_id = $page_id");
	
	while($pagedata = mysql_fetch_assoc($page_result)){?>
   <h4> <?php echo $pagedata['page_title'];?></h4>
   <div><?php echo $pagedata['page_content'];?></div>
   <?php }
   ?>
    </div>
</div>
</div>
<!-- Ends here -->
<?php include('includes/footer.php') ?>
</body>
</html>
