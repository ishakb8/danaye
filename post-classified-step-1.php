<?php 

ob_start();

session_start();

if($_SESSION['login_user']){ ?>
<?php  include('includes/connect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Danaye-Classified Directory Online</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
    function fetch_select(val)
    {
    $.ajax({

    type: 'post',

    url: 'fetch_data.php',

    data: {

    get_option:val

    },

    success: function (response) {
   // alert("Please new_select Continent");
    document.getElementById("new_select").innerHTML=response;
	 

    }

    });

    }

	

	    function fetch_territory(val)

    {

    

    $.ajax({

    type: 'post',

    url: 'fetch_territory.php',

    data: {

    territory_id:val

    },

    success: function (response) {
//  alert("Please new_select Territory");
    document.getElementById("new_territory").innerHTML=response; 

    }

    });

    }
    function fetch_city(val)

    {

    

    $.ajax({

    type: 'post',

    url: 'fetch_city.php',

    data: {

    city_id:val

    },

    success: function (response) {
//alert("Please new_select City");
    document.getElementById("new_city").innerHTML=response; 

    }

    });

    }

    

    </script>
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
		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;
						//document.getElementById('citydiv').innerHTML='<select name="city">'+
												
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}</script> 
<script LANGUAGE="JavaScript">
function validation()
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
/*if(document.login.city.selectedIndex==0)
{ alert("Please select City");
document.login.city.focus();
return false;
}*/
{
    var radios = document.getElementsByName("categories");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    if (!formValid) alert("Must Check Posting Option!");
    return formValid;
}
return true;	
}
</script>
    </head>
    <body>
<!-- Header Starts here -->
<?php include('includes/post-header.php');?>
<!-- Ends here --> 
<!-- steps Div Starts here -->
<div class="stepsDiv"> please limit each posting to a single area and category, once per <span>48 hours</span> <img src="images/step-1.png" height="114" width="935" border="0" /> </div>
<!-- Ends here --> 
<!-- Grey Content Starts here -->
<form action="post-classified-step-2.php" method="post" name="login" enctype="multipart/form-data" onsubmit="return(validation());">
      <div class="greyDivPost">
    <div class="postContDiv">
          <div class="postContDiv-row1">
        <fieldset>
              <legend>Select Continent </legend>
              <ul>
            <li>
                  <select name="continent"  class="textBox selectBox" id="continent" style="width: 96%;">
                <option> Select Continent </option>
                <?php

$select=mysql_query("select * from continent");

while($row=mysql_fetch_array($select)){?>
                <option value="<?php echo $row['continent_id'];?>"><?php echo $row['continent_name'];?></option>
                <?php }?>
              </select>
                </li>
            <li>
                  <select name="territory" class="textBox selectBox"  id="territory" style="width: 96%;">
                <option>Select Territory</option>
                 <?php

$select_ter=mysql_query("select * from territory");

while($row1=mysql_fetch_array($select_ter)){?>
                <option value="<?php echo $row1['territory_id'];?>"><?php echo $row1['territory_name'];?></option>
                <?php }?>
              </select>
                </li>
            <li>
                  <select name="country" class="textBox selectBox"  id="country" style="width: 96%;" onChange="getState(this.value)">
                <option>Select Country</option>
                <?php

$select_cou=mysql_query("select * from country ORDER BY country_name");

while($row2=mysql_fetch_array($select_cou)){?>
                <option value="<?php echo $row2['country_id'];?>"><?php echo $row2['country_name'];?></option>
                <?php }?>
              </select>
                </li>
            <li>
                    <div id="citydiv"> <select name="city" class="textBox selectBox" id="city" style="width: 96%;">
                <option>Select City</option></select></div>
               
                </li>
          </ul>
            </fieldset>
        <fieldset>
              <legend> What type of posting is this </legend>
              <ul>
            <?php $categories_query = mysql_query("SELECT * FROM categories");
	while($categories_res=mysql_fetch_assoc($categories_query)){?>
            <li>
                  <input type="radio" name="categories" id="radios" value="<?php echo $categories_res['category_id'];?>">
                  <?php echo $categories_res['category_name'];?></li>
            <?php }?>
          </ul>
              <?php 
if($categories_res['category_name'] =="Jobs"){
	echo "you have selected jobs group";
	}

?>
            </fieldset>
      </div>
          <div class="postContDiv-row2"><strong>Posting guidelines for Housing</strong></div>
          <div class="postContDiv-row3"> Please do include the following :
        <ul>
              <li><i class="fa fa-angle-double-right"></i> Specific description of role and responsibilities</li>
              <li><i class="fa fa-angle-double-right"></i> Compensation and benefit information</li>
              <li><i class="fa fa-angle-double-right"></i> Information about the employer</li>
            </ul>
      </div>
          <div class="postContDiv-row3"> Please do include the following :
        <ul>
              <li><i class="fa fa-angle-double-right"></i> Business opportunities</li>
              <li><i class="fa fa-angle-double-right"></i> Unpaid internships, barters, deferred pay, etc</li>
              <li><i class="fa fa-angle-double-right"></i> Multilevel or referral marketing</li>
              <li><i class="fa fa-angle-double-right"></i> Jobs requiring upfront fees</li>
              <li><i class="fa fa-angle-double-right"></i> Ads for services or vocational training</li>
              <li><i class="fa fa-angle-double-right"></i> The same job to multiple areas or categories</li>
            </ul>
      </div>
        </div>
  </div>
      
      <!-- Ends here -->
      <div class="continueBtnDiv">
    <input type="submit" name="firstbtn" value="Next" class="defaulthBtn" />
  </div>
    </form>
<?php include('includes/footer.php') ?>
</body>
</html>
<?php }else{
	header('Location: login.php?msg=Please enter your User name and Password.');
}

?>
