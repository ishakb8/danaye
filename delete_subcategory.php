<?php 
include('../includes/connect.php');
if($_POST['id']){ 
	$id=$_POST['id'];
	echo $daleteQry="DELETE FROM `sub_categories` WHERE `sub_categories_id`= '$id'";
	mysql_query($daleteQry);		
	echo "Deleted successfully.";
}else{
	echo "Delete unsuccessful.";
}
?>