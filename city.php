<?php ob_start();

session_start();

if($_SESSION['super_user']){ ?>
<?php include('../includes/connect.php');?>
<?php 

if(isset($_POST['addcity'])){



$city=$_POST['city'];

$continent=$_POST['continent'];

$territory=$_POST['territory'];

$country=$_POST['country'];



$city_query =mysql_query("INSERT INTO city (city_name,country_id,territory_id,continent_id,status,time)

VALUES ('$city','$country','$territory','$continent','Active',now());");

if($city_query){

	sleep(1);	

	header('Location: city.php?msg=true');

	//echo "addred";

	}

}

?>
<?php

$delte_id = $_GET['delte_id'];

if(isset($_GET['delte_id'])){

	$delte_query=mysql_query("DELETE FROM city WHERE city_id = '".$delte_id."'");

	if($delte_query){

		header('Location: city.php?del=true');

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
<script language="javascript" type="text/javascript">

function getXMLHTTP() { //fuction to return the xml http object

		var xmlhttp=false;	

		try{

			xmlhttp=new XMLHttpRequest();

		}

		catch(e)	{		

			try{			

				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

			}

			catch(e){

				try{

				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

				}

				catch(e1){

					xmlhttp=false;

				}

			}

		}

		 	

		return xmlhttp;

    }

	

	function getState(countryId) {		

		

		var strURL="subinclude/findState.php?country="+countryId;

		var req = getXMLHTTP();

		

		if (req) {

			

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('statediv').innerHTML=req.responseText;

						document.getElementById('citydiv').innerHTML='<select name="city" class="textBoxnew selectBox">'+

						'<option>Country</option>'+

				        '</select>';						

					} else {

						alert("Problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}		

	}

	function getCity(countryId,stateId) {		

		var strURL="subinclude/findCity.php?country="+countryId+"&state="+stateId;

		var req = getXMLHTTP();

		

		if (req) {

			

			req.onreadystatechange = function() {

				if (req.readyState == 4) {

					// only if "OK"

					if (req.status == 200) {						

						document.getElementById('citydiv').innerHTML=req.responseText;						

					} else {

						alert("Problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			}			

			req.open("GET", strURL, true);

			req.send(null);

		}

				

	}

</script>

</head>

<body>

<!-- header Starts here -->

<?php include('includes/header.php') ?>

<!-- Ends here --> 

<!-- Wrapper Container Starts Here -->

<div class="container" style="overflow:scroll; height:600px;">
  <div class="hdngDivInn">
    <label style="float:left;">
    <h1>Cities</h1>
    </label>
    <label>    
    <form name="login" method="post" action="" onsubmit="return validateForm();">
     <div style="width:80%; overflow:hidden; float:right; text-align:right;">
     
     	  <div style="float:right; width: 113px;">
          <input name="addcity" type="submit" value="Add City" style="font-size:14px;" class="submitBtn" />
          </div>
          
          <div style="float:right; width: 130px; text-align: center;">
          <input type="text" name="city" id="city" class="textBoxnew" placeholder="Enter City"/>
          </div>
          
           <div id="citydiv" style="float:right; width:125px;">
            <select name="country" class="textBoxnew selectBox">
              <option>Country</option>
            </select>
          </div>
          
          <div id="statediv" style="float:right; width:125px;">
            <select name="territory" class="textBoxnew selectBox">
              <option>Territory</option>
            </select>
          </div>
          
         
               
          <div style="float:right; width:125px;">
          <select name="continent" onChange="getState(this.value)" class="textBoxnew selectBox">
            <option value="">Continent</option>
            <?php $continent = mysql_query("SELECT * FROM continent");
	 		while ($row=mysql_fetch_array($continent)) { ?>
            <option value=<?php echo $row['continent_id']?>><?php echo $row['continent_name']?></option>
            <?php } ?>
          </select>
          </div>
          
           </div>
  </form>
    
    </label>
  </div>
  <?php if($_GET['msg']=="true"){?>
    <h3 style="color:#093;" align="center">City List Added </h3>
    <?php }
	if($_GET['del']=="true"){?>
    <h3 style="color:red" align="center">City Deleted </h3>
    <?php }	
	if($_GET['updated']=="true"){?><h3 style="color:green" align="center">City  updated </h3><?php }
	?>
  <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
         <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Territory Name</td>
         <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">Country Name</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">City Name</td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $country_fetch_query = mysql_query("SELECT p.city_id, p.city_name, cn.country_name, tr.territory_name
FROM city p
LEFT OUTER JOIN country cn ON cn.country_id = p.country_id
LEFT OUTER JOIN territory tr ON tr.territory_id = p.territory_id");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>
      <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
          <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['territory_name']; ?></td>
         <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['country_name']; ?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['city_name']; ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_city.php?edit_id=<?php echo $country_res['city_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="delProfile(<?php echo $country_res['city_id'];?>);"><img src="images/delete-icn.png" width="22" height="22" /></a></td>
      </tr>
      <?php }?>
    </table>
  </div>
</div>

<!-- Ends here --> 

<!-- Copyright Div -->

<?php include('includes/footer.php') ?>

<!-- Ends here -->
<script type="text/javascript">
function validateForm()
{
if(document.login.continent.selectedIndex==0)
{ alert("Please select  Continent");
document.login.continent.focus();
return false;
}
if(document.login.territory.selectedIndex==0)
{ alert("Please select Territory");
document.login.territory.focus();
return false;
}
if(document.login.country.selectedIndex==0)
{ alert("Please select Country");
document.login.country.focus();
return false;
}
if( document.login.city.value == "" )
         {
            alert( "Please Enter City" );
            document.login.city.focus() ;
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
		url: "delete_city.php",
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
</body>
</html>
<?php }else{

	header('Location: index.php?msg=Please enter your User name and Password.');

}

?>