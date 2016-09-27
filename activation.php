<?php
include 'db.php';
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
	echo $code=mysqli_real_escape_string($connection,$_GET['code']);

	$c=mysqli_query($connection,"SELECT * FROM registration WHERE activation='$code'");

	if(mysqli_num_rows($c) > 0)
	{

	$count=mysqli_query($connection,"SELECT * FROM registration WHERE activation='$code' and status='Pending'");

	if(mysqli_num_rows($count) == 1)
	{
    mysqli_query($connection,"UPDATE registration SET status='Active' WHERE activation='$code'");
    $msg="Your account is activated";	
    }
    else
    {
	$msg ="Your account is already active, no need to activate again";
    }

    }
    else
    {
	$msg ="Wrong activation code.";
    }

}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>danaye Script</title>
<link rel="stylesheet" href="<?php echo $base_url; ?>style.css"/>
</head>
<body>
	<div id="main">
	<h2><?php echo $msg; ?></h2>
	</div>
</body>
</html>
