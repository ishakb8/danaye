<?php ob_start();
session_start();
if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>
<?php 
if(isset($_POST['addteritory'])){
	
	$continent_id = $_POST['continent_id'];
	$territory_name = $_POST['territory_name'];
 $addtrr_query = mysql_query("INSERT INTO  territory (territory_name,continent_id,status,time) VALUES ('$territory_name', '$continent_id', 'Active',now() )");
if($addtrr_query){
	sleep(2);	
	header('Location: territory.php?msg=true');
   }



}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="../font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">

   function valueselect(sel) {

      var value = sel.options[sel.selectedIndex].value;

      window.location.href = "territory.php?ct="+value;

   }

</script>
<script type="text/javascript">
function validateForm()
{
if(document.login.continent_id.selectedIndex==0)
{ alert("Please select  Continent");
document.login.continent_id.focus();
return false;
}
if( document.login.territory_name.value == "" )
         {
            alert( "Please Enter Territory" );
            document.login.territory_name.focus() ;
            return false;
         }

return true;	
}

function delProfile(id){
	var cnfrm = confirm("Are you sure you want to delete?");
	if(cnfrm==true){
	$('#pageLoading').css('display','block');
	//alert(dataString);
	$.ajax({
		type: "POST",
		url: "delete_territory.php",
		data: {id:id},
		cache: false,
		success: function(html){
				alert(html);
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
    <h1>Territories</h1></label>
     <label>
    <form name="login" method="post" action="" onsubmit="return validateForm();">
    <div style="width:80%; overflow:hidden; float:right; text-align:right;">
    
    	<!----------------------Select Contient--------------------------------------->
         <select name="continent_id"  class="textBoxnew selectBox">
            <option>Continent</option>
            <?php $continet_query=mysql_query(" SELECT * FROM `continent`");
			
			while($contient=mysql_fetch_assoc($continet_query)){?>
            <option value="<?php echo $contient['continent_id']; ?>"><?php echo $contient['continent_name']; ?></option>
            <?php }?>
          </select>
          
          <input type="text" name="territory_name" id="territory_name" class="textBoxnew"  placeholder="Enter Teritory"/>
          <input name="addteritory" type="submit" value="Add Teritory" style="font-size:14px;" class="submitBtn" />
 </div>
     </form>
    </label>
    </div>
    <?php 

if($_GET['msg']=="true"){?>
    <h3 style="color:#093;" align="center">Territory List Added </h3>
    <?php }

if($_GET['del']=="true"){?>
    <h3 style="color:red" align="center">Territory Deleted </h3>
    <?php }

if($_GET['updated']=="true"){?>
    <h3 style="color:green" align="center">Territory Updated </h3>
    <?php }
?>
   
  <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Territory Name</td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
         <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $country_fetch_query = mysql_query("SELECT * FROM territory");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>
      <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['territory_name']; ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_territory.php?territory_id=<?php echo $country_res['territory_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $country_res['territory_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
    
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