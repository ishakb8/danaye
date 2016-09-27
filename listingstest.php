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
        <td width="6%" height="30" align="center" valign="middle" bgcolor="#ffffff">View</td>
        <td width="7%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
    
      <tr>
        <td width="6%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
         <?php 
		
@$posting_id=$_GET['posting_id'];
    $sqll = "select sub_categories_name from postings ";
	 $q = mysql_query($sqll); 
		
    while($r = mysql_fetch_array($q)) {
      $e = explode(",", $r[0]);
       //removes redundant array values
      foreach($e as $r=>$val)
      {
	     $quert2=mysql_fetch_array(mysql_query("select * from postings where posting_id=$val"));
          echo "$quert2[sub_categories_name]";
	
      }
    }

?>
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