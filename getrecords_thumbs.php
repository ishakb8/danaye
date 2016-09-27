<?php
extract($_GET);
extract($_POST);
include('includes/connect.php');

$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 5;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;

 $sql = "SELECT * FROM postings  WHERE city_id = '".$city_id."' AND  categories_id = '".$categoty_id."' AND sub_categories_id = '".$sub_categories_id."' and posting_status ='Active' AND `image_status`='$hasimage' ORDER BY posting_title ASC LIMIT $limit OFFSET $offset";
$fetch = mysql_query($sql);
$count = mysql_num_rows($fetch);
if ($count > 0) {
	
	$output = '';
  while($res = mysql_fetch_assoc($fetch)) {
  
  	$substringtitle = substr($res['posting_title'],0,300);
	 
	  $image_res = mysql_fetch_array(mysql_query("SELECT * FROM postings_images WHERE posting_id= '".$res['posting_id']."'"));


	$output .= '<li><div style="padding:5px;">';
	
	$output .= '<div><a  href="category-description.php?city_id=' . $city_id . '&categoty_id=' . $categoty_id . '&sub_categories_id=' . $sub_categories_id . '&posting_id=' . $res['posting_id'] . '"><img src="posting_uploads/'.$image_res['posting_paths'].'" width="80" height="80"/> </a>';
	
	

	$output .='</div><div class="galleryCnt_thumbs">';

            $output .='<a  href="category-description.php?city_id=' . $city_id . '&categoty_id=' . $categoty_id . '&sub_categories_id=' . $sub_categories_id . '&posting_id=' . $res['posting_id'] . '">'.$substringtitle.'... </a>';

     $output .='<span class="postTxt">Posted on : <small>'.$res['time'].'</small></span>';

         $output .=' </div></li>';  
 
  }
  
  print $output;
}else{
			$territory_query =mysql_query("SELECT * FROM sub_categories WHERE sub_categories_id='".$sub_categories_id."' ");

while($territory_name = mysql_fetch_assoc($territory_query)){



 }
	}
?>