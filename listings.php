<?php session_start();

if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php') ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="../font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function delProfile(id){
	var cnfrm = confirm("Are you sure you want to delete?");
	if(cnfrm==true){
	$('#pageLoading').css('display','block');
	//alert(dataString);
	$.ajax({
		type: "POST",
		url: "delete_listing.php",
		data: {id:id},
		cache: false,
		success: function(html){
				if(html){		
					alert('Ad deleted successfully.');
					window.location.reload();
				}
			}
	});
	}
}
</script>

</head>

<body>

<!-- header Starts here -->

<?php include('includes/header.php') ?>

<!-- Ends here --> 

<!-- Wrapper Container Starts Here -->

<div class="container">
  <div class="hdngDivInn">
    <label style="float:left;">
    <h1>Listing <span style="color:#090;"><?php echo $ms;?> <?php echo $mss;?> </span></h1>
    </label>
  </div>
  <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="6%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="15%" height="30" align="left" valign="middle" bgcolor="#ffffff">Title</td>
        <td width="14%" height="30" align="left" valign="middle" bgcolor="#ffffff">Territory</td>
        <td width="14%" height="30" align="left" valign="middle" bgcolor="#ffffff">Country</td>
          <td width="12%" height="30" align="left" valign="middle" bgcolor="#ffffff">City</td>
        <td width="10%" height="30" align="left" valign="middle" bgcolor="#ffffff">Category</td>
        <td width="11%" height="30" align="left" valign="middle" bgcolor="#ffffff">Sub Category</td>
        <td width="10%" height="30" align="left" valign="middle" bgcolor="#ffffff">Status</td>
        <td width="6%" height="30" align="center" valign="middle" bgcolor="#ffffff">View</td>
        <td width="7%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php 

  $listing_query = mysql_query("SELECT p.posting_id, p.posting_title, p.posting_description, p.posting_status, cn.country_name, cat.category_name, sc.sub_categories_name, tr.territory_name, ct.city_name
FROM postings p
LEFT OUTER JOIN country cn ON cn.country_id = p.country_id
LEFT OUTER JOIN sub_categories sc ON sc.sub_categories_id = p.sub_categories_id
LEFT OUTER JOIN categories cat ON cat.category_id = p.categories_id
LEFT OUTER JOIN territory tr ON tr.territory_id = p.territory_id
LEFT OUTER JOIN city ct ON ct.city_id = p.city_id 
ORDER BY p.posting_id DESC;
");

$i =1;

while($list_res = mysql_fetch_assoc($listing_query)){?>
      <tr>
        <td width="6%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
        <td width="15%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['posting_title'];?></td>
        <td width="14%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['territory_name'];?></td>
        <td width="14%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['country_name'];?></td>
         <td width="11%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['city_name'];?></td>
        <td width="12%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['category_name'];?></td>
        <td width="10%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $list_res['sub_categories_name'];?></td>
        <?php
if($list_res['posting_status']=="Inactive"){?>
        <td width="10%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:red; "><?php echo $list_res['posting_status'];?></td>
        <?php }else if ($list_res['posting_status']=="Active"){?>
        <td width="10%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:green; "><?php echo $list_res['posting_status'];?></td>
        <?php }else{?>
        <td width="10%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:brown; "><?php if(isset($_POST['status'])){
		$statusu = $_POST['status'];
		 $id = $_GET['id'];
		$update = mysql_query("UPDATE postings
SET posting_status='".$statusu."' WHERE posting_id='".$id."'");
if($update){
	//echo $ms = "Pending";
	}
		}?>
          <form action="listings.php?id=<?php echo $list_res['posting_id'];?>" method="post">
            <?php echo $list_res['posting_status'];?>
            <input type="hidden" name="pid" value="<?php echo $list_res['posting_id'];?>" />
            <input type="submit" name="status" value="Active" />
          </form></td>
        <?php }?>
        <td width="6%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="listings-view.php?posting_id=<?php echo $list_res['posting_id'];?>"><img src="images/view-icn.png" width="20" height="22" /></a></td>
        <td width="7%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $list_res['posting_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
      </tr>
      <?php }?>
    </table>
  </div>
</div>

<!-- Ends here --> 

<!-- Copyright Div -->

<?php include('includes/footer.php') ?>

<!-- Ends here -->

</body>
</html>
<?php }else{

	header('Location: index.php?msg=Please enter your User name and Password.');

}

?>