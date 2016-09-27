<?php
include('includes/connect.php');
$currenttime = date('Y-m-d H:i:s');
$postings_query = mysql_query("SELECT * FROM `postings` WHERE `posting_status`='Active'");
while($postings_query_row = mysql_fetch_assoc($postings_query))
{
	$datetime = $postings_query_row['time'];
	$from_time = strtotime($datetime);
	$to_time = strtotime($currenttime);
	$timediffernce =  round(abs($to_time - $from_time) / 60);
	if($timediffernce > 10080)
	{
		mysql_query("UPDATE `postings` SET `posting_status`='Pending' WHERE `posting_id`='$postings_query_row[posting_id]'");
	}
}

?>