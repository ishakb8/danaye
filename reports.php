<?php session_start();

if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>


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
		url: "delete_report.php",
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

<?php include('includes/header.php') ?>

<!-- Ends here --> 

<!-- Wrapper Container Starts Here -->

<div class="container">
  <div class="hdngDivInn">
    <label style="float:left;">
    <h1>Admin Details</h1>
    </label>
    <label style="float:right;">
      <input name="" type="button" value="Back" style="font-size:14px;" class="submitBtn" />
    </label>
  </div>
 <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="20%" height="30" align="left" valign="middle" bgcolor="#ffffff">Title</td>
       <td width="20%" height="30" align="left" valign="middle" bgcolor="#ffffff">message</td>
        <td width="18%" height="30" align="center" valign="middle" bgcolor="#ffffff">Date</td>
        <td width="26%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $report_fetch_query = mysql_query("SELECT report.report_id, report.report_text, report.date, postings.posting_title
FROM report
INNER JOIN postings ON report.posting_id = postings.posting_id");

	 $i=1;

	  while($report_res=mysql_fetch_assoc($report_fetch_query)){?>
      <tr>
        <td width="15%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
        <td width="20%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $report_res['posting_title']; ?></td>
        <td width="20%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $report_res['report_text']; ?></td>
        <td width="12%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $report_res['date']; ?></td>
        <td width="26%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $report_res['report_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
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