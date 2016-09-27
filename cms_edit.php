<?php  ob_start();
session_start();
	if($_SESSION['super_user']){
	include('../includes/connect.php'); 

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<style>
ul {
	padding:0px;
	margin: 0px;
}
#response {
	padding:10px;
	background-color: #008540;
	border:2px solid #FFF;
	color:#FFFFFF;
	font-family:Arial, Helvetica, sans-serif;
	margin-bottom:20px;
}
#list li {
	margin: 0 0 8px;
	padding:12px;
	font-size:16px;
	background-color:#fff;

	list-style: none;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<script type="text/javascript">
$(document).ready(function(){ 	
	  function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
      });
    
}, 2000);}
	
    $("#response").hide();
	$(function() {
	$("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			var order = $(this).sortable("serialize") + '&update=update'; 
			$.post("updateList.php", order, function(theResponse){
				$("#response").html(theResponse);
				$("#response").slideDown('slow');
				slideout();
			}); 															 
		}								  
		});
	});

});	
</script>
<script type="text/javascript">
function delProfile(id){
	var cnfrm = confirm("Are you sure you want to delete?");
	if(cnfrm==true){
	$('#pageLoading').css('display','block');
	//alert(dataString);
	$.ajax({
		type: "POST",
		url: "delete_pages.php",
		data: {id:id},
		cache: false,
		success: function(html){
				if(html){		
					alert('Profile deleted successfully.');
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
<?php include('includes/header.php');?>
<!-- Ends here -->

<!-- Content Starts Here -->

<!-- Form Starts Here -->
<br/>
<br/><br/>
<div id="container">
  <div id="list">

    <div id="response"> </div>
     <div class="formdivmn" style="background:#F7F7F7; border-radius:8px; padding:20px;">
        <div class="detailspagetxtblk">
   <table width="100%" border="0" cellspacing="1" cellpadding="8"  class="bodytext">
    <tr>
      
    <td width="50%" height="25" align="left" valign="middle" bgcolor="#DBDBDB"> <span style="float:Left; font-size:16px;">S.No </span>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  <span style="font-size:16px;">Service<span style="float:right; font-size:16px;">Edit<span>&nbsp;  &nbsp; <span style="float:right; font-size:16px;">Delete<span></span></span></span></span></span></td>
      
      
    </tr>
  
		
				
    <tr >
     
      <td  valign="middle" bgcolor="#ffffff"><ul><?php
              
    $page_id=$_GET['page_id'];
                include("../includes/connect.php");
				$query  = "SELECT page_id,page_title FROM pages ORDER BY itemorder ASC";
				$result = mysql_query($query);
				$i=1;
				while($row = mysql_fetch_assoc($result))
				{
					
				$page_id = stripslashes($row['page_id']);
				$page_title = stripslashes($row['page_title']);
					
				?>   <li id="arrayorder_<?php echo $page_id ?>">
     <?php echo $i;?> &nbsp;&nbsp; &nbsp; &nbsp;  <?php  echo  $page_title; ?>
       <span style="float:right;color:#FFFFFF;"><a href="cms_edit_page.php?edit_id=<?php echo $repage['page_id'];?>"><img src="images/edit.png" width="20" height="22" /></a><span>&nbsp;  &nbsp; <span style="float:right;"><a href="javascript:void(0);" onclick="delProfile(<?php echo $country_res['country_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a><span> <div class="clear"></div><?php $i++; } ?></ul> </td>
      
     
     
    </tr>
 
  </table>
  </div>
</div> </div>
</div>
<!-- Ends here -->
</div>
<!-- Ends here -->

<!-- Footer start -->
<?php include('includes/footer.php');?>
<!--Ends here -->


</body>
</html>
