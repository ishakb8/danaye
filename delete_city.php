<?php 
include('../includes/connect.php');
if($_POST['id']){ 
	$id=$_POST['id'];
	$updateQry="DELETE FROM `city` WHERE `city_id`= '$id'";
	mysql_query($updateQry);		
	echo "Deleted successfully.";
}else{
	echo "Delete unsuccessful.";
}
?>