<?php 
include('../includes/connect.php');
//echo $login_user= $_SESSION['login_user'];
if($_POST['id']){ 
	$id=$_POST['id'];
	$login_user=$_GET['login_user'];
	$getQry="SELECT * FROM `postings` WHERE `posting_id`= '$id'";
	$getRes=mysql_query($getQry);
	$getRow=mysql_fetch_assoc($getRes);
	$deleteQry="DELETE FROM `postings` WHERE `posting_id`= '$id'";

	if(mysql_query($deleteQry)){
	      
		  echo "Delete Successful";
		  $to      = $getRow['login_user'];//'ishakb8@gmail.com';
          $subject = 'From Team Danaye';
          $message = 'Your Add Is Deleted';
          $headers = 'From: info@bestinciti.com' . "\r\n" .
                     'Reply-To: info@bestinciti.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

	echo mail($to, $subject, $message, $headers);
         
	}else{
		echo "Delete Unsuccessful.";
	}
}else{
	echo "Delete Unsuccessful.";
}
?>