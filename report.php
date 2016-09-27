<?php
include('includes/connect.php');

//$posting_id = $_GET['posting_id'];

if(isset($_POST['report_id'])){
	//$report_text=$_POST['report_text'];
	$posting_id=$_POST['report_id'];
	
	$insertQry ="INSERT INTO report (report_text,posting_id,date)VALUES ('You Recieve Report','$posting_id',now())";
	if(mysql_query($insertQry)){
		echo 'You Report a Spam';
	}else{
		echo 'Sorry, your report as unsuccessful.';
	}
} else{
	echo 'Sorry, your report as unsuccessful.';
}
?> 
