<?php ob_start();
extract($_GET);
extract($_POST);
include('includes/connect.php');
$city_id = $_GET['city_id'];

$categoty_id = $_GET['categoty_id'];

$sub_categories_id = $_GET['sub_categories_id'];



 ?>


<?php
$perPage = 10;

 $sql = "SELECT * FROM postings WHERE city_id = '".$city_id."' AND  categories_id = '".$categoty_id."' AND sub_categories_id = '".$sub_categories_id."'";
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage; 

$query_result = mysql_query($query);
$query_count = mysql_num_rows(mysql_query($sql));


if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $query_count;
}

$pages  = ceil($_GET["rowcount"]/$perPage);
$output = '<div id="freewall" class="free-wall">';

$output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
while($data_res = mysql_fetch_assoc($query_result))
{
	$image_res = mysql_fetch_array(mysql_query("SELECT * FROM postings_images WHERE posting_id= '".$data_res['posting_id']."'"));
	$output .= '<div class="brick"><div class="galleryBoxs"><div class="galleryImgDiv">';
	
	$output .= '<a  href="category-description.php?city_id=' . $city_id . '&categoty_id=' . $categoty_id . '&sub_categories_id=' . $sub_categories_id . '&posting_id=' . $data_res['posting_id'] . '"><img src="posting_uploads/'.$image_res['posting_paths'].'" width="275" height="150"/> </a>';
	
	
	
	$output .='</div><div class="galleryCnt">';

            $output .='<a  href="category-description.php?city_id=' . $city_id . '&categoty_id=' . $categoty_id . '&sub_categories_id=' . $sub_categories_id . '&posting_id=' . $data_res['posting_id'] . '"><i class="fa fa-star" style="color:#bdbdbd;"></i>'.$data_res['posting_title'].' </a>';

     $output .='<span class="postTxt">Posted on : <small>'.$data_res['time'].'</small></span>';

         $output .=' </div></div></div>';  
	
}

print $output;
?>




        

        	
