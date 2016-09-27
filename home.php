<?php session_start();
if($_SESSION['super_user']){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="../font-awesome.min.css" rel="stylesheet" type="text/css"  />
</head>
<body>
<!-- header Starts here -->
<?php include('includes/header.php') ?>
<!-- Ends here --> 
<!-- Wrapper Container Starts Here -->
<div class="container">
  <div class="wrapperDiv">
    <h1>Welcome to Danaye Admin Panel</h1>
    <ul>
      <li>
        <div class="paddingBox"> <a href="home.php">
          <div class="icnMnDiv"><img src="images/home.jpg" height="80" width="100" border="0" alt="home" />
            <div>Home</div>
          </div>
          </a> </div>
      </li>
      <li>
        <div class="paddingBox"> <a href="cms.php">
          <div class="icnMnDiv"><img src="images/cms.jpg" height="80" width="68" border="0" alt="Content management System" />
            <div>CMS</div>
          </div>
          </a> </div>
      </li>
      <li>
        <div class="paddingBox"> <a href="listings.php">
          <div class="icnMnDiv"><img src="images/listings.jpg" height="80" width="100" border="0" alt="Listings" />
            <div>Listings</div>
          </div>
          </a> </div>
      </li>
      <li>
        <div class="paddingBox"> <a href="transactions.php">
          <div class="icnMnDiv"><img src="images/transactions.jpg" height="80" width="118" border="0" alt="Transaction" />
            <div>Transactions</div>
          </div>
          </a> </div>
      </li>
      <li>
        <div class="paddingBox"> <a href="reports.php">
          <div class="icnMnDiv"><img src="images/users.jpg" height="80" width="85" border="0" alt="User Details" />
            <div>Spam Posts</div>
          </div>
          </a> </div>
      </li>
      <li>
        <div class="paddingBox"> <a href="userdetails.php">
          <div class="icnMnDiv"><img src="images/users.jpg" height="80" width="85" border="0" alt="User Details" />
            <div>User Details</div>
          </div>
          </a> </div>
      </li>
      <li>
        <div class="paddingBox"> <a href="change-pasword.php">
          <div class="icnMnDiv"><img src="images/change-passwrd.jpg" height="80" width="59" border="0" alt="Change Password" />
            <div>Change Password</div>
          </div>
          </a> </div>
      </li>
    </ul>
  </div>
</div>
<!-- Ends here --> 
<!-- Copyright Div -->
<?php include('includes/footer.php') ?>
<!-- Ends here -->
</body>
</html>
<?php }else{
	header('Location: index.php?msg=Please enter your User name and Password.');
}
?>