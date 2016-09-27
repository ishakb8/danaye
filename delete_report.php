<?php 
include('../includes/connect.php');
if($_POST['id']){ 
	$id=$_POST['id'];
	$updateQry="DELETE FROM `report` WHERE `report_id`= '$id'";
	if(mysql_query($updateQry)){	
		echo "Deleted successfully.";
	}else{
		echo "Delete unsuccessful.";
	}
}else{
	echo "Delete unsuccessful.";
}
?>