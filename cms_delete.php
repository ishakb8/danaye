<?php 

 include('../includes/connect.php');



if($_GET['del']){ 

	$id=$_GET['del'];

	$updateQry="DELETE FROM `pages` WHERE `page_id`= '$id' ";

	if(mysql_query($updateQry)){		

		header("Location: cms_edit.php?del=true");

	}else{

		echo "Delete unsuccessful.";

	}

}else{

	echo "Delete unsuccessful.";

}

?>