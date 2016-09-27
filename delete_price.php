<?php 
include('../includes/connect.php');
if($_POST['id']){ 
	$id=$_POST['id'];
	$deleteQry="DELETE FROM `price` WHERE `price_id`= '$id' ";
	mysql_query($deleteQry);		
	echo "Deleted successfully.";
}else{
	echo "Delete unsuccessful.";
}
?>