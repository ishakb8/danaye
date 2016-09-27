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

						document.getElementById('citydiv').innerHTML='<select name="city" class="textBox">'+

						'<option>Select  Country</option>'+

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
    <h1>City</h1>
    <?php 

if($_GET['msg']=="true"){?>
    <h3 style="color:#093;" align="center">City List Added </h3>
    <?php }

if($_GET['del']=="true"){?>
    <h3 style="color:red" align="center">City Deleted </h3>
    <?php }
	
	if($_GET['updated']=="true"){?><h3 style="color:green" align="center">City  updated </h3><?php }
	?>
    </label>
    <label style="float:right;"></label>
  </div>
  <form name="" method="post" action="">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td><!----------------------Select Contient--------------------------------------->
          
          <select name="continent" onChange="getState(this.value)" class="textBox">
            <option value="">Select  Continent</option>
            <?php

	$continent = mysql_query("SELECT * FROM continent");

	 while ($row=mysql_fetch_array($continent)) { ?>
            <option value=<?php echo $row['continent_id']?>><?php echo $row['continent_name']?></option>
            <?php } ?>
          </select>
          
          <!----------------------End Contient--------------------------------------->
          
        <td><!----------------------Select Teritory--------------------------------------->
          
          <div id="statediv">
            <select name="territory" class="textBox">
              <option>Select Territory</option>
            </select>
          </div>
          
          <!----------------------End Teritory---------------------------------------></td>
        <td><!----------------------Select Country--------------------------------------->
          
          <div id="citydiv">
            <select name="country" class="textBox">
              <option>Select Country</option>
            </select>
          </div>
          
          <!----------------------End Country---------------------------------------></td>
        <td width="20%" align="right" valign="middle"><input type="text" name="city" class="textBox" style="width:88%;" placeholder="Enter City name"  required="required"/></td>
        <td width="60%" align="left" valign="middle"><input name="addcity" type="submit" value="Add City" style="font-size:14px;" class="submitBtn" /></td>
      </tr>
    </table>
  </form>
  <div class="wrapperDiv">
    <table width="100%" border="0" cellspacing="0" cellpadding="10" class="table">
      <tr>
        <td width="8%" height="30" align="center" valign="middle" bgcolor="#ffffff">S.No</td>
        <td width="19%" height="30" align="left" valign="middle" bgcolor="#ffffff">City Name</td>
        <td width="14%" height="30" align="center" valign="middle" bgcolor="#ffffff">Edit</td>
        <td width="15%" height="30" align="center" valign="middle" bgcolor="#ffffff">Delete</td>
      </tr>
      <?php $country_fetch_query = mysql_query("SELECT * FROM city");

	 $i=1;

	  while($country_res=mysql_fetch_assoc($country_fetch_query)){?>
      <tr>
        <td width="8%" height="30" align="center" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $i++;?></td>
        <td width="19%" height="30" align="left" valign="top" bgcolor="#FFFFFF" style="color:#6d6d6d;"><?php echo $country_res['city_name']; ?></td>
        <td width="14%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="edit_city.php?edit_id=<?php echo $country_res['city_id']; ?>"><img src="images/edit.png" width="24" height="24" /></a></td>
        <td width="15%" height="30" align="center" valign="top" bgcolor="#FFFFFF"><a href="city.php?delte_id=<?php echo $country_res['city_id']; ?>"><img src="images/delete-icn.png" width="20" height="24" /></a></td>
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